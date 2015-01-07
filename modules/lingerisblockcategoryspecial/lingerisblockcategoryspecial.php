<?php

if (!defined('_CAN_LOAD_FILES_'))
	exit;
	
class LingerisBlockCategorySpecial extends Module
{
	private $_html = '';
	private $_postErrors = array();

	public function __construct()
	{
		$this->name = 'lingerisblockcategoryspecial';
		$this->tab = 'MyBlock';
		$this->version = '1.0';
		$this->author = 'Codespot';
		parent::__construct();

		$this->displayName = $this->l('Special Product by Category');
		$this->description = $this->l('Add a block displaying Special product by category in category page.');
	}

	public function install()
	{
		if (!Hook::get("categorySpecial"))
		{
			DB::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."hook`
                            SET `name`= 'categorySpecial',
                                `title`= 'Category special product'
                           ");
		}
		if (!parent::install() OR
				!$this->registerHook('header') OR
				!$this->registerHook('categorySpecial'))
			return false;
		return true;
	}
	
	public static function getPricesDropByCategory($id_category, $id_lang, $pageNumber = 0, $nbProducts = 10, $count = false, $orderBy = NULL, $orderWay = NULL, $beginning = false, $ending = false)
	{
		if (!Validate::isBool($count))
			die(Tools::displayError());

		if ($pageNumber < 0) $pageNumber = 0;
		if ($nbProducts < 1) $nbProducts = 10;
		if (empty($orderBy) || $orderBy == 'position') $orderBy = 'price';
		if (empty($orderWay)) $orderWay = 'DESC';
		if ($orderBy == 'id_product' OR $orderBy == 'price' OR $orderBy == 'date_add')
			$orderByPrefix = 'p';
		elseif ($orderBy == 'name')
            $orderByPrefix = 'pl';
		if (!Validate::isOrderBy($orderBy) OR !Validate::isOrderWay($orderWay))
			die (Tools::displayError());
		$currentDate = date('Y-m-d H:i:s');
		global $cookie, $cart;
		$id_group = $cookie->id_customer ? (int)(Customer::getDefaultGroupId((int)($cookie->id_customer))) : _PS_DEFAULT_CUSTOMER_GROUP_;
		$id_address = $cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')};
		$ids = Address::getCountryAndState($id_address);
		$id_country = (int)($ids['id_country'] ? $ids['id_country'] : Configuration::get('PS_COUNTRY_DEFAULT'));
		$ids_product = SpecificPrice::getProductIdByDate((int)(Shop::getCurrentShop()), (int)($cookie->id_currency), $id_country, $id_group, (!$beginning ? $currentDate : $beginning), (!$ending ? $currentDate : $ending));

		$groups = FrontController::getCurrentCustomerGroups();
		$sqlGroups = (count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');

		if ($count)
		{
			$sql = '
			SELECT COUNT(DISTINCT p.`id_product`) AS nb
			FROM `'._DB_PREFIX_.'product` p
			WHERE p.`active` = 1
			AND p.`show_price` = 1
			'.((!$beginning AND !$ending) ? ' AND p.`id_product` IN('.((is_array($ids_product) AND sizeof($ids_product)) ? implode(', ', $ids_product) : 0).')' : '').'
			AND p.`id_product` IN (
				SELECT cp.`id_product`
				FROM `'._DB_PREFIX_.'category_group` cg
				LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_category` = cg.`id_category`)
				WHERE cg.`id_group` '.$sqlGroups.'
			)';
			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
			return (int)($result['nb']);
		}
		$sql = '
		SELECT p.*, pl.`description`, pl.`description_short`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`,
		pl.`name`, p.`ean13`, p.`upc`, i.`id_image`, il.`legend`, t.`rate`, m.`name` AS manufacturer_name,
		DATEDIFF(p.`date_add`, DATE_SUB(NOW(), INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY)) > 0 AS new
		FROM `'._DB_PREFIX_.'product` p
		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)($id_lang).')
		LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)($id_lang).')
		LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr ON (p.`id_tax_rules_group` = tr.`id_tax_rules_group`
		                                           AND tr.`id_country` = '.(int)Country::getDefaultCountryId().'
	                                           	   AND tr.`id_state` = 0)
	    LEFT JOIN `'._DB_PREFIX_.'tax` t ON (t.`id_tax` = tr.`id_tax`)
		LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (m.`id_manufacturer` = p.`id_manufacturer`)
		WHERE 1
		AND p.`active` = 1
		AND p.`show_price` = 1
		'.((!$beginning AND !$ending) ? ' AND p.`id_product` IN ('.((is_array($ids_product) AND sizeof($ids_product)) ? implode(', ', $ids_product) : 0).')' : '').'
		AND p.`id_product` IN (
			SELECT cp.`id_product`
			FROM `'._DB_PREFIX_.'category_group` cg
			LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_category` = cg.`id_category`)
			WHERE cg.`id_group` '.$sqlGroups.' and cg.`id_category`= '.$id_category.'
		)
		ORDER BY RAND() LIMIT '.(int)($pageNumber * $nbProducts).', '.(int)($nbProducts);
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
		if($orderBy == 'price')
			Tools::orderbyPrice($result,$orderWay);
		if (!$result)
			return false;
		return Product::getProductsProperties($id_lang, $result);
	}
	
	function hookHeader($params)
	{
		global $smarty;
		Tools::addCSS(($this->_path).'cycle.css', 'all');
		//Tools::addJS(($this->_path).'jquery-ui-tabs.min.js');
		Tools::addJS(($this->_path).'jquery.multipleelements.cs.js');
		$smarty->assign(array(
			'HOOK_CATEGORY_SPECIAL' => Module::hookExec('categorySpecial')
		));
	}
	
	function hookCategorySpecial($params)
	{
		global $smarty;
		if (isset($_GET['id_category']))
		{
			$products =$this->getPricesDropByCategory($_GET['id_category'], $params['cookie']->id_lang, 0, 10);
			$smarty->assign(array(
				'products' => $products,'imgDir' => _PS_MANU_IMG_DIR_));
			return $this->display(__FILE__, 'lingerisblockcategoryspecial.tpl');
		}
		
	}
}


