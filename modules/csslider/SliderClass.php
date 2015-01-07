<?php

class SliderClass extends ObjectModel
{
	public $id_slider;
	public $url;
	public $position;
	public $display;
	public $image;
	public $caption;
	protected $tables = array ('csslider', 'csslider_lang');
	protected $table = 'csslider';
	protected $identifier = 'id_slider';
	
	protected $fieldsRequiredLang = array('image');
	
	protected $fieldsValidate = array(
		'display' => 'isBool'
	);
	protected 	$fieldsValidateLang = array(
		'image' => 'isGenericName',
		'caption' => 'isString'
	);
	
	public $thumb_width = 45;
	public $thumb_height = 45;
	
	public function getFields()
	{
		parent::validateFields();
		
		$fields['id_slider'] = pSQL($this->id_slider);
		$fields['display'] = pSQL($this->display);
		$fields['url'] = pSQL($this->url);
		$fields['position'] = pSQL($this->position);

		return $fields;
	}
	
	public function getTranslationsFieldsChild()
	{
		self::validateFieldsLang();

		$fieldsArray = array('image', 'caption');
		$fields = array();
		$languages = Language::getLanguages(false);
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		foreach ($languages as $language)
		{
			$fields[$language['id_lang']]['id_lang'] = (int)($language['id_lang']);
			$fields[$language['id_lang']][$this->identifier] = (int)($this->id);
			foreach ($fieldsArray as $field)
			{
				if (!Validate::isTableOrIdentifier($field))
					die(Tools::displayError());
				if (isset($this->{$field}[$language['id_lang']]) AND !empty($this->{$field}[$language['id_lang']]))
					$fields[$language['id_lang']][$field] = pSQL($this->{$field}[$language['id_lang']], true);
				elseif (in_array($field, $this->fieldsRequiredLang))
				{
					if ($this->{$field} != '')
						$fields[$language['id_lang']][$field] = pSQL($this->{$field}[$defaultLanguage]);
				}
				else
					$fields[$language['id_lang']][$field] = '';
			}
		}
		return $fields;
	}
	
	public function copyFromPost()
	{
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table)
				$this->{$key} = $value;

		if (sizeof($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages AS $language)
				foreach ($this->fieldsValidateLang AS $field => $validation)
					if (isset($_POST[$field.'_'.(int)($language['id_lang'])]))
						$this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
		}
	}
	
	public static function getNextId()
	{
		$max = Db::getInstance()->getValue('SELECT MAX(id_slider) FROM `'._DB_PREFIX_.'csslider`');
		return ($max ? $max + 1 : 1);
	}
	
	public static function getNextPosition()
	{
		$max = Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'csslider`');
		return ($max ? $max + 1 : 1);
	}
	
	public function uploadImage($id_slider = null)
	{
		$errors = "";
		$languages = Language::getLanguages(false);
		foreach ($languages AS $language)
		{
			if (isset($_FILES['image_'.$language['id_lang']]) AND isset($_FILES['image_'.$language['id_lang']]['tmp_name']) AND !empty($_FILES['image_'.$language['id_lang']]['tmp_name']))
			{
				if ($error = checkImage($_FILES['image_'.$language['id_lang']], Tools::convertBytes(ini_get('upload_max_filesize'))))
					$errors .= $error;
				elseif ($dot_pos = strrpos($_FILES['image_'.$language['id_lang']]['name'],'.'))
				{
					$ext = substr($_FILES['image_'.$language['id_lang']]['name'], $dot_pos+1);
					$newname = ($id_slider ? $id_slider : $this->getNextId()).'_'.$language['id_lang'];

					if (!move_uploaded_file($_FILES['image_'.$language['id_lang']]['tmp_name'],_PS_MODULE_DIR_.'csslider/image/'.$newname.'.'.$ext))
						$errors .= Tools::displayError('Error move uploaded file');
					else
					{
						$this->image[(int)($language['id_lang'])] = $newname.'.'.$ext;
						imageResize(_PS_MODULE_DIR_.'csslider/image/'.$newname.'.'.$ext, _PS_MODULE_DIR_.'csslider/image/'.$newname.'_thumb.'.$ext, $this->thumb_width, $this->thumb_height);
					}
				}
			}
		}
		return ($errors != "" ? $errors : false);
	}
	
	public function validateController($htmlentities = true, $copy_post = false)
	{
		$errors = array();
		
		if( $error = $this->uploadImage($this->id_slider))
		{
			$errors[] = $error;
			return $errors;
		}
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$field = "image";
		if (!$this->{$field} OR !sizeof($this->{$field}) OR ($this->{$field}[$defaultLanguage] !== '0' AND empty($this->{$field}[$defaultLanguage])))
			$errors[] = '<b>Image</b> '.Tools::displayError('is empty for default language.');

		$validate = new Validate();
		foreach ($this->fieldsValidateLang as $fieldArray => $method)
		{
			if (!is_array($this->{$fieldArray}))
				continue ;
			foreach ($this->{$fieldArray} as $k => $value)
				if (!method_exists($validate, $method))
					die (Tools::displayError('Validation function not found.').' '.Tools::safeOutput($method));
				elseif (!empty($value) AND !call_user_func(array('Validate', $method), $value))
				{
					$errors[] = Tools::displayError('The following field is invalid according to the validate method ').'<b>'.$method.'</b>:<br/> ('.self::displayFieldName($fieldArray, get_class($this), $htmlentities).' = '.$value.' '.Tools::displayError('for language').' '.$k;
				}
		}
		
		return $errors;
	}
	
	public function updatePosition($way, $position)
	{
		if (!isset($position))
			return false;

		$result = (Db::getInstance()->Execute('
			UPDATE `'._DB_PREFIX_.'csslider`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)($this->position).' AND `position` <= '.(int)($position)
				: '< '.(int)($this->position).' AND `position` >= '.(int)($position)))
		AND Db::getInstance()->Execute('
			UPDATE `'._DB_PREFIX_.'csslider`
			SET `position` = '.(int)($position).'
			WHERE `id_slider`='.(int)($this->id_slider)));
		return $result;
	}
	public function updateStatus($status)
	{
		if (!isset($status))
			return false;
		if($status == 0)
			$status = 1;
		else 
			$status = 0;
		$result = (Db::getInstance()->Execute('
			UPDATE `'._DB_PREFIX_.'csslider`
			SET `display`='.$status.'
			WHERE `id_slider`='.(int)($this->id_slider)));
		return $result;
	}
}

?>
