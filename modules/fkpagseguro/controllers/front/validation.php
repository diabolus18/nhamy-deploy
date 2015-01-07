<?php

class FKpagseguroValidationModuleFrontController extends ModuleFrontController {

    public function init() {

        $this->display_column_right = (Configuration::get('FKPAGSEGURO_COLUNA_DIREITA') == 'on' ? true : false);
        $this->display_column_left = (Configuration::get('FKPAGSEGURO_COLUNA_ESQUERDA') == 'on' ? true : false);

        parent::init();
    }

	public function postProcess() {

		$cart = $this->context->cart;
		if ($cart->id_customer == 0 Or $cart->id_address_delivery == 0 Or $cart->id_address_invoice == 0 Or !$this->module->active)
			Tools::redirect('index.php?controller=order&step=1');

		// Verifica se esta opção de pagamento ainda está disponível no caso de o cliente mudar o endereço antes do fim do processo de compra
		$authorized = false;
		foreach (Module::getPaymentModules() as $module)
			if ($module['name'] == 'fkpagseguro')
			{
				$authorized = true;
				break;
			}
		if (!$authorized)
			die($this->module->l('This payment method is not available.', 'validation'));

		$customer = new Customer($cart->id_customer);
		if (!Validate::isLoadedObject($customer))
			Tools::redirect('index.php?controller=order&step=1');

		$currency = $this->context->currency;
		$total = (float)$cart->getOrderTotal(true, Cart::BOTH);

        $this->module->validateOrder($cart->id, Configuration::get('FKPAGSEGURO_STATE_ORDER'), $total, $this->module->displayName, NULL, array(), (int)$currency->id, false, $customer->secure_key);
        Tools::redirect('index.php?controller=order-confirmation&id_cart='.$cart->id.'&id_module='.$this->module->id.'&id_order='.$this->module->currentOrder.'&key='.$customer->secure_key);
	}

}
