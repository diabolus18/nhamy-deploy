<?php

require_once('pagseguro.php');

class FKpagseguro extends PaymentModule {

	private $_html = '';
	private $_postErrors = array();
    private $_charsetOptions = array('1' => 'ISO-8859-1', '2' =>'UTF-8');
    
    private $_urlWs = 'http://www.fokusfirst.com/fokusfirst/loja/modules/fkcontrol/fkservices.wsdl';
    private $_erroWs = '';
    private $_idProduto = '74';

	public function __construct() {
		$this->name = 'fkpagseguro';
		$this->tab = 'payments_gateways';
		$this->version = '160.0.3';
		$this->author = 'FokusFirst';
		
		parent::__construct();

		$this->displayName = $this->l('Pagseguro');
		$this->description = $this->l('Aceita pagamentos através do PagSeguro.');
        $this->tab = 'Admin';
        $this->tabClassName = 'AdminPagSeguro';
        $this->tabParentName = 'AdminOrders';

	}

    public function install() {

        // Mensagens padroes
        $msg_1  = htmlentities('<b>Sua compra está finalizada.</b><br><b>Agradecemos por comprar conosco!</b><br>O processo de envio do seu pedido terá início logo após recebermos a confirmação do pagamento.');
        $msg_2  = htmlentities('<b>O processo de pagamento não foi completado no site do PagSeguro.</b><br>Retome o pagamento no site do Pagseguro ou escolha outra forma de pagamento em nosso site.');

        if (!parent::install()
            Or !$this->criaTabelas()
            Or !$this->criaStatus()
            Or !$this->criaMenu()
            Or !$this->registerHook('displayBackOfficeHeader')
            Or !$this->registerHook('displayHeader')
            Or !$this->registerHook('displayPayment')
            Or !$this->registerHook('displayPaymentReturn')
            Or !Configuration::updateValue('FKPAGSEGURO_REFERENCIA', '')
            Or !Configuration::updateValue('FKPAGSEGURO_DOMINIO', '')
            Or !Configuration::updateValue('FKPAGSEGURO_PROPRIETARIO', '')
            Or !Configuration::updateValue('FKPAGSEGURO_EMAIL', '')
            Or !Configuration::updateValue('FKPAGSEGURO_TOKEN', '')
            Or !Configuration::updateValue('FKPAGSEGURO_VALIDADE', '172800')
            Or !Configuration::updateValue('FKPAGSEGURO_CHARSET', 'UTF-8')
            Or !Configuration::updateValue('FKPAGSEGURO_LIGHTBOX', '')
            Or !Configuration::updateValue('FKPAGSEGURO_LINK_PARC', 'https://pagseguro.uol.com.br/para_seu_negocio/parcelamento_com_acrescimo.jhtml#rmcl')
            Or !Configuration::updateValue('FKPAGSEGURO_EMAIL_INICIAL', 'on')
            Or !Configuration::updateValue('FKPAGSEGURO_COLUNA_DIREITA', '')
            Or !Configuration::updateValue('FKPAGSEGURO_COLUNA_ESQUERDA', '')
            Or !Configuration::updateValue('FKPAGSEGURO_STATUS_PAGO', 'on')
            Or !Configuration::updateValue('FKPAGSEGURO_STATUS_CANC', '')
            Or !Configuration::updateValue('FKPAGSEGURO_MANTER_DADOS', 'on')
            Or !Configuration::updateValue('FKPAGSEGURO_MSG_1', $msg_1)
            Or !Configuration::updateValue('FKPAGSEGURO_MSG_2', $msg_2)
            Or !Configuration::updateValue('FKPAGSEGURO_URL_RETORNO', Tools::getShopDomain(true, true).__PS_BASE_URI__.'index.php?fc=module&module=fkpagseguro&controller=retorno')
            Or !Configuration::updateValue('FKPAGSEGURO_URL_NOTIFICACAO', Tools::getShopDomain(true, true).__PS_BASE_URI__.'modules/fkpagseguro/notificacao.php')) {

            return false;
        }

        return true;
    }

