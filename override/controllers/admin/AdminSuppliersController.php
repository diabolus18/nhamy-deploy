<?php

class AdminSuppliersController extends AdminSuppliersControllerCore {

	public function renderForm() {

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

        // Retorna para AdminController e não para AdminSuppliersController
        return call_user_func(array(get_parent_class(get_parent_class($this)), 'renderForm'));
	}

    private function v154() {

        // loads current warehouse
        if (!($obj = $this->loadObject(true)))
            return;

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Suppliers'),
                'image' => '../img/admin/suppliers.gif'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_address',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name'),
                    'name' => 'name',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'cols' => 60,
                    'rows' => 10,
                    'lang' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('Will appear in the supplier list')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone:'),
                    'name' => 'phone',
                    'size' => 15,
                    'maxlength' => 16,
                    'desc' => $this->l('Phone number for this supplier')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:'),
                    'name' => 'address',
                    'size' => 100,
                    'maxlength' => 128,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Número:'),
                    'name' => 'numend',
                    'size' => 20,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Complemento:'),
                    'name' => 'compl',
                    'size' => 30,
                    'maxlength' => 20
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:').' (2)',
                    'name' => 'address2',
                    'size' => 100,
                    'maxlength' => 128,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Postal Code/Zip Code:'),
                    'name' => 'postcode',
                    'size' => 10,
                    'maxlength' => 12,
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('City:'),
                    'name' => 'city',
                    'size' => 20,
                    'maxlength' => 32,
                    'required' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Country:'),
                    'name' => 'id_country',
                    'required' => true,
                    'default_value' => (int)$this->context->country->id,
                    'options' => array(
                        'query' => Country::getCountries($this->context->language->id, false),
                        'id' => 'id_country',
                        'name' => 'name',
                    ),
                    'desc' => $this->l('Country where the state, region or city is located')
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('State'),
                    'name' => 'id_state',
                    'options' => array(
                        'id' => 'id_state',
                        'query' => array(),
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Logo:'),
                    'name' => 'logo',
                    'display_image' => true,
                    'desc' => $this->l('Upload a supplier logo from your computer')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta title:'),
                    'name' => 'meta_title',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta description:'),
                    'name' => 'meta_description',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta keywords:'),
                    'name' => 'meta_keywords',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}',
                    'desc' => $this->l('To add "tags" click in the field, write something and then press "Enter"')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Enable:'),
                    'name' => 'active',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    )
                )
            ),
            'submit' => array(
                'title' => $this->l('   Save   '),
                'class' => 'button'
            )
        );

        // loads current address for this supplier - if possible
        $address = null;
        if (isset($obj->id))
        {
            $id_address = Address::getAddressIdBySupplierId($obj->id);

            if ($id_address > 0)
                $address = new Address((int)$id_address);
        }

        // force specific fields values (address)
        if ($address != null)
        {
            $this->fields_value = array(
                'id_address' => $address->id,
                'phone' => $address->phone,
                'address' => $address->address1,
                'address2' => $address->address2,
                'postcode' => $address->postcode,
                'city' => $address->city,
                'id_country' => $address->id_country,
                'id_state' => $address->id_state,
            );
        }
        else
            $this->fields_value = array(
                'id_address' => 0,
                'id_country' => Configuration::get('PS_COUNTRY_DEFAULT')
            );


        if (Shop::isFeatureActive())
        {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }

        // set logo image
        $image = ImageManager::thumbnail(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg', $this->table.'_'.(int)$this->object->id.'.'.$this->imageType, 350, $this->imageType, true);
        $this->fields_value['image'] = $image ? $image : false;
        $this->fields_value['size'] = $image ? filesize(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg') / 1000 : false;

    }

    private function v155() {

        // loads current warehouse
        if (!($obj = $this->loadObject(true)))
            return;

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Suppliers'),
                'image' => '../img/admin/suppliers.gif'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_address',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name'),
                    'name' => 'name',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'cols' => 60,
                    'rows' => 10,
                    'lang' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('Will appear in the supplier list')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone:'),
                    'name' => 'phone',
                    'size' => 15,
                    'maxlength' => 16,
                    'desc' => $this->l('Phone number for this supplier')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:'),
                    'name' => 'address',
                    'size' => 100,
                    'maxlength' => 128,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Número:'),
                    'name' => 'numend',
                    'size' => 20,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Complemento:'),
                    'name' => 'compl',
                    'size' => 30,
                    'maxlength' => 20
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:').' (2)',
                    'name' => 'address2',
                    'size' => 100,
                    'maxlength' => 128,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Postal Code/Zip Code:'),
                    'name' => 'postcode',
                    'size' => 10,
                    'maxlength' => 12,
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('City:'),
                    'name' => 'city',
                    'size' => 20,
                    'maxlength' => 32,
                    'required' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Country:'),
                    'name' => 'id_country',
                    'required' => true,
                    'default_value' => (int)$this->context->country->id,
                    'options' => array(
                        'query' => Country::getCountries($this->context->language->id, false),
                        'id' => 'id_country',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('State'),
                    'name' => 'id_state',
                    'options' => array(
                        'id' => 'id_state',
                        'query' => array(),
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Logo:'),
                    'name' => 'logo',
                    'display_image' => true,
                    'desc' => $this->l('Upload a supplier logo from your computer')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta title:'),
                    'name' => 'meta_title',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta description:'),
                    'name' => 'meta_description',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta keywords:'),
                    'name' => 'meta_keywords',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}',
                    'desc' => $this->l('To add "tags" click in the field, write something and then press "Enter"')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Enable:'),
                    'name' => 'active',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    )
                )
            ),
            'submit' => array(
                'title' => $this->l('   Save   '),
                'class' => 'button'
            )
        );

        // loads current address for this supplier - if possible
        $address = null;
        if (isset($obj->id))
        {
            $id_address = Address::getAddressIdBySupplierId($obj->id);

            if ($id_address > 0)
                $address = new Address((int)$id_address);
        }

        // force specific fields values (address)
        if ($address != null)
        {
            $this->fields_value = array(
                'id_address' => $address->id,
                'phone' => $address->phone,
                'address' => $address->address1,
                'address2' => $address->address2,
                'postcode' => $address->postcode,
                'city' => $address->city,
                'id_country' => $address->id_country,
                'id_state' => $address->id_state,
            );
        }
        else
            $this->fields_value = array(
                'id_address' => 0,
                'id_country' => Configuration::get('PS_COUNTRY_DEFAULT')
            );


        if (Shop::isFeatureActive())
        {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }

        // set logo image
        $image = ImageManager::thumbnail(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg', $this->table.'_'.(int)$this->object->id.'.'.$this->imageType, 350, $this->imageType, true);
        $this->fields_value['image'] = $image ? $image : false;
        $this->fields_value['size'] = $image ? filesize(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg') / 1000 : false;

    }

    private function v156() {

        // loads current warehouse
        if (!($obj = $this->loadObject(true)))
            return;

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Suppliers'),
                'image' => '../img/admin/suppliers.gif'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_address',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name'),
                    'name' => 'name',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'cols' => 60,
                    'rows' => 10,
                    'lang' => true,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('Will appear in the supplier list'),
                    'autoload_rte' => 'rte' //Enable TinyMCE editor for short description
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone:'),
                    'name' => 'phone',
                    'size' => 15,
                    'maxlength' => 16,
                    'desc' => $this->l('Phone number for this supplier')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:'),
                    'name' => 'address',
                    'size' => 100,
                    'maxlength' => 128,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Número:'),
                    'name' => 'numend',
                    'size' => 20,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Complemento:'),
                    'name' => 'compl',
                    'size' => 30,
                    'maxlength' => 20
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:').' (2)',
                    'name' => 'address2',
                    'size' => 100,
                    'maxlength' => 128,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Postal Code/Zip Code:'),
                    'name' => 'postcode',
                    'size' => 10,
                    'maxlength' => 12,
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('City:'),
                    'name' => 'city',
                    'size' => 20,
                    'maxlength' => 32,
                    'required' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Country:'),
                    'name' => 'id_country',
                    'required' => true,
                    'default_value' => (int)$this->context->country->id,
                    'options' => array(
                        'query' => Country::getCountries($this->context->language->id, false),
                        'id' => 'id_country',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('State'),
                    'name' => 'id_state',
                    'options' => array(
                        'id' => 'id_state',
                        'query' => array(),
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Logo:'),
                    'name' => 'logo',
                    'display_image' => true,
                    'desc' => $this->l('Upload a supplier logo from your computer')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta title:'),
                    'name' => 'meta_title',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta description:'),
                    'name' => 'meta_description',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta keywords:'),
                    'name' => 'meta_keywords',
                    'lang' => true,
                    'hint' => $this->l('Forbidden characters:').' <>;=#{}',
                    'desc' => $this->l('To add "tags" click in the field, write something and then press "Enter"')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Enable:'),
                    'name' => 'active',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    )
                )
            ),
            'submit' => array(
                'title' => $this->l('   Save   '),
                'class' => 'button'
            )
        );

        // loads current address for this supplier - if possible
        $address = null;
        if (isset($obj->id))
        {
            $id_address = Address::getAddressIdBySupplierId($obj->id);

            if ($id_address > 0)
                $address = new Address((int)$id_address);
        }

        // force specific fields values (address)
        if ($address != null)
        {
            $this->fields_value = array(
                'id_address' => $address->id,
                'phone' => $address->phone,
                'address' => $address->address1,
                'address2' => $address->address2,
                'postcode' => $address->postcode,
                'city' => $address->city,
                'id_country' => $address->id_country,
                'id_state' => $address->id_state,
            );
        }
        else
            $this->fields_value = array(
                'id_address' => 0,
                'id_country' => Configuration::get('PS_COUNTRY_DEFAULT')
            );


        if (Shop::isFeatureActive())
        {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }

        // set logo image
        $image = ImageManager::thumbnail(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg', $this->table.'_'.(int)$this->object->id.'.'.$this->imageType, 350, $this->imageType, true);
        $this->fields_value['image'] = $image ? $image : false;
        $this->fields_value['size'] = $image ? filesize(_PS_SUPP_IMG_DIR_.'/'.$this->object->id.'.jpg') / 1000 : false;

    }

    private function v160() {

        // loads current warehouse
        if (!($obj = $this->loadObject(true)))
            return;

        $image = _PS_SUPP_IMG_DIR_.$obj->id.'.jpg';
        $image_url = ImageManager::thumbnail($image, $this->table.'_'.(int)$obj->id.'.'.$this->imageType, 350,
            $this->imageType, true, true);
        $image_size = file_exists($image) ? filesize($image) / 1000 : false;

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Suppliers'),
                'icon' => 'icon-truck'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_address',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name'),
                    'name' => 'name',
                    'required' => true,
                    'col' => 4,
                    'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'lang' => true,
                    'hint' => array(
                        $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                        $this->l('Will appear in the supplier list')
                    ),
                    'autoload_rte' => 'rte' //Enable TinyMCE editor for short description
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone:'),
                    'name' => 'phone',
                    'maxlength' => 16,
                    'col' => 4,
                    'hint' => $this->l('Phone number for this supplier')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address:'),
                    'name' => 'address',
                    'maxlength' => 128,
                    'col' => 6,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Número:'),
                    'name' => 'numend',
                    'col' => 6,
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Complemento:'),
                    'name' => 'compl',
                    'col' => 6,
                    'maxlength' => 20
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bairro:'),
                    'name' => 'address2',
                    'col' => 6,
                    'maxlength' => 128,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Postal Code/Zip Code:'),
                    'name' => 'postcode',
                    'maxlength' => 12,
                    'col' => 2,
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('City:'),
                    'name' => 'city',
                    'maxlength' => 32,
                    'col' => 4,
                    'required' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Country:'),
                    'name' => 'id_country',
                    'required' => true,
                    'col' => 4,
                    'default_value' => (int)$this->context->country->id,
                    'options' => array(
                        'query' => Country::getCountries($this->context->language->id, false),
                        'id' => 'id_country',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('State'),
                    'name' => 'id_state',
                    'col' => 4,
                    'options' => array(
                        'id' => 'id_state',
                        'query' => array(),
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Logo:'),
                    'name' => 'logo',
                    'display_image' => true,
                    'image' => $image_url ? $image_url : false,
                    'size' => $image_size,
                    'hint' => $this->l('Upload a supplier logo from your computer')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta title:'),
                    'name' => 'meta_title',
                    'lang' => true,
                    'col' => 4,
                    'hint' => $this->l('Forbidden characters:').' &lt;&gt;;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta description:'),
                    'name' => 'meta_description',
                    'lang' => true,
                    'col' => 6,
                    'hint' => $this->l('Forbidden characters:').' &lt;&gt;;=#{}'
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta keywords:'),
                    'name' => 'meta_keywords',
                    'lang' => true,
                    'col' => 6,
                    'hint' => array(
                        $this->l('To add "tags" click in the field, write something and then press "Enter"'),
                        $this->l('Forbidden characters:').' &lt;&gt;;=#{}'
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable:'),
                    'name' => 'active',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    )
                )
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            )
        );

        // loads current address for this supplier - if possible
        $address = null;
        if (isset($obj->id))
        {
            $id_address = Address::getAddressIdBySupplierId($obj->id);

            if ($id_address > 0)
                $address = new Address((int)$id_address);
        }

        // force specific fields values (address)
        if ($address != null)
        {
            $this->fields_value = array(
                'id_address' => $address->id,
                'phone' => $address->phone,
                'address' => $address->address1,
                'address2' => $address->address2,
                'postcode' => $address->postcode,
                'city' => $address->city,
                'id_country' => $address->id_country,
                'id_state' => $address->id_state,
            );
        }
        else
            $this->fields_value = array(
                'id_address' => 0,
                'id_country' => Configuration::get('PS_COUNTRY_DEFAULT')
            );


        if (Shop::isFeatureActive())
        {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }

    }

}

