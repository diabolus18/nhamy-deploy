<?php

require_once (dirname(__FILE__) . '/../../../../config/config.inc.php');
require_once (dirname(__FILE__) . '/../../pagseguro.php');

Class fkpagseguroRetornoModuleFrontController extends ModuleFrontController {

    public function init() {

        $this->display_column_right = (Configuration::get('FKPAGSEGURO_COLUNA_DIREITA') == 'on' ? true : false);
        $this->display_column_left = (Configuration::get('FKPAGSEGURO_COLUNA_ESQUERDA') == 'on' ? true : false);

        parent::init();
    }

    public function initContent() {

        parent::initContent();

        // Recebe o codigo de transacao retornado do PagSeguros
        $id_transacao = $_GET['id'];

        // Inicializa variaveis
        $pedido = '';
        $referencia = '';
        $valor = '0';

        // Consulta o status da transacao
        $pagseguro = new pagseguro();

        if ($pagseguro->consultaTransacao($id_transacao)) {

            if (is_numeric($pagseguro->getReferencia())) {

                $sql = 'SELECT '._DB_PREFIX_.'fkpagseguro.num_pedido, '._DB_PREFIX_.'fkpagseguro.ref_pedido, '._DB_PREFIX_.'orders.total_paid_tax_incl AS total_pedido
                        FROM '._DB_PREFIX_.'fkpagseguro
                        INNER JOIN '._DB_PREFIX_.'orders
                            ON '._DB_PREFIX_.'fkpagseguro.num_pedido = '._DB_PREFIX_.'orders.id_order
                        WHERE '._DB_PREFIX_.'fkpagseguro.num_pedido = '.(int)$pagseguro->getReferencia();

                $dados_db = Db::getInstance()->getRow($sql);
            }else {
                $sql = 'SELECT '._DB_PREFIX_.'fkpagseguro.num_pedido, '._DB_PREFIX_.'fkpagseguro.ref_pedido, '._DB_PREFIX_.'orders.total_paid_tax_incl AS total_pedido
                        FROM '._DB_PREFIX_.'fkpagseguro
                        INNER JOIN '._DB_PREFIX_.'orders
                            ON '._DB_PREFIX_.'fkpagseguro.num_pedido = '._DB_PREFIX_.'orders.id_order
                        WHERE '._DB_PREFIX_.'fkpagseguro.ref_pedido = "'.$pagseguro->getReferencia().'"';
                $dados_db = Db::getInstance()->getRow($sql);
            }

            if ($dados_db) {
                $pedido = $dados_db['num_pedido'];
                $referencia = $dados_db['ref_pedido'];
                $valor = $dados_db['total_pedido'];
            }
        }

        // Variaveis smarty
        $context = Context::getContext();
        $context->smarty->assign(array(
            'msg_1'         => html_entity_decode(Configuration::get('FKPAGSEGURO_MSG_1')),
            'pedido'        => $pedido,
            'referencia'    => $referencia,
            'valor'         => number_format($valor, 2, ',', '.')
        ));

        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
            $this->setTemplate('retorno_15x.tpl');
        }else {
            $this->setTemplate('retorno_16x.tpl');
        }

    }

}