    public function uninstall() {
        if (!parent::uninstall()
            Or !$this->excluiTabelas()
            Or !$this->excluiMenu()
            Or !$this->unregisterHook('displayBackOfficeHeader')
            Or !$this->unregisterHook('displayHeader')
            OR !$this->unregisterHook('displayPayment')
            OR !$this->unregisterHook('displayPaymentReturn')) {

            return false;
        }

        // Exclui dados de Configuração
        if (!Db::getInstance()->delete("configuration", "name LIKE 'FKPAGSEGURO_%'")) {
            return false;
        }

        return true;
    }

    public function getContent() {

        $this->_html = '<h2>'.$this->l('Módulo FKpagseguro').'</h2>';
        $this->_html .= '<b>'.$this->l('Este módulo permite você aceitar pagamentos através do PagSeguro.').'</b><br /><br />';

        if (!empty($_POST) AND Tools::isSubmit('submitSave')) {

            $this->postValidation();

            if (!sizeof($this ->_postErrors)) {
                $this->_html .= $this->displayConfirmation($this->l('Configurações atualizadas'));
            }
            else {
                foreach ($this->_postErrors AS $erro) {
                    $this->_html .= '<div class="alert error"><img src="'._PS_IMG_.'admin/forbbiden.gif" alt="nok" />&nbsp;'.$erro.'</div>';
                }

                $this->_html .= $this->displayError($this->l('Configuração falhou'));
            }
        }

        return $this->displayForm();
    }
    
    private function postValidation() {
    		
    	$sessao = Tools::getValue('section');
    		
    	switch($sessao) {
    
    		case 'configRegistro_1':
    				
    			// Recupera valores
    			$referencia = Trim(Tools::getValue('fkpagseguro_referencia'));
    			$dominio = Trim(Tools::getShopDomain(false,true));
    			$proprietario = Trim(Tools::getValue('fkpagseguro_proprietario'));
    				
    			if ($referencia == '' or $dominio == '' or $proprietario == '') {
    				$this->_postErrors[] = $this->l('Todos os campos são necessários para o Registro da Licença.');
    				break;
    			}
    				
    			if (!$this->wsRegistraLicenca($referencia, $dominio, $proprietario)) {
    				$this->_postErrors[] = $this->_erroWs;
    			}
    				
    			if (!$this->_postErrors) {
    				$this->postProcess($sessao);
    			}
    				
    			break;
    				
    		case 'configRegistro_2':
    				
    			if (!$this->wsAlteraLicenca(Configuration::get('FKPAGSEGURO_REFERENCIA'), Tools::getShopDomain(false,true))) {
    				$this->_postErrors[] = $this->_erroWs;
    			}
    				
    			if (!$this->_postErrors) {
    				$this->postProcess($sessao);
    			}
    				
    			break;
    				
    		case 'configGeral':
    				
    			// Verifica os valores dos campos
    			if (Tools::getValue('fkpagseguro_email') == NULL) {
    				$this->_postErrors[] = $this->l('O campo "Email" é obrigatório');
    			}
    			
    			if (Tools::getValue('fkpagseguro_token') == NULL) {
    				$this->_postErrors[] = $this->l('O campo "Token" é obrigatório');
    			}
    				
    			if (!$this->_postErrors) {
    				$this->postProcess($sessao);
    			}
    
    			break;
    				
    	}
    
    }
    
