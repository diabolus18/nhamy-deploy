<?php

class FKpagseguroPaymentModuleFrontController extends ModuleFrontController
{

    public $display_column_right = false;
    public $display_column_left = false;
    public $ssl = true;

    public function __construct() {
        parent::__construct();
    }

    public function init() {

        $this->display_column_right = (Configuration::get('FKPAGSEGURO_COLUNA_DIREITA') == 'on' ? true : false);
        $this->display_column_left = (Configuration::get('FKPAGSEGURO_COLUNA_ESQUERDA') == 'on' ? true : false);

        parent::init();
    }

	public function initContent() {

		parent::initContent();

		$cart = $this->context->cart;
		if (!$this->module->checkCurrency($cart)) {
            Tools::redirect('index.php?controller=order');
        }

        $this->context->smarty->assign(array(
			'nbProducts' => $cart->nbProducts(),
			'total' => $cart->getOrderTotal(true, Cart::BOTH),
			'this_path' => $this->module->getPathUri()
		));

        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<'))
            $this->setTemplate('payment_execution_15x.tpl');
        else {
            $this->setTemplate('payment_execution_16x.tpl');
        }
	}

}
