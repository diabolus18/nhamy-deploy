<?php


if (!defined('_CAN_LOAD_FILES_'))
	exit;

class lingerisblocktopcategories extends Module
{
	public function __construct()
	{
		$this->name = 'lingerisblocktopcategories';
		$this->tab = 'MyBlock';
		$this->version = '1.0';
		$this->author = 'CodeSpot';

		parent::__construct();

		$this->displayName = $this->l('Top Categories');
		$this->description = $this->l('Adds a block featuring product categories.');
	}

	public function install()
	{
		if (!parent::install() OR
			!$this->registerHook('top') OR
			!$this->registerHook('header') OR
			// Temporary hooks. Do NOT hook any module on it. Some CRUD hook will replace them as soon as possible.
			!$this->registerHook('categoryAddition') OR
			!$this->registerHook('categoryUpdate') OR
			!$this->registerHook('categoryDeletion') OR
			!$this->registerHook('afterCreateHtaccess'))
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	public function getTree($resultParents, $resultIds, $maxDepth, $id_category = 1, $currentDepth = 0)
	{
		global $link;

		$children = array();
		if (isset($resultParents[$id_category]) AND sizeof($resultParents[$id_category]) AND ($maxDepth == 0 OR $currentDepth < $maxDepth))
			foreach ($resultParents[$id_category] as $subcat)
				$children[] = $this->getTree($resultParents, $resultIds, $maxDepth, $subcat['id_category'], $currentDepth + 1);
		if (!isset($resultIds[$id_category]))
			return false;
		return array('id' => $id_category, 'link' => $link->getCategoryLink($id_category, $resultIds[$id_category]['link_rewrite']),
					 'name' => $resultIds[$id_category]['name'], 'desc'=> $resultIds[$id_category]['description'],
					 'children' => $children,'level' => $resultIds[$id_category]['level_depth']);
	}

	public function hookTop($params)
	{
		global $smarty, $cookie, $link;

		$id_customer = (int)($params['cookie']->id_customer);
		$id_group = $id_customer ? Customer::getDefaultGroupId($id_customer) : _PS_DEFAULT_CUSTOMER_GROUP_;
		$id_product = (int)(Tools::getValue('id_product', 0));
		$id_category = (int)(Tools::getValue('id_category', 0));
		$id_lang = (int)($params['cookie']->id_lang);
		$smartyCacheId = 'lingerisblocktopcategories|'.$id_group.'_'.$id_lang.'_'.$id_product.'_'.$id_category;

		Tools::enableCache();
		if (!$this->isCached('lingerisblocktopcategories.tpl', $smartyCacheId))
		{
			$maxdepth = 5;

			if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
				SELECT DISTINCT c.*, cl.*
				FROM `'._DB_PREFIX_.'category` c
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND `id_lang` = '.$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cg.`id_category` = c.`id_category`)
				WHERE 1'
				.((int)($maxdepth) != 0 ? ' AND `level_depth` <= '.(int)($maxdepth) : '').'
				AND (c.`active` = 1 OR c.`id_category` = 1)
				AND cg.`id_group` = '.$id_group.'
				ORDER BY `level_depth` ASC, c.`position` ASC')
			)
				return;
			$resultParents = array();
			$resultIds = array();

			foreach ($result as &$row)
			{
				$resultParents[$row['id_parent']][] = &$row;
				$resultIds[$row['id_category']] = &$row;
			}
			$blockCategTree = $this->getTree($resultParents, $resultIds, 5);
			unset($resultParents);
			unset($resultIds);
			
			if (Tools::isSubmit('id_category'))
			{
				$cookie->last_visited_category = $id_category;
				$smarty->assign('currentCategoryId', $cookie->last_visited_category);
			}
			if (Tools::isSubmit('id_product'))
			{
				if (!isset($cookie->last_visited_category) OR !Product::idIsOnCategoryId($id_product, array('0' => array('id_category' => $cookie->last_visited_category))))
				{
					$product = new Product($id_product);
					if (isset($product) AND Validate::isLoadedObject($product))
						$cookie->last_visited_category = (int)($product->id_category_default);
				}
				$smarty->assign('currentCategoryId', (int)($cookie->last_visited_category));
			}
			$smarty->assign('blockCategTree', $blockCategTree);

			if (file_exists(_PS_THEME_DIR_.'modules/lingerisblocktopcategories/lingerisblocktopcategories.tpl'))
				$smarty->assign('branche_tpl_path', _PS_THEME_DIR_.'modules/lingerisblocktopcategories/category-tree-branch.tpl');
			else
				$smarty->assign('branche_tpl_path', _PS_MODULE_DIR_.'lingerisblocktopcategories/category-tree-branch.tpl');
			
		}
		$smarty->cache_lifetime = 31536000; // 1 Year
		// shop by brand
		$smarty->assign(array(
			'manufacturers' => Manufacturer::getManufacturers(),
			'link' => $link
		));
		
		$display = $this->display(__FILE__, 'lingerisblocktopcategories.tpl', $smartyCacheId);
		Tools::restoreCacheSettings();
		return $display;
	}

	public function hookHeader()
	{
		//Tools::addJS(_THEME_JS_DIR_.'tools/treeManagement.js');
		//Tools::addCSS(($this->_path).'blockcategories.css', 'all');
	}

	private function _clearBlockcategoriesCache()
	{
		$this->_clearCache(NULL, 'lingerisblocktopcategories');
		Tools::restoreCacheSettings();
	}

	public function hookCategoryAddition($params)
	{
		$this->_clearBlockcategoriesCache();
	}

	public function hookCategoryUpdate($params)
	{
		$this->_clearBlockcategoriesCache();
	}

	public function hookCategoryDeletion($params)
	{
		$this->_clearBlockcategoriesCache();
	}

	public function hookAfterCreateHtaccess($params)
	{
		$this->_clearBlockcategoriesCache();
	}
}