    private function postProcess($sessao) {
    
    	switch($sessao) {
    
    		case 'configRegistro_1':
    
    			// Salva as configurações
    			Configuration::updateValue('FKPAGSEGURO_REFERENCIA', Trim(Tools::getValue('fkpagseguro_referencia')));
    			Configuration::updateValue('FKPAGSEGURO_DOMINIO', Trim(Tools::getShopDomain(false,true)));
    			Configuration::updateValue('FKPAGSEGURO_PROPRIETARIO', Trim(Tools::getValue('fkpagseguro_proprietario')));
    
    			break;
    
    		case 'configRegistro_2':
    
    			// Limpa as configurações
    			Configuration::updateValue('FKPAGSEGURO_REFERENCIA', '');
    			Configuration::updateValue('FKPAGSEGURO_DOMINIO', '');
    			Configuration::updateValue('FKPAGSEGURO_PROPRIETARIO', '');
    
    			break;
    
    		case 'configGeral':
    
    			// Salva as configurações
    			Configuration::updateValue('FKPAGSEGURO_EMAIL', Tools::getValue('fkpagseguro_email'));
    			Configuration::updateValue('FKPAGSEGURO_TOKEN', Tools::getValue('fkpagseguro_token'));
    			Configuration::updateValue('FKPAGSEGURO_VALIDADE', Tools::getValue('fkpagseguro_validade'));
    			Configuration::updateValue('FKPAGSEGURO_CHARSET', $this->_charsetOptions[Tools::getValue('fkpagseguro_charset')]);
                Configuration::updateValue('FKPAGSEGURO_LIGHTBOX', Tools::getValue('fkpagseguro_lightbox'));
                Configuration::updateValue('FKPAGSEGURO_LINK_PARC', Tools::getValue('fkpagseguro_link_parc'));
    			Configuration::updateValue('FKPAGSEGURO_EMAIL_INICIAL', Tools::getValue('fkpagseguro_email_inicial'));
    			Configuration::updateValue('FKPAGSEGURO_COLUNA_DIREITA', Tools::getValue('fkpagseguro_coluna_direita'));
    			Configuration::updateValue('FKPAGSEGURO_COLUNA_ESQUERDA', Tools::getValue('fkpagseguro_coluna_esquerda'));
    			Configuration::updateValue('FKPAGSEGURO_STATUS_PAGO', Tools::getValue('fkpagseguro_status_pago'));
                Configuration::updateValue('FKPAGSEGURO_STATUS_CANC', Tools::getValue('fkpagseguro_status_canc'));
    			Configuration::updateValue('FKPAGSEGURO_MANTER_DADOS', Tools::getValue('fkpagseguro_manter_dados'));
    			Configuration::updateValue('FKPAGSEGURO_MSG_1', htmlentities(Tools::getValue('fkpagseguro_msg_1')));
    			Configuration::updateValue('FKPAGSEGURO_MSG_2', htmlentities(Tools::getValue('fkpagseguro_msg_2')));

    			break;
    
    	}
    
    }

    private function displayForm() {

        $this->_html .= '<fieldset>';
        $this->_html .= '<legend><img src="'.$this->_path.'logo.gif" alt="" /> '.$this->l('Status do Módulo FKpagseguro').'</legend>';

        $alert = array();
        $enviarAlert = false;

        // Verifica registro da licenca
        if (Configuration::get('FKPAGSEGURO_REFERENCIA') == '' Or Configuration::get('FKPAGSEGURO_DOMINIO') == '' Or Configuration::get('FKPAGSEGURO_PROPRIETARIO') == '') {
            $this->_html .= '<img src="'._PS_IMG_.'admin/warn2.png" />Registre sua Licença de Uso.';
        }else {
            // Verifica instalacao do SOAP
            if (!extension_loaded('soap')) {
                $enviarAlert = true;
                $alert['soapMsg'] = $this->l('Ative a função SOAP em seu PHP.');
                $alert['soapImg'] = '<img src="'._PS_IMG_.'admin/warn2.png" />';
            }

            // Verifica e-mail
            if (!Configuration::get('FKPAGSEGURO_EMAIL')) {
                $enviarAlert = true;
                $alert['emailMsg'] = $this->l('Preencha o campo e-mail.');
                $alert['emailImg'] = '<img src="'._PS_IMG_.'admin/warn2.png" />';
            }

            if (!Configuration::get('FKPAGSEGURO_TOKEN')) {
                $enviarAlert = true;
                $alert['tokenMsg'] = $this->l('Preencha o campo token.');
                $alert['tokenImg'] = '<img src="'._PS_IMG_.'admin/warn2.png" />';
            }


            // Mensagens
            if ($enviarAlert == false) {
                $this->_html .= '<img src="'._PS_IMG_ .'admin/module_install.png" /><strong>'.$this->l('FKpagseguro está configurado e online!').'</strong>';
            }else {
                $this->_html .= '<strong>'.$this->l('FKpagseguro ainda não configurado, por favor verifique os alertas abaixo:').'</strong>';
                $this->_html .= '<br><br>';

                if (isset($alert['soapMsg'])) {
                    $this->_html .= $alert['soapImg'].$alert['soapMsg'];
                    $this->_html .= '<br>';
                }

                if (isset($alert['emailMsg'])) {
                    $this->_html .= $alert['emailImg'].$alert['emailMsg'];
                    $this->_html .= '<br>';
                }

                if (isset($alert['tokenMsg'])) {
                    $this->_html .= $alert['tokenImg'].$alert['tokenMsg'];
                    $this->_html .= '<br>';
                }

            }
        }

        $this->_html .= '</fieldset>';
        $this->displayFormConfig();

        return $this->_html;

    }

