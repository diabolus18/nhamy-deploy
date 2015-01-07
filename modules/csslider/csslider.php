<?php
include_once(dirname(__FILE__).'/SliderClass.php');

class CsSlider extends Module
{
	private $_html;
	
	public function __construct()
	{
	 	$this->name = 'csslider';
	 	$this->tab = 'MyBlocks';
	 	$this->version = '1.0';
		$this->author = 'CodeSpot';

	 	parent::__construct();

		$this->displayName = $this->l('CS Slider');
		$this->description = $this->l('Add a JQuery Nivo Slider on the homepage');
		$this->confirmUninstall = $this->l('Are you sure that you want to delete your CSSlider?');

	}
	public function init_data()
	{
		if(!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider` (`id_slider`, `url`, `position`, `display`) VALUES ( "1", "#","1", "1")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider` (`id_slider`, `url`, `position`, `display`) VALUES ( "2", "#","2", "1")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider` (`id_slider`, `url`, `position`, `display`) VALUES ( "3", "#","3", "1")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider` (`id_slider`, `url`, `position`, `display`) VALUES ( "4", "#","4", "1")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "1", "1","1_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "1", "2","1_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "1", "3","1_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "2", "1","2_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "2", "2","2_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "2", "3","2_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "3", "1","3_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "3", "2","3_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "3", "3","3_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "4", "1","4_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "4", "2","4_1.jpg", "")') OR
		!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'csslider_lang` (`id_slider`, `id_lang`, `image`, `caption`) VALUES ( "4", "3","4_1.jpg", "")')
		)
			return false;
		return true;
	}
	public function install()
	{
	 	if (parent::install() == false OR !$this->registerHook('header') OR !$this->registerHook('top') || $this->registerHook('slider') == false )
	 		return false;
		if (!Db::getInstance()->Execute('CREATE TABLE '._DB_PREFIX_.'csslider (`id_slider` int(10) unsigned NOT NULL AUTO_INCREMENT, `url` varchar(255), `position` int(10) unsigned DEFAULT \'0\', `display` tinyint(1) NOT NULL DEFAULT \'1\', PRIMARY KEY (`id_slider`)) ENGINE=InnoDB default CHARSET=utf8'))
	 		return false;
		if (!Db::getInstance()->Execute('CREATE TABLE '._DB_PREFIX_.'csslider_lang (`id_slider` int(10) unsigned NOT NULL, `id_lang` int(10) unsigned NOT NULL, `image` varchar(255) NOT NULL DEFAULT \'\', `caption` mediumtext, UNIQUE KEY `csslider_lang_index` (`id_slider`,`id_lang`)) ENGINE=InnoDB default CHARSET=utf8'))
	 		return false;
		$this->init_data();
	 	return true;
	}
	
	public function uninstall()
	{
	 	if (parent::uninstall() == false)
	 		return false;
		if (!Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'csslider') OR !Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'csslider_lang'))
	 		return false;
	 	return true;
	}
	
	private function _displayHelp()
	{
		$this->_html .= '
		<br/>
	 	<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Nino Slider Helper').'</legend>
			<a href="http://nivo.dev7studios.com/" alt="Nivo Slider" title="Nivo Slider">http://nivo.dev7studios.com/</a>
		</fieldset>';
	}
	
	private function _displayOptions()
	{
		$option = simplexml_load_file(dirname(__FILE__).'/'.'option.xml');
		$effects = explode(",", $option->effect);
		$this->_html .= '
		<br/>
	 	<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Slider Options').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">
			<label>'.$this->l('Effect:').'</label>
			<div class="margin-form">
				<table cellpadding="0" cellspacing="0" class="table">
				<tbody>
					<tr>
						<td><input type="checkbox" name="effect[]" value="sliceDown" '.(in_array("sliceDown",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceDown</label></td>
						<td><input type="checkbox" name="effect[]" value="sliceDownLeft" '.(in_array("sliceDownLeft",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceDownLeft</label></td>
						<td><input type="checkbox" name="effect[]" value="sliceUp" '.(in_array("sliceUp",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceUp</label></td>
						<td><input type="checkbox" name="effect[]" value="sliceUpLeft" '.(in_array("sliceUpLeft",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceUpLeft</label></td>
					</tr>
					<tr class="alt_row">
						<td><input type="checkbox" name="effect[]" value="sliceUpDown" '.(in_array("sliceUpDown",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceUpDown</label></td>
						<td><input type="checkbox" name="effect[]" value="sliceUpDownLeft" '.(in_array("sliceUpDownLeft",$effects) ? 'checked="checked"' : '').'/><label class="t"> sliceUpDownLeft</label></td>
						<td><input type="checkbox" name="effect[]" value="fold" '.(in_array("fold",$effects) ? 'checked="checked"' : '').'/><label class="t"> fold</label></td>
						<td><input type="checkbox" name="effect[]" value="fade" '.(in_array("fade",$effects) ? 'checked="checked"' : '').'/><label class="t"> fade</label></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="effect[]" value="random" '.(in_array("random",$effects) ? 'checked="checked"' : '').' /><label class="t"> random</label></td>
						<td><input type="checkbox" name="effect[]" value="slideInRight" '.(in_array("slideInRight",$effects) ? 'checked="checked"' : '').'/><label class="t"> slideInRight</label></td>
						<td><input type="checkbox" name="effect[]" value="slideInLeft" '.(in_array("slideInLeft",$effects) ? 'checked="checked"' : '').'/><label class="t"> slideInLeft</label></td>
						<td><input type="checkbox" name="effect[]" value="boxRandom" '.(in_array("boxRandom",$effects) ? 'checked="checked"' : '').'/><label class="t"> boxRandom</label></td>
					</tr>					
					<tr class="alt_row">
						<td><input type="checkbox" name="effect[]" value="boxRain" '.(in_array("boxRain",$effects) ? 'checked="checked"' : '').'/><label class="t"> boxRain</label></td>
						<td><input type="checkbox" name="effect[]" value="boxRainReverse" '.(in_array("boxRainReverse",$effects) ? 'checked="checked"' : '').'/><label class="t"> boxRainReverse</label></td>
						<td><input type="checkbox" name="effect[]" value="boxRainGrow" '.(in_array("boxRainGrow",$effects) ? 'checked="checked"' : '').'/><label class="t"> boxRainGrow</label></td>
						<td><input type="checkbox" name="effect[]" value="boxRainGrowReverse" '.(in_array("boxRainGrowReverse",$effects) ? 'checked="checked"' : '').'/><label class="t"> boxRainGrowReverse</label></td>
					</tr>
				</tbody>
				</table>
				<p class="clear">'.$this->l('Specify sets like: fold,fade,sliceDown').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Animation Speed:').'</label>
			<div class="margin-form">
				<input type="text" name="animSpeed" value="'.($option->animSpeed ? $option->animSpeed : 500).'" />
				<p class="clear">'.$this->l('Slide transition speed').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Pause Time:').'</label>
			<div class="margin-form">
				<input type="text" name="pauseTime" value="'.($option->pauseTime ? $option->pauseTime : 3000).'" />
				<p class="clear">'.$this->l('How long each slide will show').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Direction Navigation:').'</label>
			<div class="margin-form">
				<input type="radio" name="directionNav" value="true" '.($option->directionNav != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="directionNav" value="false" '.($option->directionNav == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('Next & Prev navigation').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Direction Navigation Hide:').'</label>
			<div class="margin-form">
				<input type="radio" name="directionNavHide" value="true" '.($option->directionNavHide != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="directionNavHide" value="false" '.($option->directionNavHide == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('Only show on hover').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Control Navigation:').'</label>
			<div class="margin-form">
				<input type="radio" name="controlNav" value="true" '.($option->controlNav != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="controlNav" value="false" '.($option->controlNav == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('1,2,3... navigation').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Control Navigation Thumbnails:').'</label>
			<div class="margin-form">
				<input type="radio" name="controlNavThumbs" value="true" '.($option->controlNavThumbs != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="controlNavThumbs" value="false" '.($option->controlNavThumbs == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('Use thumbnails for Control Navigation').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Pause On Hover:').'</label>
			<div class="margin-form">
				<input type="radio" name="pauseOnHover" value="true" '.($option->pauseOnHover != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="pauseOnHover" value="false" '.($option->pauseOnHover == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('Stop animation while hovering').'</p>
				<div class="clear"></div>
			</div>
			<label>'.$this->l('Manual Advance:').'</label>
			<div class="margin-form">
				<input type="radio" name="manualAdvance" value="true" '.($option->manualAdvance != "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
				<input type="radio" name="manualAdvance" value="false" '.($option->manualAdvance == "false" ? 'checked="checked"' : '').' />
				<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
				<p class="clear">'.$this->l('Force manual transitions').'</p>
				<div class="clear"></div>
			</div>
			<div class="margin-form">';
				$this->_html .= '
				<input type="submit" class="button" name="applyOptions" value="'.$this->l('Apply').'" id="applyOptions" />
				<input type="submit" class="button" name="resetOptions" value="'.$this->l('Reset').'" id="applyOptions" />';
				$this->_html .= '					
			</div>';
		$this->_html .= '
			</form>
		</fieldset>';
	}
	
	public function getContent()
   	{
		$this->_html = '<h2>'.$this->displayName.'</h2>';
		
		$this->_postProcess();
		
		if (Tools::isSubmit('addSlider'))
			$this->_displayAddForm();
		elseif (Tools::isSubmit('editSlider'))
			$this->_displayUpdateForm();
		elseif (Tools::isSubmit('changeStatusSlider') AND Tools::getValue('id_slider'))
		{
			$slidernew = new SliderClass(Tools::getValue('id_slider'));
			$slidernew->updateStatus(Tools::getValue('status'));
			$this->_displayForm();
			$this->_displayOptions();
		}
		else
		{
			$this->_displayForm();
			$this->_displayOptions();
		}
		
		$this->_displayHelp();
		
		return $this->_html;
	}
	
	private function saveXmlOption($reset = false)
	{
		$error = false;
		
		$newXml = '<?xml version=\'1.0\' encoding=\'utf-8\' ?>'."\n".'<options>'."\n";
			
		$newXml .= '<effect>';
		$newXml .= ($reset ? 'random' : implode(",", Tools::getValue('effect')));
		$newXml .= '</effect>'."\n";
		
		$newXml .= '<animSpeed>';
		$newXml .= ($reset ? '500' : Tools::getValue('animSpeed'));
		$newXml .= '</animSpeed>'."\n";
		
		$newXml .= '<pauseTime>';
		$newXml .= ($reset ? '3000' : Tools::getValue('pauseTime'));
		$newXml .= '</pauseTime>'."\n";
		
		$newXml .= '<directionNav>';
		$newXml .= ($reset ? 'true' : Tools::getValue('directionNav'));
		$newXml .= '</directionNav>'."\n";
		
		$newXml .= '<directionNavHide>';
		$newXml .= ($reset ? 'true' : Tools::getValue('directionNavHide'));
		$newXml .= '</directionNavHide>'."\n";
		
		$newXml .= '<controlNav>';
		$newXml .= ($reset ? 'true' : Tools::getValue('controlNav'));
		$newXml .= '</controlNav>'."\n";
		
		$newXml .= '<controlNavThumbs>';
		$newXml .= ($reset ? 'false' : Tools::getValue('controlNavThumbs'));
		$newXml .= '</controlNavThumbs>'."\n";
		
		$newXml .= '<pauseOnHover>';
		$newXml .= ($reset ? 'true' : Tools::getValue('pauseOnHover'));
		$newXml .= '</pauseOnHover>'."\n";
		
		$newXml .= '<manualAdvance>';
		$newXml .= ($reset ? 'false' : Tools::getValue('manualAdvance'));
		$newXml .= '</manualAdvance>'."\n";
		
		$newXml .= '</options>'."\n";
		
		if ($fd = @fopen(dirname(__FILE__).'/'.'option.xml', 'w'))
		{
			if (!@fwrite($fd, $newXml))
				$error = $this->displayError($this->l('Unable to write to the editor file.'));
			if (!@fclose($fd))
				$error = $this->displayError($this->l('Can\'t close the editor file.'));
		}
		else
			$error = $this->displayError($this->l('Unable to update the editor file. Please check the editor file\'s writing permissions.'));
		return $error;
	}
	
	private function _postProcess()
	{
		global $currentIndex;
		$errors = array();
		if (Tools::isSubmit('saveSlider'))
		{
			$slider = new SliderClass(Tools::getValue('id_slider'));
			$slider->copyFromPost();
			
			$errors = $slider->validateController();
						
			if (sizeof($errors))
			{
				$this->_html .= $this->displayError(implode('<br />', $errors));
			}
			else
			{
				Tools::getValue('id_slider') ? $slider->update() : $slider->add();
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&saveSliderConfirmation');
			}
		}
		elseif (Tools::isSubmit('deleteSlider') AND Tools::getValue('id_slider'))
		{
			$slider = new SliderClass(Tools::getValue('id_slider'));
			$slider->delete();
			Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&deleteSliderConfirmation');
		}
		// AND !Validate::isInt(Tools::getValue('id_slider')) AND !Validate::isInt(Tools::getValue('position'))
		elseif (Tools::isSubmit('orderSlider') AND Validate::isInt(Tools::getValue('id_slider')) AND Validate::isInt(Tools::getValue('position')))
		{
			$slider = new SliderClass(Tools::getValue('id_slider'));
			$slider->updatePosition(Tools::getValue('way'),Tools::getValue('position'));
			Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		elseif (Tools::isSubmit('applyOptions'))
		{
			if ($error = $this->saveXmlOption())
				$this->_html .= $error;
			else
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&statusConfirmation');
		}
		elseif (Tools::isSubmit('resetOptions'))
		{
			if ($error = $this->saveXmlOption(true))
				$this->_html .= $error;
			else
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&statusConfirmation');
		}
		elseif (Tools::isSubmit('saveSliderConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Slider has been added successfully'));
		elseif (Tools::isSubmit('deleteSliderConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Slider deleted successfully'));
		elseif (Tools::isSubmit('statusConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Options updated successfully'));
	}
	
	private function getSliders()
	{
		$defaultLanguage = intval(Configuration::get('PS_LANG_DEFAULT'));
	 	if (!$result = Db::getInstance()->ExecuteS(
			'SELECT s.*, sl.`image`, sl.`caption` 
			FROM `'._DB_PREFIX_.'csslider` s 
			LEFT JOIN `'._DB_PREFIX_.'csslider_lang` sl ON (s.`id_slider` = sl.`id_slider` AND sl.`id_lang` = '.(int)($defaultLanguage).') 
			ORDER BY s.`position` ASC'))
	 		return false;
	 	return $result;
	}
	
	private function _displayForm()
	{
		global $currentIndex, $cookie;
	 	$this->_html .= '
		
	 	<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Sliders').'</legend>
			<p><a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&addSlider"><img src="'._PS_ADMIN_IMG_.'add.gif" alt="" /> '.$this->l('Add a new Slider').'</a></p><br/>
			<table width="100%" class="table" cellspacing="0" cellpadding="0">
			<thead>
			<tr class="nodrag nodrop">
				<th>&nbsp;</th>
				<th class="center">'.$this->l('Image').'</th>
				<th class="center">'.$this->l('Caption').'</th>
				<th class="center">'.$this->l('Url').'</th>
				<th class="center">'.$this->l('Displayed').'</th>
				<th class="right">'.$this->l('Position').'</th>
			</tr>
			</thead>
			<tbody>';
		$sliders = $this->getSliders();
		if (is_array($sliders))
		{
			static $irow;
			$stt = 1;
			foreach ($sliders as $slider)
			{
				if ($dot_pos = strrpos($slider['image'],'.'))
					$thumb_url = _PS_BASE_URL_._MODULE_DIR_.$this->name.'/image/'.substr($slider['image'], 0, $dot_pos).'_thumb'.substr($slider['image'], $dot_pos);
				else
					$thumb_url =_PS_BASE_URL_._MODULE_DIR_.$this->name.'/image/default_thumb.jpg';
				$this->_html .= '
				<tr class="'.($irow++ % 2 ? 'alt_row' : '').'">
					<td class="pointer" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editSlider&id_slider='.$slider['id_slider'].'\'">'.$stt.'</td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editSlider&id_slider='.$slider['id_slider'].'\'"><img src="'.$thumb_url.'" alt="" title="" style="height:45px;width:45px;margin: 3px 0px 3px 0px;"/></td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editSlider&id_slider='.$slider['id_slider'].'\'">'.$slider['caption'].'</td>
					<td class="pointer center" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&editSlider&id_slider='.$slider['id_slider'].'\'">'.$slider['url'].'</td>
					
					<td class="pointer center"> <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&changeStatusSlider&id_slider='.$slider['id_slider'].'&status='.$slider['display'].'">'.($slider['display'] ? '<img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" />' : '<img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" />').'</a> </td>
					
					<td class="pointer right">'.($slider !== end($sliders) ? '<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&orderSlider&id_slider='.$slider['id_slider'].'&way=1&position='.($slider['position']+1).'"><img src="'._PS_ADMIN_IMG_.'down.gif" alt="'.$this->l('Down').'" /></a>' : '').($slider !== reset($sliders) ? '<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&orderSlider&id_slider='.$slider['id_slider'].'&way=0&position='.($slider['position']-1).'"><img src="'._PS_ADMIN_IMG_.'up.gif" alt="'.$this->l('Up').'" /></a>' : '').'</td>
				</tr>';
				$stt++;
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
		$divLangName = 'imagediv¤captiondiv';

		// Form
		$this->_html .= '
		<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('New Slider').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">
				<input type="hidden" name="position" value="'.(Tools::getValue('position') ? Tools::getValue('position') : SliderClass::getNextPosition()).'" id="position" />
				<label>'.$this->l('Image:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="imagediv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="file" name="image_'.$language['id_lang'].'" /><sup> *</sup>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'imagediv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Caption:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="captiondiv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="caption_'.$language['id_lang'].'" value="'.Tools::getValue('caption_'.$language['id_lang']).'" size="55" />
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'captiondiv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('URL:').'</label>
				<div class="margin-form">
					<div id="urldiv" style="float: left;">
						<input type="text" name="url" value="'.(Tools::getValue('url') ? Tools::getValue('url') : '#').'" size="55" />
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Displayed:').'</label>
				<div class="margin-form">
					<div id="activediv" style="float: left;">
						<input type="radio" name="display" value="1"'.(Tools::getValue('display',1) ? 'checked="checked"' : '').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
						<input type="radio" name="display" value="0"'.(Tools::getValue('display',1) ? '' : 'checked="checked"').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="margin-form">';
					$this->_html .= '<input type="submit" class="button" name="saveSlider" value="'.$this->l('Save Slider').'" id="saveSlider" />';
					$this->_html .= '					
				</div>
				
			</form>
			<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>
		</fieldset>';
	}
	
	private function _displayUpdateForm()
	{
		global $currentIndex, $cookie;
		if (!Tools::getValue('id_slider'))
		{
			$this->_html .= '<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>';
			return;
		}
		$slider = new SliderClass((int)Tools::getValue('id_slider'));
	 	// Language 
	 	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'imagediv¤captiondiv';

		// Form
		$this->_html .= '
		<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Edit Slider').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">
				<input type="hidden" name="id_slider" value="'.(int)$slider->id_slider.'" id="id_slider" />
				<input type="hidden" name="position" value="'.($slider->position ? $slider->position : SliderClass::getNextPosition()).'" id="position" />
				<div class="margin-form">
					<input type="submit" class="button " name="deleteSlider" value="'.$this->l('Delete Slider').'" id="deleteSlider" onclick="if (!confirm(\'Are you sure that you want to delete this slider?\')) return false "/>
				</div>
				<label>'.$this->l('Image:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						if ($dot_pos = strrpos($slider->image[$language['id_lang']],'.'))
							$thumb_url = _PS_BASE_URL_._MODULE_DIR_.$this->name.'/image/'.substr($slider->image[$language['id_lang']], 0, $dot_pos).'_thumb'.substr($slider->image[$language['id_lang']], $dot_pos);
						else
							$thumb_url =_PS_BASE_URL_._MODULE_DIR_.$this->name.'/image/default_thumb.jpg';
						$this->_html .= '
					<div id="imagediv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="file" name="image_'.$language['id_lang'].'" /><sup> *</sup>
						<p><img src="'.$thumb_url.'" alt="" title="" style="height:45px;width:45px;"/></p>
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'imagediv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Caption:').'</label>
				<div class="margin-form">';
					foreach ($languages as $language)
					{
						$this->_html .= '
					<div id="captiondiv_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="caption_'.$language['id_lang'].'" value="'.(isset($slider->caption[$language['id_lang']]) ? $slider->caption[$language['id_lang']] : '').'" size="55" />
					</div>';
					}
					$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'captiondiv', true);	
					$this->_html .= '
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('URL:').'</label>
				<div class="margin-form">
					<div id="urldiv" style="float: left;">
						<input type="text" name="url" value="'.($slider->url ? $slider->url : '#').'" size="55" />
					</div>
					<div class="clear"></div>
				</div>
				
				<label>'.$this->l('Displayed:').'</label>
				<div class="margin-form">
					<div id="activediv" style="float: left;">
						<input type="radio" name="display" value="1"'.($slider->display ? 'checked="checked"' : '').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'enabled.gif" alt="Enabled" title="Enabled" /></label>
						<input type="radio" name="display" value="0"'.($slider->display ? '' : 'checked="checked"').' />
						<label class="t"><img src="'._PS_ADMIN_IMG_.'disabled.gif" alt="Disabled" title="Disabled" /></label>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="margin-form">';
					$this->_html .= '<input type="submit" class="button" name="saveSlider" value="'.$this->l('Save Slider').'" id="saveSlider" />';
					$this->_html .= '					
				</div>
				
			</form>
			<a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><img src="'._PS_ADMIN_IMG_.'arrow2.gif" alt="" />'.$this->l('Back to list').'</a>
		</fieldset>';
	}
	
	private function getSlidersDisplay()
	{
		$sliders = array();
	 	$results = Db::getInstance()->ExecuteS('SELECT `id_slider` FROM `'._DB_PREFIX_.'csslider` WHERE `display` = 1 ORDER BY `position` ASC');
		foreach ($results as $row)
		{
			$sliders[] = new SliderClass($row['id_slider']);
		}
		return $sliders;
	}
	
	public function hookHeader($params)
	{
		Tools::addCSS(($this->_path).'jquery.nivo.slider.css', 'all');
		Tools::addJS(($this->_path).'jquery.nivo.slider.js');
	}
	
	public function hookTop()
	{
		global $smarty, $cookie;
		
		$sliders = $this->getSlidersDisplay();
		$option = simplexml_load_file(dirname(__FILE__).'/'.'option.xml');
			
		$smarty->assign(array(
			'path' => $this->_path,
			'sliders' => $sliders,
			'option' => $option
		));
		
		return $this->display(__FILE__, 'csslider.tpl');
	}

	public function hookHome()
	{
		global $smarty, $cookie;
		
		$sliders = $this->getSlidersDisplay();
		$option = simplexml_load_file(dirname(__FILE__).'/'.'option.xml');
			
		$smarty->assign(array(
			'path' => $this->_path,
			'sliders' => $sliders,
			'option' => $option
		));
		
		return $this->display(__FILE__, 'csslider.tpl');
	}

	public function hookSlider()
	{
		global $smarty, $cookie;
		
		$sliders = $this->getSlidersDisplay();
		$option = simplexml_load_file(dirname(__FILE__).'/'.'option.xml');
			
		$smarty->assign(array(
			'path' => $this->_path,
			'sliders' => $sliders,
			'option' => $option
		));
		
		return $this->display(__FILE__, 'csslider.tpl');
	}
	
}
?>
