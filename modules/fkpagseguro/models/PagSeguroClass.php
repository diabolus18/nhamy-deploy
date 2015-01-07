<?php

class PagSeguroClass extends ObjectModel {

    public static $definition = array(
        'table' => 'fkpagseguro',
        'primary' => 'id_pagseguro',
        'multilang' => false,
        'fields' => array(
            'cod_cliente'   =>	array('type' => self::TYPE_INT),
            'ref_pedido'    => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 32),
            'num_pedido'    =>  array('type' => self::TYPE_INT),
            'url_pagseguro' => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 255),
            'cod_transacao' => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 255),
            'status'        =>	array('type' => self::TYPE_INT),
            'desc_status'   => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 40),
            'pagto'         =>	array('type' => self::TYPE_INT),
            'desc_pagto'    => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 40),
            'data_status'   =>	array('type' => self::TYPE_DATE),
            'data_pedido'   =>	array('type' => self::TYPE_DATE),
        ),
    );

    public static function excluiRegistro($id) {
        return Db::getInstance()->delete('fkpagseguro', 'id_pagseguro = '.(int)$id);
    }

}