    private function displayFormConfig() {

        //Identificacao das abas
        $id_licenca = $this->l('Registro da Licença');
        $id_config = $this->l('Configuração');

        if (Configuration::get('FKPAGSEGURO_REFERENCIA') != '' and Configuration::get('FKPAGSEGURO_DOMINIO') != '' and Configuration::get('FKPAGSEGURO_PROPRIETARIO') != '') {

            if (!$this->wsVerificaLicenca(Configuration::get('FKPAGSEGURO_REFERENCIA'), Tools::getShopDomain(false,true))) {

                $this->_html .= '<div class="alert error"><img src="'._PS_IMG_.'admin/forbbiden.gif" alt="nok" />&nbsp;'.$this->_erroWs.'</div>';

                $this->_html .= '<ul id="fkpagseguro_menuTab">';
                $this->_html .= '   <li id="menuTab1" class="menuTabButton selected">1. '.$id_licenca.'</li>';
                $this->_html .= '   <li id="menuTab2" class="menuTabButton">2. '.$id_config.'</li>';
                $this->_html .= '</ul>';

                $this->_html .= '<div id="fkpagseguro_tabList">';

                $this->_html .= '   <div id="menuTab1Sheet" class="fkpagseguro_tabItem selected">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayRegistro_1.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '</div>';

            }else {
                $this->_html .= '<ul id="fkpagseguro_menuTab">';
                $this->_html .= '   <li id="menuTab1" class="menuTabButton">1. '.$id_licenca.'</li>';
                $this->_html .= '   <li id="menuTab2" class="menuTabButton selected">2. '.$id_config.'</li>';

                $this->_html .= '</ul>';

                $this->_html .= '<div id="fkpagseguro_tabList">';

                $this->_html .= '   <div id="menuTab1Sheet" class="fkpagseguro_tabItem">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayRegistro_2.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '   <div id="menuTab2Sheet" class="fkpagseguro_tabItem selected">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayConfigGeral.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '</div>';

            }
        }else {

            $this->_html .= '<ul id="fkpagseguro_menuTab">';
            $this->_html .= '   <li id="menuTab1" class="menuTabButton selected">1. '.$id_licenca.'</li>';
            $this->_html .= '   <li id="menuTab2" class="menuTabButton">2. '.$id_config.'</li>';
            $this->_html .= '</ul>';

            $this->_html .= '<div id="fkpagseguro_tabList">';

            $this->_html .= '   <div id="menuTab1Sheet" class="fkpagseguro_tabItem selected">';
            ob_start();
            include_once dirname(__FILE__).'/config/displayRegistro_1.php';
            $this->_html .= ob_get_contents();
            ob_end_clean();
            $this->_html .= '   </div>';

            $this->_html .= '</div>';
        }

        $this->_html .= '<script>';
        $this->_html .= '   $(".menuTabButton").click(function () {';
        $this->_html .= '       $(".menuTabButton.selected").removeClass("selected");';
        $this->_html .= '       $(this).addClass("selected");';
        $this->_html .= '       $(".fkpagseguro_tabItem.selected").removeClass("selected");';
        $this->_html .= '       $("#" + this.id + "Sheet").addClass("selected");';
        $this->_html .= '   });';
        $this->_html .= '</script>';

        if (isset($_GET['id_tab'])) {
            $this->_html .= '<script>';
            $this->_html .= '   $(".menuTabButton.selected").removeClass("selected");';
            $this->_html .= '   $("#menuTab'.Tools::safeOutput(Tools::getValue('id_tab')).'").addClass("selected");';
            $this->_html .= '   $(".fkpagseguro_tabItem.selected").removeClass("selected");';
            $this->_html .= '   $("#menuTab'.Tools::safeOutput(Tools::getValue('id_tab')).'Sheet").addClass("selected");';
            $this->_html .= '</script>';
        }

        return $this->_html;

    }

