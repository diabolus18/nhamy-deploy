<?php

class AdminManufacturersController extends AdminManufacturersControllerCore {

	public function renderFormAddress()	{

        $ps_version = substr(_PS_VERSION_, 0, 5);

        if (version_compare($ps_version, '1.5.4', '==')) {
            $this->v154();
        }elseif (version_compare($ps_version, '1.5.5', '==')) {
            $this->v155();
        }elseif (version_compare($ps_version, '1.5.6', '==')) {
            $this->v156();
        }elseif (version_compare($ps_version, '1.6.0', '==')) {
            $this->v160();
        }

	}

    private function  v154() {

        // Change table and className for addresses
        $this->table = 'address';
        $this->className = 'Address';
        $id_address = Tools::getValue('id_address');

        // Create Object Address
        $address = new Address($id_address);

        $form = array(
            'legend' => array(
                'title' => $this->l('Addresses'),
                'image' => '../img/admin/contact.gif'
            )
        );

        if (!$address->id_manufacturer || !Manufacturer::manufacturerExists($address->id_manufacturer))
            $form['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Choose the manufacturer:'),
                'name' => 'id_manufacturer',
                'options' => array(
                    'query' => Manufacturer::getManufacturers(),
                    'id' => 'id_manufacturer',
                    'name' => 'name'
                )
            );
        else
        {
            $form['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Manufacturer:'),
                'name' => 'name',
                'disabled' => true,
            );

