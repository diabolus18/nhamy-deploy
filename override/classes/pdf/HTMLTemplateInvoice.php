<?php

class HTMLTemplateInvoice extends HTMLTemplateInvoiceCore {

    public function getContent() {

        $country = new Country((int)$this->order->id_address_invoice);
        $invoice_address = new Address((int)$this->order->id_address_invoice);
        $formatted_invoice_address = AddressFormat::generateAddress($invoice_address, array(), '<br />', ' ');
        $formatted_delivery_address = '';

        // Cria string com informações adicionais de CPF/CNPJ e RG/IE
        $dados = Db::getInstance()->getRow('SELECT `tipo`, `cpf_cnpj`, `rg_ie` FROM '._DB_PREFIX_.'customer WHERE `id_customer` = '.(int)$this->order->id_customer);

        $inf_adicionais = '';
        if ($dados['tipo'] == 'pf') {
            $inf_adicionais = '<br>CPF: '.$dados['cpf_cnpj'].' RG: '.$dados['rg_ie'];
        }else {
            if ($dados['tipo'] == 'pj') {
                $inf_adicionais = '<br>CNPJ: '.$dados['cpf_cnpj'].' IE: '.$dados['rg_ie'];
            }else {
               $inf_adicionais = '<br>CPF/CNPJ: Não informado  RG/IE: Não informado';
            }
        }

        // Complementa a string com as informações adicionais
        $formatted_invoice_address .= $inf_adicionais;

        if ($this->order->id_address_delivery != $this->order->id_address_invoice) {
            $delivery_address = new Address((int)$this->order->id_address_delivery);
            $formatted_delivery_address = AddressFormat::generateAddress($delivery_address, array(), '<br />', ' ');
        }

        $customer = new Customer((int)$this->order->id_customer);

        $this->smarty->assign(array(
            'order' => $this->order,
            'order_details' => $this->order_invoice->getProducts(),
            'cart_rules' => $this->order->getCartRules($this->order_invoice->id),
            'delivery_address' => $formatted_delivery_address,
            'invoice_address' => $formatted_invoice_address,
            'tax_excluded_display' => Group::getPriceDisplayMethod($customer->id_default_group),
            'tax_tab' => $this->getTaxTabContent(),
            'customer' => $customer
        ));

        return $this->smarty->fetch($this->getTemplateByCountry($country->iso_code));
    }

}