    public function hookDisplayBackOfficeHeader() {
        // CSS
        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
            $this->context->controller->addCSS($this->_path.'css/fkpagseguro_admin_15x.css');
        }else {
            $this->context->controller->addCSS($this->_path.'css/fkpagseguro_admin_16x.css');
        }

        $this->context->controller->addCSS($this->_path.'css/fkpagseguro_tab.css');

        // JS
        $this->context->controller->addJS($this->_path.'js/fkpagseguro_admin.js');
    }

    public function hookdisplayHeader($params) {
        // CSS
        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '>=')) {
            $this->context->controller->addCSS($this->_path.'css/fkpagseguro_front_16x.css');
        }

    }

	public function hookdisplayPayment($params)
	{
		if (!$this->active) {
            return false;
        }

		if (!$this->checkCurrency($params['cart'])) {
            return false;
        }

        $this->context->smarty->assign(array(
			'this_path'     => $this->_path,
			'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->name.'/',
            'link_parc'     => Configuration::get('FKPAGSEGURO_LINK_PARC')
		));

        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<'))
		    return $this->display(__FILE__, 'payment_15x.tpl');
        else {
            return $this->display(__FILE__, 'payment_16x.tpl');
        }
	}

	public function hookdisplayPaymentReturn($params) {

		if (!$this->active) {
            return false;
        }

        // Instancia PagSeguro
        $pagSeguro = new PagSeguro();

        if (!$pagSeguro->requisitaPagamento($params)) {

            $this->context->smarty->assign(array(
                'msg' => $pagSeguro->getMsgErro()
            ));

            if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
                return $this->display(__FILE__, 'erro_15x.tpl');
            }else {
                return $this->display(__FILE__, 'erro_16x.tpl');
            }

        }

        // Grava tabela de controle
        $referencia = '';
        if (isset($params['objOrder']->reference) And !empty($params['objOrder']->reference)) {
            $referencia = $params['objOrder']->reference;
        }

        $dados = array(
            'id_shop'       => $this->context->shop->id,
            'cod_cliente'   => $params['objOrder']->id_customer,
            'ref_pedido'    => $referencia,
            'num_pedido'    => $params['objOrder']->id,
            'url_pagseguro' => $pagSeguro->getUrl(),
            'status'        => 0,
            'desc_status'   => 'Aguardando retorno',
            'pagto'         => 0,
            'desc_pagto'    => 'Aguardando retorno',
            'data_status'   => $date = date("Y/m/d h:i:s"),
            'data_pedido'   => $date = date("Y/m/d h:i:s")
        );

        Db::getInstance()->insert('fkpagseguro', $dados);

        // Envia email para o cliente
        if (Configuration::get('FKPAGSEGURO_EMAIL_INICIAL') == 'on') {
            if (!$referencia) {
                $referencia = $params['objOrder']->id;
            }
            $templateVars['{firstname}'] = $this->context->customer->firstname;
            $templateVars['{lastname}'] = $this->context->customer->lastname;
            $templateVars['{referencia}'] = $referencia;
            $templateVars['{pedido}'] = $params['objOrder']->id;
            $templateVars['{total}'] = number_format($params['objOrder']->total_paid, 2, '.', '');
            $templateVars['{link}'] =  $pagSeguro->getUrl();

            $idioma = $params['objOrder']->id_lang;
            
            if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
                $template = 'fkpagseguro_15x';
            }else {
                $template = 'fkpagseguro_16x';
            }
            
            $templateDir = dirname(__FILE__).'/mails/';
            $assunto = Mail::l('Informações sobre o Pagamento');
            $from = Configuration::get('PS_SHOP_EMAIL');
            $fromName = Configuration::get('PS_SHOP_NAME');
            $to = $this->context->customer->email;
            $toName = $this->context->customer->firstname.' '.$this->context->customer->lastname;

            Mail::Send($idioma, $template, $assunto, $templateVars, $to, $toName, $from, $fromName, NULL, NULL, $templateDir);
        }

        // Variaveis smarty
        $this->context->smarty->assign(array(
            'cod_pagto'     => $pagSeguro->getCodPagto(),
            'msg_1'         => html_entity_decode(Configuration::get('FKPAGSEGURO_MSG_1')),
            'msg_2'         => html_entity_decode(Configuration::get('FKPAGSEGURO_MSG_2')),
            'pedido'        => $params['objOrder']->id,
            'referencia'    => $referencia,
            'valor'         => number_format($params['objOrder']->total_paid, 2, ',', '.')
        ));

        // Verifica se usa lightbox
        if (Configuration::get('FKPAGSEGURO_LIGHTBOX') == 'on') {
            if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
                return $this->display(__FILE__, 'retorno_lightbox_15x.tpl');
            }else {
                return $this->display(__FILE__, 'retorno_lightbox_16x.tpl');
            }
        }else {
            // Redireciona para o site do PagSeguro
            Tools::redirectLink($pagSeguro->getUrl());
        }

    }

	public function checkCurrency($cart) {

		$currency_order = new Currency($cart->id_currency);
		$currencies_module = $this->getCurrency($cart->id_currency);

		if (is_array($currencies_module))
			foreach ($currencies_module as $currency_module)
				if ($currency_order->id == $currency_module['id_currency'])
					return true;
		return false;
	}

    private function criaMenu() {

        // Cria o menu PagSeguro dentro de Pedidos
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $this->tabClassName;

        $languages = Language::getLanguages();
        foreach ($languages as $language) {
            $tab->name[$language['id_lang']] = 'FKpagseguro';
        }

        $tab->id_parent = Tab::getIdFromClassName($this->tabParentName);
        $tab->module = $this->name;
        $tab->add();

        return true;
    }

    private function excluiMenu() {

        // Exclui menu PagSeguro
        $id_tab = Tab::getIdFromClassName($this->tabClassName);
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        return true;
    }

    private function criaStatus() {

        // Verifica se o status ja existe
        $id_state = Db::getInstance()->getRow('SELECT `id_order_state` FROM `'._DB_PREFIX_.'order_state` WHERE `module_name` = "'.$this->name.'"');

        if ($id_state) {
            // Grava configuracao de id_state_order
            if (!Configuration::updateValue('FKPAGSEGURO_STATE_ORDER', $id_state['id_order_state'])) {
                return false;
            }

            return true;
        }

        // Cria status para o PagSeguro
        $dados = array(
            'invoice'       => 0,
            'send_email'    => 0,
            'module_name'   => $this->name,
            'color'         => 'RoyalBlue',
            'unremovable'   => 1,
            'hidden'        => 0,
            'logable'       => 0,
            'delivery'      => 0,
            'shipped'       => 0,
            'paid'          => 0,
            'deleted'       => 0
        );

        if (!Db::getInstance()->insert('order_state', $dados)) {
            return false;
        }

        // Recupera id_order_state criado
        $id_state = Db::getInstance()->getRow('SELECT `id_order_state` FROM `'._DB_PREFIX_.'order_state` WHERE `module_name` = "'.$this->name.'"');

        if (!$id_state) {
            return false;
        }

        // Cria status por idioma
        $idiomas = Db::getInstance()->ExecuteS('SELECT `id_lang` FROM `'._DB_PREFIX_.'lang`');

        if (!$idiomas) {
            return false;
        }

        foreach ($idiomas as $idioma) {

            $dados = array(
                'id_order_state'    => $id_state['id_order_state'],
                'id_lang'           => $idioma['id_lang'],
                'name'              => $this->l('Awaiting PagSeguro payment'),
                'template'          => '',
            );

            if (!Db::getInstance()->insert('order_state_lang', $dados)) {
                return false;
            }

        }

        // Copia icone
        $origem = (_PS_MODULE_DIR_.$this->name."/img/logo.gif");
        $destino = (_PS_IMG_DIR_."os/".$id_state['id_order_state'].".gif");

        if (!copy($origem, $destino)) {
            return false;
        }

        // Grava configuracao de id_state_order
        if (!Configuration::updateValue('FKPAGSEGURO_STATE_ORDER', $id_state['id_order_state'])) {
            return false;
        }

        return true;
    }

    private function criaTabelas() {

        // Cria a tabela de servicos
        $sql = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_. 'fkpagseguro` (
                `id_pagseguro`      int(10) NOT NULL AUTO_INCREMENT,
                `id_shop`           int(10) NULL,
                `cod_cliente`       int(10) NOT NULL,
                `ref_pedido`        varchar(32) NULL,
                `num_pedido`        int(10) NULL,
                `url_pagseguro`     varchar(255) NOT NULL,
                `cod_transacao`     varchar(255) NULL,
                `status`            int(10) NULL,
                `desc_status`       varchar(40) NULL,
                `pagto`             int(10) NULL,
                `desc_pagto`        varchar(40) NULL,
                `data_status`       datetime NULL,
                `data_pedido`       datetime NULL,
                PRIMARY KEY(`id_pagseguro`),
                KEY `idx_cod_cliente` (`cod_cliente`),
                KEY `idx_num_pedido` (`num_pedido`),
                KEY `idx_id_shop` (`id_shop`)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
        Db::getInstance() -> execute($sql);

        return true;
    }

    private function excluiTabelas() {

        // Se for manter os dados
        if (Configuration::get('FKPAGSEGURO_MANTER_DADOS') == 'on') {
            return true;
        }

        // Exclui as tabelas
        $sql = "DROP TABLE IF EXISTS `"._DB_PREFIX_."fkpagseguro`;";
        Db::getInstance() -> execute($sql);

        return true;
    }

    private function wsRegistraLicenca($referencia, $dominio, $proprietario) {

        try {
            $this->_erroWs = '';

            $parm = array('iRefPedido' => $referencia, 'iDominio' => $dominio, 'iProprietario' => $proprietario, 'iIdProduto' => $this->_idProduto);
            $soap = new SoapClient($this->_urlWs, array('exceptions' => 1, "connection_timeout" => 30));
            $result = $soap->setRegistraLicencaOnline($parm);

            if ($result->status->oCodigo != '0') {
                $this->_erroWs = $result->status->oMensagem;
                return false;
            }

        } catch (Exception $e) {
            $this->_erroWs = $e;
            return false;
        }

        return true;
    }

    private function wsVerificaLicenca($referencia, $dominio) {

        try {
            $this->_erroWs = '';

            $parm = array('iRefPedido' => $referencia, 'iDominio' => $dominio, 'iIdProduto' => $this->_idProduto);
            $soap = new SoapClient($this->_urlWs, array('exceptions' => 1, "connection_timeout" => 30));
            $result = $soap->getVerificaLicencaOnline($parm);

            if ($result->status->oCodigo != '0') {
                $this->_erroWs = $result->status->oMensagem;
                return false;
            }

        } catch (Exception $e) {
            $this->_erroWs = $e;
            return false;
        }

        return true;
    }

    private function wsAlteraLicenca($referencia, $dominio) {

        try {
            $this->_erroWs = '';

            $parm = array('iRefPedido' => $referencia, 'iDominio' => $dominio, 'iIdProduto' => $this->_idProduto);
            $soap = new SoapClient($this->_urlWs, array('exceptions' => 1, "connection_timeout" => 30));
            $result = $soap->setAlteraLicencaOnline($parm);

            if ($result->status->oCodigo != '0') {
                $this->_erroWs = $result->status->oMensagem;
                return false;
            }

        } catch (Exception $e) {
            $this->_erroWs = $e;
            return false;
        }

        return true;
    }
}
