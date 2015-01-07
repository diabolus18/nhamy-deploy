<?php
include_once(dirname(__FILE__).'/StaticBlockClass.php');
class csstaticblocks extends Module
{
	protected $error = false;
	private $_html;
	private $myHook = array('displaytop','displayleftColumn','displayrightColumn','displayfooter','displayhome', 'csslideshow','displayfootertop','displayfooterbottom');
	
	public function __construct()
	{
	 	$this->name = 'csstaticblocks';
	 	$this->tab = 'MyBlocks';
	 	$this->version = '1.0';
		$this->author = 'Codespot';
	 	parent::__construct();

		$this->displayName = $this->l('Cs Static block');
		$this->description = $this->l('Adds static blocks with free content');
		$this->confirmUninstall = $this->l('Are you sure that you want to delete your static blocks?');
	
	}
	public function init_data()
	{
		$content_block1 = '<div class="cs_home_staticblock">
			<div class="col"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_1.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>men</h4>collection</div>
			</div>
			<div class="col"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_2.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>women</h4>
			sandals</div>
			</div>
			<div class="col last"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_3.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>handbag</h4>
			collection</div>
			</div>
			</div>';
		$content_block1_fr='<div class="cs_home_staticblock">
			<div class="col"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_1.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>mens</h4>
			collection</div>
			</div>
			<div class="col"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_2.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>womens</h4>
			sandals</div>
			</div>
			<div class="col last"><a class="img" href="#"><img src="{static_block_url}themes/andolo/img/cms/b_3.jpg" alt="" /></a>
			<div class="cscontent">
			<h4>handbag</h4>
			collection</div>
			</div>
			</div>';
		$content_block2 = '<div class="block stactic_adv_footer">
			<div class="col first">
			<div class="f_content">
			<p>consectetur adipiscing feugiat</p>
			</div>
			</div>
			<div class="col middle">
			<div class="f_content">
			<p>Praesent vitae erat ligula blad</p>
			</div>
			</div>
			<div class="col last">
			<div class="f_content">
			<p>Maecenas commodo lacus commodo</p>
			</div>
			</div>
			</div>';
		$content_block2_fr='<div class="block stactic_adv_footer">
			<div class="col first">
			<div class="f_content">
			<p>consectetur adipiscing feugiat</p>
			</div>
			</div>
			<div class="col middle">
			<div class="f_content">
			<p>Praesent vitae erat ligula blad</p>
			</div>
			</div>
			<div class="col last">
			<div class="f_content">
			<p>Maecenas commodo lacus commodo</p>
			</div>
			</div>
			</div>';
		$content_block3 = '<p class="copy-right">© 2013 Shoes &amp; Handbag Demo Store. All rights reserved. Prestashop Theme by <a title="Presthemes.com" href="http://presthemes.com">Presthemes.com</a></p>';
		
		$content_block3_fr='<p class="copy-right">© 2013 Chaussures et sac à main Demo Store. Tous droits réservés. Thème Prestashop par <a title="Presthemes.com" href="http://presthemes.com">Presthemes.com</a></p>';
		
		$content_block4='<div id="static_block_top_face"><a class="image" title="" href="#"><img src="{static_block_url}themes/andolo/img/cms/en-visit_face.png" alt="face" /></a>
		<div><span>visit us on</span>
		<p><a class="facebook" href="#"><img src="{static_block_url}themes/andolo/img/cms/txtface.png" alt="face" /></a></p>
		</div>
		</div>';
		
		$content_block4_fr='<div id="static_block_top_face"><a class="image" title="" href="#"><img src="{static_block_url}themes/andolo/img/cms/en-visit_face.png" alt="face" /></a>
		<div><span>visit us on</span>
		<p><a class="facebook" href="#"><img src="{static_block_url}themes/andolo/img/cms/txtface.png" alt="face" /></a></p>
		</div>
		</div>';
		
		$content_block5='<div id="static_block_top_chat"><span>chat with consultant</span>  Aliquam consequat facilisis anteport dapibus ipsum massa fermentumie </div>';
		
		$content_block5_fr='<div id="static_block_top_chat"><span>Discuter avec conseiller</span>  Aliquam consequat facilisis anteport dapibus ipsum massa fermentumie </div>';
		
		$content_block6='<div class="cs_staticblock_left_banner">
			<div class="first">
			<h4>free shipping <span>2 days</span></h4>
			<p>consequat facilisis antem</p>
			</div>
			<div class="last">
			<h4>try it free for <span>10 days</span></h4>
			<p>feugiat sagittis accumsana</p>
			</div>
			</div>';
		$content_block6_fr='<div class="cs_staticblock_left_banner">
			<div class="first">
			<h4>free shipping <span>2 days</span></h4>
			<p>consequat facilisis antem</p>
			</div>
			<div class="last">
			<h4>try it free for <span>10 days</span></h4>
			<p>feugiat sagittis accumsana</p>
			</div>
			</div>';
		$content_block7='<div class="grid_4 omega social">
		<div class="follow-on">
		<h4>Follow us on</h4>
		<p><a title="face" href="#"> <img src="{static_block_url}themes/andolo/img/cms/face.png" alt="face" /> </a> <a title="twitter" href="#"> <img src="{static_block_url}themes/andolo/img/cms/tw.png" alt="twitter" /> </a> <a title="google" href="#"> <img src="{static_block_url}themes/andolo/img/cms/google.png" alt="google" /> </a> <a title="rss" href="#"> <img src="{static_block_url}themes/andolo/img/cms/rss.png" alt="rss" /> </a> <a title="flickr" href="#"> <img src="{static_block_url}themes/andolo/img/cms/flickr.png" alt="flickr" /> </a> <a title="v" href="#"> <img src="{static_block_url}themes/andolo/img/cms/nobiet.png" alt="v" /> </a></p>
		</div>
		<div class="logo_payment">
		<h4>we accept</h4>
		<p><a title="visa" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/visa.png" alt="visa" /> </a> <a title="mastercard" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/mastercard.png" alt="mastercard" /> </a> <a title="american" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/american.png" alt="american" /> </a> <a title="paypal" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/paypal.png" alt="paypal" /> </a></p>
		</div>
		</div>';
		
		$content_block7_fr='<div class="grid_4 omega social">
			<div class="follow-on">
			<h4>Suivez-nous sur</h4>
			<p><a title="face" href="#"> <img src="{static_block_url}themes/andolo/img/cms/face.png" alt="face" /> </a> <a title="twitter" href="#"> <img src="{static_block_url}themes/andolo/img/cms/tw.png" alt="twitter" /> </a> <a title="google" href="#"> <img src="{static_block_url}themes/andolo/img/cms/google.png" alt="google" /> </a> <a title="rss" href="#"> <img src="{static_block_url}themes/andolo/img/cms/rss.png" alt="rss" /> </a> <a title="flickr" href="#"> <img src="{static_block_url}themes/andolo/img/cms/flickr.png" alt="flickr" /> </a> <a title="v" href="#"> <img src="{static_block_url}themes/andolo/img/cms/nobiet.png" alt="v" /> </a></p>
			</div>
			<div class="logo_payment">
			<h4>nous acceptons</h4>
			<p><a title="visa" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/visa.png" alt="visa" /> </a> <a title="mastercard" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/mastercard.png" alt="mastercard" /> </a> <a title="american" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/american.png" alt="american" /> </a> <a title="paypal" href="cms.php?id_cms=5"> <img src="{static_block_url}themes/andolo/img/cms/paypal.png" alt="paypal" /> </a></p>
			</div>
			</div>';
			
		$hook_home = Hook::getIdByName('displayhome');
		$hook_footer_top = Hook::getIdByName('displayfootertop');
		$hook_footer_bottom = Hook::getIdByName('displayfooterbottom');
		$hook_top = Hook::getIdByName('displaytop');
		$hook_left = Hook::getIdByName('displayleftColumn');
		$hook_footer = Hook::getIdByName('displayfooter');
		
		$id_en = Language::getIdByIso('en');
		$id_fr = Language::getIdByIso('fr');
		
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		//install static Block
		if(!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'staticblock` (`id_block`, `identifier_block`, `hook`, `is_active`) 
			VALUES (1, "banner-home1","'.$hook_home.'", 1),
				(2, "adversting-infomation-footer","'.$hook_footer_top.'", 1),
				(3, "all_right_footer","'.$hook_footer_bottom.'", 1),
				(4, "visit-us-on-facebook","'.$hook_top.'", 1),
				(5, "chat-with-our-expert","'.$hook_top.'", 1),
				(6, "left-banner","'.$hook_left.'", 1),
				(7, "follow-us-and-payment","'.$hook_footer.'", 1);') OR
		// Install Static Block _shop
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'staticblock_shop` (`id_block`, `id_shop`, `is_active`)
			VALUES 	(1, "'.$id_shop.'", 1),
					(2, "'.$id_shop.'", 1),
					(3, "'.$id_shop.'", 1),
					(4, "'.$id_shop.'", 1),
					(5, "'.$id_shop.'", 1),
					(6, "'.$id_shop.'", 1),
					(7, "'.$id_shop.'", 1);
		') OR
		// static block lang
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'staticblock_lang` (`id_block`, `id_lang`, `id_shop`, `title`, `content`) 
			VALUES ( "1", "'.$id_en.'","1","Banner Home 1", \''.$content_block1.'\'),
			( "1", "'.$id_fr.'","1","Banner Home 1", \''.$content_block1_fr.'\'),
			( "2", "'.$id_en.'","1","Adversting Information Footer", \''.$content_block2.'\'),
			( "2", "'.$id_fr.'","1","Adversting Information Footer", \''.$content_block2_fr.'\'),
			( "3", "'.$id_en.'","1","Text footer", \''.$content_block3.'\'),
			( "3","'.$id_fr.'","1","Text footer", \''.$content_block3_fr.'\'),
			( "4", "'.$id_en.'","1","Visit us on facebook", \''.$content_block4.'\'),
			( "4", "'.$id_fr.'","1","Visit us on facebook", \''.$content_block4_fr.'\'),
			( "5", "'.$id_en.'","1","chat with our expert", \''.$content_block5.'\'),
			( "5", "'.$id_fr.'","1","chat with our expert", \''.$content_block5_fr.'\'),
			( "6","'.$id_en.'","1","Left banner", \''.$content_block6.'\'),
			( "6", "'.$id_fr.'","1","Left banner", \''.$content_block6_fr.'\'),
			( "7", "'.$id_en.'","1","Follow Us and Payment", \''.$content_block7.'\'),
			( "7", "'.$id_fr.'","1","Follow Us and Payment", \''.$content_block7_fr.'\');')
		)
			return false;
		return true;;
		
	}
	
	
	
	public function install()
	{		
	 	if (parent::install() == false OR !$this->registerHook('header'))
	 		return false;
		foreach ($this->myHook AS $hook){
			if ( !$this->registerHook($hook))
				return false;
		}
	 	if (!Db::getInstance()->Execute('CREATE TABLE '._DB_PREFIX_.'staticblock (`id_block` int(10) unsigned NOT NULL AUTO_INCREMENT, `identifier_block` varchar(255) NOT NULL DEFAULT \'\', `hook` int(10) unsigned, `is_active` tinyint(1) NOT NULL DEFAULT \'1\', PRIMARY KEY (`id_block`),UNIQUE KEY `identifier_block` (`identifier_block`)) ENGINE=InnoDB default CHARSET=utf8'))
	 		return false;
		if (!Db::getInstance()->Execute('CREATE TABLE '._DB_PREFIX_.'staticblock_shop (`id_block` int(10) unsigned NOT NULL,`id_shop` int(10) unsigned NOT NULL,`is_active` tinyint(1) NOT NULL DEFAULT \'1\',PRIMARY KEY (`id_block`,`id_shop`)) ENGINE=InnoDB default CHARSET=utf8'))
	 		return false;
		if (!Db::getInstance()->Execute('CREATE TABLE '._DB_PREFIX_.'staticblock_lang (`id_block` int(10) unsigned NOT NULL, `id_lang` int(10) unsigned NOT NULL,`id_shop` int(10) unsigned NOT NULL, `title` varchar(255) NOT NULL DEFAULT \'\', `content` mediumtext, PRIMARY KEY (`id_block`,`id_lang`,`id_shop`)) ENGINE=InnoDB default CHARSET=utf8'))
	 		return false;
		$this->init_data();
	 	return true;
	}
	
	public function uninstall()
	{
	 	if (parent::uninstall() == false)
	 		return false;
	 	if (!Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'staticblock') OR !Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'staticblock_shop') OR !Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'staticblock_lang'))
	 		return false;
	 	return true;
	}
	
	private function _displayHelp()
	{
		$this->_html .= '
		<br/>
	 	<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Static block Helper').'</legend>
			<div>This module customize static contents on the site. Static contents are displayed at the position of the hook : top, left, home,right, footer.</div>
		</fieldset>';
	}
	
	public function getContent()
   	{
		$this->_html = '<h2>'.$this->displayName.'</h2>';
		
		
		$this->_postProcess();
		
		if (Tools::isSubmit('addBlock'))
			$this->_displayAddForm();
		elseif (Tools::isSubmit('editBlock'))
			$this->_displayUpdateForm();
		else
			$this->_displayForm();
		$this->_displayHelp();
		return $this->_html;
	}
	
	private function _postProcess()
	{
		global $currentIndex;
		$errors = array();
		if (Tools::isSubmit('saveBlock'))
		{
			
			$block = new StaticBlockClass(Tools::getValue('id_block'));
			$block->copyFromPost();
			
			$errors = $block->validateController();
						
			if (sizeof($errors))
			{
				$this->_html .= $this->displayError(implode('<br />', $errors));
			}
			else
			{
				Tools::getValue('id_block') ? $block->update() : $block->add();
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&saveBlockConfirmation');
			}
		}
		elseif (Tools::isSubmit('changeStatusStaticblock') AND Tools::getValue('id_block'))
		{
			$stblock = new StaticBlockClass(Tools::getValue('id_block'));
			$stblock->updateStatus(Tools::getValue('status'));
			Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		elseif (Tools::isSubmit('deleteBlock') AND Tools::getValue('id_block'))
		{
			$block = new StaticBlockClass(Tools::getValue('id_block'));
			$block->delete();
			Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&deleteBlockConfirmation');
		}
		elseif (Tools::isSubmit('saveBlockConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Static block has been saved successfully'));
		elseif (Tools::isSubmit('deleteBlockConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Static block deleted successfully'));
		
	}
	
	private function getTabs($active = null) //case in : allshop show shop default
	{
		$this->context = Context::getContext();
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
	 	if (!$result = Db::getInstance()->ExecuteS(
			'SELECT ts.*, tl.`title`
			FROM `'._DB_PREFIX_.'cshometab` t
			LEFT JOIN `'._DB_PREFIX_.'cshometab_shop` ts ON (ts.`id_tab` = t.`id_tab` )
			LEFT JOIN `'._DB_PREFIX_.'cshometab_lang` tl ON (t.`id_tab` = tl.`id_tab` '.( $id_shop ? 'AND tl.`id_shop` = '.$id_shop : ' ' ).') 
			WHERE tl.id_lang = '.(int)$id_lang.
			($active ? ' AND ts.`display` = 1' : ' ').
			( $id_shop ? 'AND ts.`id_shop` = '.$id_shop : ' ' ).'
			ORDER BY ts.`position` ASC'))
	 		return false;
	 	return $result;
	}
	
	private function getBlocks()
	{
		$this->context = Context::getContext();
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
	 	if (!$result = Db::getInstance()->ExecuteS(
			'SELECT b.id_block, b.identifier_block, b.hook, bs.is_active, bl.`title`, bl.`content` 
			FROM `'._DB_PREFIX_.'staticblock` b 
			LEFT JOIN `'._DB_PREFIX_.'staticblock_shop` bs ON (b.`id_block` = bs.`id_block` )
			LEFT JOIN `'._DB_PREFIX_.'staticblock_lang` bl ON (b.`id_block` = bl.`id_block`'.( $id_shop ? 'AND bl.`id_shop` = '.$id_shop : ' ' ).') 
			WHERE bl.id_lang = '.(int)$id_lang.
			( $id_shop ? ' AND bs.`id_shop` = '.$id_shop : ' ' )))
	 		return false;
	 	return $result;
	}
	
	private function getHookTitle($id_hook)
	{
		if (!$result = Db::getInstance()->getRow('
			SELECT `name`,`title`
			FROM `'._DB_PREFIX_.'hook` 
			WHERE `id_hook` = '.(int)($id_hook)))
			return false;
		return ($result['title'] != "" ? $result['title'] : $result['name']);
	}
	
	private function _displayForm()
	{
		global $currentIndex, $cookie;
	 	$this->_html .= '
		
	 	<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('List of static blocks').'</legend>
			<p><a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&addBlock"><img src="'._PS_ADMIN_IMG_.'add.gif" alt="" /> '.$this->l('Add a new block').'</a></p><br/>
			<table width="100%" class="table" cellspacing="0" cellpadding="0">
			<thead>
			<tr class="nodrag nodrop">
				<th>'.$this->l('ID').'</th>
				<th class="center">'.$this->l('Title').'</th>
				<th class="center">'.$this->l('Identifier').'</th>
				<th class="center">'.$this->l('Hook into').'</th>
				<th class="right">'.$this->l('Active').'</th>
			</tr>
			</thead>
			<tbody>';
		$s_blocks = $this->getBlocks();
		if (is_array($s_blocks))
		{
			static $irow;
			foreach ($s_blocks as $block)
			{
				$this->_html .= '
				<tr class="'.($irow++ % 2 ? 'alt_row' : '').'">
					<td class="pointer" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editBlock&id_block='.$block['id_block'].'\'">'.$block['id_block'].'</td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editBlock&id_block='.$block['id_block'].'\'">'.$block['title'].'</td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editBlock&id_block='.$block['id_block'].'\'">'.$block['identifier_block'].'</td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editBlock&id_block='.$block['id_block'].'\'">'.(Validate::isInt($block['hook']) ? $this->getHookTitle($block['hook']) : '').'</td>
					<td class="pointer center"> <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&changeStatusStaticblock&id_block='.$block['id_block'].'&status='.$block['is_active'].'">'.($block['is_active'] ? '<img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" />' : '<img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" />').'</a> </td>
				</tr>';
			}
		}
		$this->_html .= '
			</tbody>
			</table>
		</fieldset>';
			
		
	}
	
	private function _displayAddForm()
	{
		global $currentIndex, $cookie;
	 	// Language 
	 	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'titlediv¤contentdiv';
		// TinyMCE
		$iso = Language::getIsoById((int)($cookie->id_lang));
		$isoTinyMCE = (file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en');
		$ad = dirname($_SERVER["PHP_SELF"]);
		$this->_html .=  '
		<script type="text/javascript">	
		var iso = \''.$isoTinyMCE.'\' ;
		var pathCSS = \''._THEME_CSS_DIR_.'\' ;
		var ad = \''.$ad.'\' ;
		</script>
		<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>
		<script type="text/javascript">id_language = Number('.$defaultLanguage.');</script>	
		<script type="text/javascript">
		$(document).ready(function(){		
			tinySetup({});});
		</script>
		';
		// Form
		$this->_html .= '
		<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('New block').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">
				<label>'.$this->l('Title:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="titlediv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="title_'.$language['id_lang'].'" value="'.Tools::getValue('title_'.$language['id_lang']).'" size="55" /><sup> *</sup>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'titlediv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Identifier:').'</label>
				<div class="margin-form">
					<div id="identifierdiv" style="float: left;">
						<input type="text" name="identifier_block" value="'.Tools::getValue('identifier_block').'" size="55" /><sup> *</sup>
					</div>
					<p class="clear">'.$this->l('Identifier must be unique').'. '.$this->l('Match a-zA-Z-_0-9').'</p>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Hook into:').'</label>
				<div class="margin-form">
					<div id="hookdiv" style="float: left;">
						<select name="hook">
							<option value="0">'.$this->l('None').'</option>';

		foreach ($this->myHook AS $hook){
			$id_hook = Hook::getIdByName($hook);
			$this->_html .= '<option value="'.$id_hook.'"'.($id_hook == Tools::getValue('hook') ? 'selected="selected"' : '').'>'.$this->getHookTitle($id_hook).'</option>';
		}
		
		$this->_html .= '
						</select>
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Active:').'</label>
				<div class="margin-form">
					<div id="activediv" style="float: left;">
						<input type="radio" name="is_active" value="1"'.(Tools::getValue('is_active',1) ? 'checked="checked"' : '').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
						<input type="radio" name="is_active" value="0"'.(Tools::getValue('is_active',1) ? '' : 'checked="checked"').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Content:').'</label>
				<div class="margin-form">';									
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="contentdiv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<textarea class="rte" name="content_'.$language['id_lang'].'" id="contentInput_'.$language['id_lang'].'" cols="100" rows="20">'.Tools::getValue('content_'.$language['id_lang']).'</textarea>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'contentdiv', true);
					$this->_html .= '
					<div class="clear"></div>
				</div>			
				<div class="margin-form">';
					$this->_html .= '<input type="submit" class="button" name="saveBlock" value="'.$this->l('Save Block').'" id="saveBlock" />
									';
					$this->_html .= '					
				</div>
				
			</form>
			<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>
		</fieldset>';
	}
	
	private function _displayUpdateForm()
	{
		global $currentIndex, $cookie;
		if (!Tools::getValue('id_block'))
		{
			$this->_html .= '<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>';
			return;
		}

		$block = new StaticBlockClass((int)Tools::getValue('id_block'));
	 	// Language 
	 	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'titlediv¤contentdiv';
		// TinyMCE
		$iso = Language::getIsoById((int)($cookie->id_lang));
		$isoTinyMCE = (file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en');
		$ad = dirname($_SERVER["PHP_SELF"]);
		$this->_html .=  '
		<script type="text/javascript">	
		var iso = \''.$isoTinyMCE.'\' ;
		var pathCSS = \''._THEME_CSS_DIR_.'\' ;
		var ad = \''.$ad.'\' ;
		</script>
		<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>
		<script type="text/javascript">id_language = Number('.$defaultLanguage.');</script>	
		<script type="text/javascript">
		$(document).ready(function(){		
			tinySetup({});});
		</script>
		';
		// Form
		$this->_html .= '
		<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Edit block').' '.$block->identifier_block.'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">
				<input type="hidden" name="id_block" value="'.(int)$block->id_block.'" id="id_block" />
				<div class="margin-form">
					<input type="submit" class="button " name="deleteBlock" value="'.$this->l('Delete Block').'" id="deleteBlock" onclick="if (!confirm(\'Are you sure that you want to delete this static blocks?\')) return false "/>
				</div>
				<label>'.$this->l('Title:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="titlediv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="title_'.$language['id_lang'].'" value="'.(isset($block->title[$language['id_lang']]) ? $block->title[$language['id_lang']] : '').'" size="55" /><sup> *</sup>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'titlediv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Identifier:').'</label>
				<div class="margin-form">
					<div id="identifierdiv" style="float: left;">
						<input type="text" name="identifier_block" value="'.$block->identifier_block.'" size="55" /><sup> *</sup>
					</div>
					<p class="clear">'.$this->l('Identifier must be unique').'. '.$this->l('Match a-zA-Z-_0-9').'</p>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Hook into:').'</label>
				<div class="margin-form">
					<div id="hookdiv" style="float: left;">
						<select name="hook">
							<option value="0">'.$this->l('None').'</option>';
		foreach ($this->myHook AS $hook){
			$id_hook = Hook::getIdByName($hook);
			$this->_html .= '<option value="'.$id_hook.'"'.($id_hook == $block->hook ? 'selected="selected"' : '').'>'.$this->getHookTitle($id_hook).'</option>';
		}
		$this->_html .= '
						</select>
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Status:').'</label>
				<div class="margin-form">
					<div id="activediv" style="float: left;">
						<input type="radio" name="is_active" '.($block->is_active ? 'checked="checked"' : '').' value="1" />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
						<input type="radio" name="is_active" '.($block->is_active ? '' : 'checked="checked"').' value="0" />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Content:').'</label>
				<div class="margin-form">';									
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="contentdiv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<textarea class="rte" name="content_'.$language['id_lang'].'" id="contentInput_'.$language['id_lang'].'" cols="100" rows="20">'.(isset($block->content[$language['id_lang']]) ? $block->content[$language['id_lang']] : '').'</textarea>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'contentdiv', true);
					$this->_html .= '
					<div class="clear"></div>
				</div>			
				<div class="margin-form">';
					$this->_html .= '<input type="submit" class="button" name="saveBlock" value="'.$this->l('Save Block').'" id="saveBlock" />';
					$this->_html .= '					
				</div>
				
			</form>
			<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>
		</fieldset>';
	}

	public function contentById($id_block)
	{
		global $cookie;

		$staticblock = new StaticBlockClass($id_block);
		return ($staticblock->is_active ? $staticblock->content[(int)$cookie->id_lang] : '');
	}
	
	public function contentByIdentifier($identifier)
	{
		global $cookie;

		if (!$result = Db::getInstance()->getRow('
			SELECT `id_block`,`identifier_block`
			FROM `'._DB_PREFIX_.'staticblock` 
			WHERE `identifier_block` = \''.$identifier.'\''))
			return false;
		$staticblock = new StaticBlockClass($result['id_block']);
		return ($staticblock->is_active ? $staticblock->content[(int)$cookie->id_lang] : '');
	}
	
	private function getBlockInHook($hook_name)
	{
		$block_list = array();
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		$id_hook = Hook::getIdByName($hook_name);
		if ($id_hook)
		{
			$results = Db::getInstance()->ExecuteS('SELECT b.`id_block` FROM `'._DB_PREFIX_.'staticblock` b
			LEFT JOIN `'._DB_PREFIX_.'staticblock_shop` bs ON (b.id_block = bs.id_block)
			WHERE bs.is_active = 1 AND (bs.id_shop = '.(int)$id_shop.') AND b.`hook` = '.(int)($id_hook));
			foreach ($results as $row)
			{
				$temp = new StaticBlockClass($row['id_block']);
				$block_list[] = $temp;
			}
		}	
		
		return $block_list;
	}
	
	public function hookDisplayTop()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displaytop');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	public function hookDisplayLeftColumn()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayleftColumn');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	public function hookDisplayRightColumn()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayrightColumn');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	public function hookDisplayFooter()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayfooter');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	public function hookDisplayHome()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayhome');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	function hookHeader($params)
	{
		global $smarty;
		$smarty->assign(array(
			'HOOK_MY_TOP' => Hook::Exec('mytop'),
			'HOOK_MY_RIGHT' => Hook::Exec('myright'),
			'HOOK_CS_FOOTER_TOP' => Hook::Exec('displayfootertop'),
			'HOOK_CS_FOOTER_BOTTOM' => Hook::Exec('displayfooterbottom')
		));
	}
	
	public function hookMyTop()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('mytop');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
	public function hookMyRight()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('myright');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	public function hookCsSlideshow()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('csslideshow');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	public function hookDisplayFooterTop()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayfootertop');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	public function hookDisplayFooterBottom()
	{
		global $smarty, $cookie;
		
		$block_list = $this->getBlockInHook('displayfooterbottom');
		
		$smarty->assign(array(
			'block_list' => $block_list
		));
		return $this->display(__FILE__, 'csstaticblocks.tpl');
	}
	
}
?>
