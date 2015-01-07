<?php

include_once dirname(__FILE__).'/../../models/PagSeguroClass.php';

class AdminPagSeguroController extends ModuleAdminController {

    public function __construct() {

        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')){
            $this->show_toolbar = false;
        }else {
            $this->bootstrap = true;
        }

        $context = Context::getContext();

        $this->table = 'fkpagseguro';
        $this->className = 'PagSeguroClass';
        $this->identifier = 'id_pagseguro';
        $this->lang = false;
        $this->addRowAction('delete');

        $this->_select = 'CONCAT(b.`firstname`, \' \', b.`lastname`) AS `cliente`, c.`total_paid_tax_incl` AS `total_pedido`';
        $this->_join = 'LEFT JOIN `'._DB_PREFIX_.'customer` b ON (b.`id_customer` = a.`cod_cliente`)
                        LEFT JOIN `'._DB_PREFIX_.'orders` c ON (c.`id_order` = a.`num_pedido`)';
        $this->_filter = 'AND a.`id_shop` = '.(int)$context->shop->id;
        $this->_orderBy = 'data_pedido';
        $this->_orderWay = 'DESC';


        $this->fields_list = array(
            'id_pagseguro' => array(
                'title' => $this->l('Id'),
                'width' => 50,
                'align' => 'center',
                'filter_key' => 'a!id_pagseguro'
            ),
            'data_pedido' => array(
                'title' => $this->l('Data Pedido'),
                'width' => 130,
                'align' => 'right',
                'type' => 'datetime',
                'filter_key' => 'a!data_pedido'
            ),
            'ref_pedido' => array(
                'title' => $this->l('Referência Pedido'),
                'align' => 'center',
                'width' => 80
            ),
            'num_pedido' => array(
                'title' => $this->l('Pedido'),
                'align' => 'center',
                'width' => 60
            ),
            'total_pedido' => array(
                'title' => $this->l('Total Pedido'),
                'width' => 70,
                'align' => 'right',
                'type' => 'price'
            ),
            'cod_cliente' => array(
                'title' => $this->l('Código Cliente'),
                'align' => 'center',
                'width' => 70
            ),
            'cliente' => array(
                'title' => $this->l('Cliente'),
                'align' => 'left',
                'width' => 150
            ),
            'data_status' => array(
                'title' => $this->l('Data Status'),
                'width' => 130,
                'align' => 'right',
                'type' => 'datetime',
                'filter_key' => 'a!data_status'
            ),
            'status' => array(
                'title' => $this->l('Status'),
                'align' => 'center',
                'width' => 40
            ),
            'desc_status' => array(
                'title' => $this->l('Descrição Status'),
                'align' => 'left',
                'width' => 150,
                'prefix' => '<b>',
                'suffix' => '</b>'
            ),
            'pagto' => array(
                'title' => $this->l('Pagamento'),
                'align' => 'center',
                'width' => 40
            ),
            'desc_pagto' => array(
                'title' => $this->l('Descrição Pagamento'),
                'align' => 'left',
                'width' => 150,
                'prefix' => '<b>',
                'suffix' => '</b>'
            )

        );

        parent::__construct();
    }

    public function processDelete() {
        return PagSeguroClass::excluiRegistro(Tools::getValue('id_pagseguro'));
    }

}
