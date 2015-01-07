<?php

require_once('../../config/config.inc.php');
require_once('pagseguro.php');

// Recebe o tipo e codigo da notificação do PagSeguro
$id_type = $_POST['notificationType'];
$id_code = $_POST['notificationCode'];

// Consulta a notificacao
$pagseguro = new pagseguro();

if (!$pagseguro->consultaNotificacao($id_type, $id_code)) {
    return true;
}

// Atualiza a tabela de controle
$dados = array(
    'cod_transacao' => $pagseguro->getCodTransacao(),
    'status'        => $pagseguro->getStatus(),
    'desc_status'   => $pagseguro->getDescStatus(),
    'pagto'         => $pagseguro->getPagto(),
    'desc_pagto'    => $pagseguro->getDescPagto(),
    'data_status'   => $date = date("Y/m/d h:i:s")
);

if (is_numeric($pagseguro->getReferencia())) {
    $dbRow = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'fkpagseguro WHERE `num_pedido` = '.(int)$pagseguro->getReferencia());
    if ($dbRow) {
        Db::getInstance()->update('fkpagseguro', $dados, '`num_pedido` = '.(int)$pagseguro->getReferencia());
    }
}else {
    $dbRow = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'fkpagseguro WHERE `ref_pedido` = "'.$pagseguro->getReferencia().'"');
    if ($dbRow) {
        Db::getInstance()->update('fkpagseguro', $dados, '`ref_pedido` = "'.$pagseguro->getReferencia().'"');
    }
}

// Altera o status do pedido
if ($dbRow And (Configuration::get('FKPAGSEGURO_STATUS_PAGO') == 'on' Or Configuration::get('FKPAGSEGURO_STATUS_CANC') == 'on')) {
    $pagseguro->atlStatusPed($dbRow['num_pedido'], $pagseguro->getStatus());
}

return true;