            $form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_manufacturer'
            );
        }

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'alias',
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Last name:'),
            'name' => 'lastname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('First name:'),
            'name' => 'firstname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address:'),
            'name' => 'address1',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Número'),
            'name' => 'numend',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Complemento'),
            'name' => 'compl',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address (2):'),
            'name' => 'address2',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Zip Code/Postal Code'),
            'name' => 'postcode',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('City:'),
            'name' => 'city',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('Country:'),
            'name' => 'id_country',
            'required' => false,
            'default_value' => (int)$this->context->country->id,
            'options' => array(
                'query' => Country::getCountries($this->context->language->id),
                'id' => 'id_country',
                'name' => 'name',
            )
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('State:'),
            'name' => 'id_state',
            'required' => false,
            'options' => array(
                'query' => array(),
                'id' => 'id_state',
                'name' => 'name'
            )
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Home phone:'),
            'name' => 'phone',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Mobile phone:'),
            'name' => 'phone_mobile',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'textarea',
            'label' => $this->l('Other:'),
            'name' => 'other',
            'cols' => 36,
            'rows' => 4,
            'required' => false,
            'hint' => $this->l('Forbidden characters:').' <>;=#{}'
        );
        $form['submit'] = array(
            'title' => $this->l('Save   '),
            'class' => 'button'
        );

        $this->fields_value = array(
            'name' => Manufacturer::getNameById($address->id_manufacturer),
            'alias' => 'manufacturer',
            'id_country' => Configuration::get('PS_COUNTRY_DEFAULT')
        );

        $this->initToolbar();
        $this->fields_form[0]['form'] = $form;
        $this->getlanguages();
        $helper = new HelperForm();
        $helper->currentIndex = self::$currentIndex;
        $helper->token = $this->token;
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->title = $this->l('Edit Addresses');
        $helper->id = $address->id;
        $helper->toolbar_scroll = true;
        $helper->languages = $this->_languages;
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->fields_value = $this->getFieldsValue($address);
        $helper->toolbar_btn = $this->toolbar_btn;
        $this->content .= $helper->generateForm($this->fields_form);
    }

    private function  v155() {

        // Change table and className for addresses
        $this->table = 'address';
        $this->className = 'Address';
        $id_address = Tools::getValue('id_address');

        // Create Object Address
        $address = new Address($id_address);

        $form = array(
            'legend' => array(
                'title' => $this->l('Addresses'),
                'image' => '../img/admin/contact.gif'
            )
        );

        if (!$address->id_manufacturer || !Manufacturer::manufacturerExists($address->id_manufacturer))
            $form['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Choose the manufacturer:'),
                'name' => 'id_manufacturer',
                'options' => array(
                    'query' => Manufacturer::getManufacturers(),
                    'id' => 'id_manufacturer',
                    'name' => 'name'
                )
            );
        else
        {
            $form['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Manufacturer:'),
                'name' => 'name',
                'disabled' => true,
            );

            $form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_manufacturer'
            );
        }

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'alias',
        );

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'id_address',
        );

        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Last name:'),
            'name' => 'lastname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('First name:'),
            'name' => 'firstname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address:'),
            'name' => 'address1',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Número'),
            'name' => 'numend',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Complemento'),
            'name' => 'compl',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address (2):'),
            'name' => 'address2',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Zip Code/Postal Code'),
            'name' => 'postcode',
            'required' => true,
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('City:'),
            'name' => 'city',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('Country:'),
            'name' => 'id_country',
            'required' => false,
            'default_value' => (int)$this->context->country->id,
            'options' => array(
                'query' => Country::getCountries($this->context->language->id),
                'id' => 'id_country',
                'name' => 'name',
            )
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('State:'),
            'name' => 'id_state',
            'required' => false,
            'options' => array(
                'query' => array(),
                'id' => 'id_state',
                'name' => 'name'
            )
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Home phone:'),
            'name' => 'phone',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Mobile phone:'),
            'name' => 'phone_mobile',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'textarea',
            'label' => $this->l('Other:'),
            'name' => 'other',
            'cols' => 36,
            'rows' => 4,
            'required' => false,
            'hint' => $this->l('Forbidden characters:').' <>;=#{}'
        );
        $form['submit'] = array(
            'title' => $this->l('Save   '),
            'class' => 'button'
        );

        $this->fields_value = array(
            'name' => Manufacturer::getNameById($address->id_manufacturer),
            'alias' => 'manufacturer',
            'id_country' => $address->id_country
        );

        $this->initToolbar();
        $this->fields_form[0]['form'] = $form;
        $this->getlanguages();
        $helper = new HelperForm();
        $helper->currentIndex = self::$currentIndex;
        $helper->token = $this->token;
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->title = $this->l('Edit Addresses');
        $helper->id = $address->id;
        $helper->toolbar_scroll = true;
        $helper->languages = $this->_languages;
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->fields_value = $this->getFieldsValue($address);
        $helper->toolbar_btn = $this->toolbar_btn;
        $this->content .= $helper->generateForm($this->fields_form);
    }

    private function  v156() {

        // Change table and className for addresses
        $this->table = 'address';
        $this->className = 'Address';
        $id_address = Tools::getValue('id_address');

        // Create Object Address
        $address = new Address($id_address);

        $form = array(
            'legend' => array(
                'title' => $this->l('Addresses'),
                'image' => '../img/admin/contact.gif'
            )
        );

        if (!$address->id_manufacturer || !Manufacturer::manufacturerExists($address->id_manufacturer))
            $form['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Choose the manufacturer:'),
                'name' => 'id_manufacturer',
                'options' => array(
                    'query' => Manufacturer::getManufacturers(),
                    'id' => 'id_manufacturer',
                    'name' => 'name'
                )
            );
        else
        {
            $form['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Manufacturer:'),
                'name' => 'name',
                'disabled' => true,
            );

            $form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_manufacturer'
            );
        }

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'alias',
        );

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'id_address',
        );

        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Last name:'),
            'name' => 'lastname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('First name:'),
            'name' => 'firstname',
            'size' => 33,
            'required' => true,
            'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address:'),
            'name' => 'address1',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Número'),
            'name' => 'numend',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Complemento'),
            'name' => 'compl',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address (2):'),
            'name' => 'address2',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Zip Code/Postal Code'),
            'name' => 'postcode',
            'required' => true,
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('City:'),
            'name' => 'city',
            'size' => 33,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('Country:'),
            'name' => 'id_country',
            'required' => false,
            'default_value' => (int)$this->context->country->id,
            'options' => array(
                'query' => Country::getCountries($this->context->language->id),
                'id' => 'id_country',
                'name' => 'name',
            )
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('State:'),
            'name' => 'id_state',
            'required' => false,
            'options' => array(
                'query' => array(),
                'id' => 'id_state',
                'name' => 'name'
            )
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Home phone:'),
            'name' => 'phone',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Mobile phone:'),
            'name' => 'phone_mobile',
            'size' => 33,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'textarea',
            'label' => $this->l('Other:'),
            'name' => 'other',
            'cols' => 36,
            'rows' => 4,
            'required' => false,
            'hint' => $this->l('Forbidden characters:').' <>;=#{}'
        );
        $form['submit'] = array(
            'title' => $this->l('Save   '),
            'class' => 'button'
        );

        $this->fields_value = array(
            'name' => Manufacturer::getNameById($address->id_manufacturer),
            'alias' => 'manufacturer',
            'id_country' => $address->id_country
        );

        $this->initToolbar();
        $this->fields_form[0]['form'] = $form;
        $this->getlanguages();
        $helper = new HelperForm();
        $helper->currentIndex = self::$currentIndex;
        $helper->token = $this->token;
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->title = $this->l('Edit Addresses');
        $helper->id = $address->id;
        $helper->toolbar_scroll = true;
        $helper->languages = $this->_languages;
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->fields_value = $this->getFieldsValue($address);
        $helper->toolbar_btn = $this->toolbar_btn;
        $this->content .= $helper->generateForm($this->fields_form);
    }

    private function  v160() {

        // Change table and className for addresses
        $this->table = 'address';
        $this->className = 'Address';
        $id_address = Tools::getValue('id_address');

        // Create Object Address
        $address = new Address($id_address);

        $form = array(
            'legend' => array(
                'title' => $this->l('Addresses'),
                'icon' => 'icon-building'
            )
        );

        if (!$address->id_manufacturer || !Manufacturer::manufacturerExists($address->id_manufacturer))
            $form['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Choose the manufacturer:'),
                'name' => 'id_manufacturer',
                'options' => array(
                    'query' => Manufacturer::getManufacturers(),
                    'id' => 'id_manufacturer',
                    'name' => 'name'
                )
            );
        else
        {
            $form['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Manufacturer:'),
                'name' => 'name',
                'col' => 4,
                'disabled' => true,
            );

            $form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_manufacturer'
            );
        }

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'alias',
        );

        $form['input'][] = array(
            'type' => 'hidden',
            'name' => 'id_address',
        );

        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Last name:'),
            'name' => 'lastname',
            'required' => true,
            'col' => 4,
            'hint' => $this->l('Invalid characters:').' 0-9!&lt;&gt;,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('First name:'),
            'name' => 'firstname',
            'required' => true,
            'col' => 4,
            'hint' => $this->l('Invalid characters:').' 0-9!&lt;&gt;,;?=+()@#"�{}_$%:'
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address:'),
            'name' => 'address1',
            'col' => 6,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Número'),
            'name' => 'numend',
            'col' => 4,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Complemento'),
            'name' => 'compl',
            'col' => 4,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Address (2):'),
            'name' => 'address2',
            'col' => 6,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Postcode / Zip Code:'),
            'name' => 'postcode',
            'col' => 2,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('City:'),
            'name' => 'city',
            'col' => 4,
            'required' => true,
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('Country:'),
            'name' => 'id_country',
            'required' => false,
            'default_value' => (int)$this->context->country->id,
            'col' => 4,
            'options' => array(
                'query' => Country::getCountries($this->context->language->id),
                'id' => 'id_country',
                'name' => 'name',
            )
        );
        $form['input'][] = array(
            'type' => 'select',
            'label' => $this->l('State:'),
            'name' => 'id_state',
            'required' => false,
            'col' => 4,
            'options' => array(
                'query' => array(),
                'id' => 'id_state',
                'name' => 'name'
            )
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Home phone:'),
            'name' => 'phone',
            'col' => 4,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'text',
            'label' => $this->l('Mobile phone:'),
            'name' => 'phone_mobile',
            'col' => 4,
            'required' => false,
        );
        $form['input'][] = array(
            'type' => 'textarea',
            'label' => $this->l('Other:'),
            'name' => 'other',
            'required' => false,
            'hint' => $this->l('Forbidden characters:').' &lt;&gt;;=#{}',
            'rows' => 2,
            'cols' => 10,
            'col' => 6,
        );
        $form['submit'] = array(
            'title' => $this->l('Save'),
        );

        $this->fields_value = array(
            'name' => Manufacturer::getNameById($address->id_manufacturer),
            'alias' => 'manufacturer',
            'id_country' => $address->id_country
        );

        $this->initToolbar();
        $this->fields_form[0]['form'] = $form;
        $this->getlanguages();
        $helper = new HelperForm();
        $helper->show_cancel_button = true;

        $back = Tools::safeOutput(Tools::getValue('back', ''));
        if (empty($back))
            $back = self::$currentIndex.'&token='.$this->token;
        if (!Validate::isCleanHtml($back))
            die(Tools::displayError());

        $helper->back_url = $back;
        $helper->currentIndex = self::$currentIndex;
        $helper->token = $this->token;
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->title = $this->l('Edit Addresses');
        $helper->id = $address->id;
        $helper->toolbar_scroll = true;
        $helper->languages = $this->_languages;
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->fields_value = $this->getFieldsValue($address);
        $helper->toolbar_btn = $this->toolbar_btn;
        $this->content .= $helper->generateForm($this->fields_form);

    }

}
