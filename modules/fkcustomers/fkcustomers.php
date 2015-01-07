<?php

class fkcustomers extends Module {

    private $_html = '';
    private $_postErrors = array();

    private $_urlWs = 'http://www.fokusfirst.com/fokusfirst/loja/modules/fkcontrol/fkservices.wsdl';
    private $_erroWs = '';
    private $_idProduto = '53';

    public function __construct() {

        $this -> name = 'fkcustomers';
        $this -> tab = 'Others';
        $this -> version = '160.3.0';
        $this -> author = 'FokusFirst';

        parent::__construct();

        $this -> displayName = $this -> l('Módulo FKcustomers');
        $this -> description = $this -> l('Inclui novos campos e automatiza o preenchimento do cadastro de clientes.');
    }

    public function install() {
        if (!parent::install()
            Or !$this->registerHook('displayBackOfficeHeader')
            Or !$this->registerHook('actionCustomerAccountAdd')
            Or !$this->alteraTabela()
            Or !$this->alteraFormatoEndereco()
            Or !$this -> instArquivosTpl()
            Or !Configuration::updateValue('FKCUSTOMERS_REFERENCIA', '')
            Or !Configuration::updateValue('FKCUSTOMERS_DOMINIO', '')
            Or !Configuration::updateValue('FKCUSTOMERS_PROPRIETARIO', '')
            Or !Configuration::updateValue('FKCUSTOMERS_WS', '')
            Or !Configuration::updateValue('FKCUSTOMERS_USUARIOBY', '')
            Or !Configuration::updateValue('FKCUSTOMERS_SENHABY', '')
            Or !Configuration::updateValue('FKCUSTOMERS_CODIGOAC', '')
            Or !Configuration::updateValue('FKCUSTOMERS_CHAVEAC', '')
            Or !Configuration::updateValue('FKCUSTOMERS_GRUPO', '0')
            Or !Configuration::updateValue('FKCUSTOMERS_DELCAMPOS', 'on')
            Or !Configuration::updateValue('FKCUSTOMERS_UFAUTO', 'on')
            Or !Configuration::updateValue('FKCUSTOMERS_DUPL_CPF_CNPJ', '')) {
            return false;
        }

        return true;
    }

    public function uninstall() {

        if (!parent::uninstall()
            Or !$this->unregisterHook('displayBackOfficeHeader')
            Or !$this->unregisterHook('actionCustomerAccountAdd')
            Or !$this->desinstArquivosTpl()) {
            return false;
        }

        // Exclui dados de Configuração
        if (!Db::getInstance()->delete("configuration", "name LIKE 'FKCUSTOMERS_%'")) {
            return false;
        }

        if (!Configuration::get('FKCUSTOMERS_DELCAMPOS') == 'on'){

            $Query =   "ALTER TABLE`"._DB_PREFIX_."customer` DROP COLUMN `tipo`;";
            if (!Db::getInstance()->Execute($Query)) {
                return false;
            }

            $Query =   "ALTER TABLE`"._DB_PREFIX_."customer` DROP COLUMN `cpf_cnpj`;";
            if (!Db::getInstance()->Execute($Query)) {
                return false;
            }

            $Query =   "ALTER TABLE`"._DB_PREFIX_."customer` DROP COLUMN `rg_ie`;";
            if (!Db::getInstance()->Execute($Query)) {
                return false;
            }

            $Query =   "ALTER TABLE`"._DB_PREFIX_."address` DROP COLUMN `numend`;";
            if (!Db::getInstance()->Execute($Query)) {
                return false;
            }

            $Query =   "ALTER TABLE`"._DB_PREFIX_. "address` DROP COLUMN `compl`;";
            if (!Db::getInstance()->Execute($Query)) {
                return false;
            }
        }

        return true;
    }

    public function getContent() {

        $this->_html .= '<h2>'.$this->l('Módulo FKcustomers').'</h2>';

        if (!empty($_POST) AND Tools::isSubmit('submitSave')) {

            $this->postValidation();

            if (!sizeof($this ->_postErrors)) {
                $this->_html .= $this->displayConfirmation($this->l('Configuração alterada'));
            }else {
                foreach ($this->_postErrors AS $erro) {
                    $this->_html .= '<div class="alert error"><img src="' . _PS_IMG_ . 'admin/forbbiden.gif" alt="nok" />&nbsp;' . $erro . '</div>';
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
                $referencia = Trim(Tools::getValue('fkcustomers_referencia'));
                $dominio = Trim(Tools::getShopDomain(false,true));
                $proprietario = Trim(Tools::getValue('fkcustomers_proprietario'));

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

                if (!$this->wsAlteraLicenca(Configuration::get('FKCUSTOMERS_REFERENCIA'), Tools::getShopDomain(false,true))) {
                    $this->_postErrors[] = $this->_erroWs;
                }

                if (!$this->_postErrors) {
                    $this->postProcess($sessao);
                }

                break;

            case 'configGeral':

                // Verifica os valores dos campos
                if (Tools::getValue('fkcustomers_ws') == 'BY') {
                    if (Tools::getValue('fkcustomers_usuarioby') == NULL OR Tools::getValue('fkcustomers_senhaby') == NULL) {
                        $this->_postErrors[] = $this->l('Usuário e senha são obrigatórios para o serviço BYJG');
                    }
                }
                else {
                    if (Tools::getValue('fkcustomers_ws') == 'AC') {
                        if (Tools::getValue('fkcustomers_codigoac') == NULL OR Tools::getValue('fkcustomers_chaveac') == NULL) {
                            $this->_postErrors[] = $this->l('Código e chave são obrigatórios para o serviço AutoCep');
                        }
                    }
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
                Configuration::updateValue('FKCUSTOMERS_REFERENCIA', Trim(Tools::getValue('fkcustomers_referencia')));
                Configuration::updateValue('FKCUSTOMERS_DOMINIO', Trim(Tools::getShopDomain(false,true)));
                Configuration::updateValue('FKCUSTOMERS_PROPRIETARIO', Trim(Tools::getValue('fkcustomers_proprietario')));

                break;

            case 'configRegistro_2':

                // Limpa as configurações
                Configuration::updateValue('FKCUSTOMERS_REFERENCIA', '');
                Configuration::updateValue('FKCUSTOMERS_DOMINIO', '');
                Configuration::updateValue('FKCUSTOMERS_PROPRIETARIO', '');

                break;

            case 'configGeral':

                // Salva as configurações
                Configuration::updateValue('FKCUSTOMERS_WS', Tools::getValue('fkcustomers_ws'));
                Configuration::updateValue('FKCUSTOMERS_USUARIOBY', Tools::getValue('fkcustomers_usuarioby'));
                Configuration::updateValue('FKCUSTOMERS_SENHABY', Tools::getValue('fkcustomers_senhaby'));
                Configuration::updateValue('FKCUSTOMERS_CODIGOAC', Tools::getValue('fkcustomers_codigoac'));
                Configuration::updateValue('FKCUSTOMERS_CHAVEAC', Tools::getValue('fkcustomers_chaveac'));
                Configuration::updateValue('FKCUSTOMERS_GRUPO', Tools::getValue('fkcustomers_grupo'));
                Configuration::updateValue('FKCUSTOMERS_DELCAMPOS', Tools::getValue('fkcustomers_delcampos'));
                Configuration::updateValue('FKCUSTOMERS_UFAUTO', Tools::getValue('fkcustomers_ufauto'));
                Configuration::updateValue('FKCUSTOMERS_DUPL_CPF_CNPJ', Tools::getValue('fkcustomers_dupl_cpf_cnpj'));

                break;

        }

    }

    private function displayForm() {

        $this->_html .= '<fieldset>';
        $this->_html .= '<legend><img src="'.$this->_path.'logo.gif" alt="" /> '.$this->l('Status do Módulo FKcustomers').'</legend>';

        $alert = array();
        $enviarAlert = false;

        // Verifica registro da licenca
        if (Configuration::get('FKCUSTOMERS_REFERENCIA') == '' Or Configuration::get('FKCUSTOMERS_DOMINIO') == '' Or Configuration::get('FKCUSTOMERS_PROPRIETARIO') == '') {
            $this->_html .= '<img src="'._PS_IMG_.'admin/warn2.png" />Registre sua Licença de Uso.';
        }else {
            // Verifica instalacao do SOAP
            if (!extension_loaded('soap')) {
                $enviarAlert = true;
                $alert['soapMsg'] = $this->l('Ative a função SOAP em seu PHP.');
                $alert['soapImg'] = '<img src="'._PS_IMG_.'admin/warn2.png" />';
            }

            // Mensagens
            if ($enviarAlert == false) {
                $this->_html .= '<img src="'._PS_IMG_ .'admin/module_install.png" /><strong>'.$this->l('FKcustomers está configurado e online!').'</strong>';
            }else {
                $this->_html .= '<strong>'.$this->l('FKcustomers ainda não configurado, por favor verifique os alertas abaixo:').'</strong>';
                $this->_html .= '<br><br>';

                if (isset($alert['soapMsg'])) {
                    $this->_html .= $alert['soapImg'].$alert['soapMsg'];
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

        if (Configuration::get('FKCUSTOMERS_REFERENCIA') != '' and Configuration::get('FKCUSTOMERS_DOMINIO') != '' and Configuration::get('FKCUSTOMERS_PROPRIETARIO') != '') {

            if (!$this->wsVerificaLicenca(Configuration::get('FKCUSTOMERS_REFERENCIA'), Tools::getShopDomain(false,true))) {

                $this->_html .= '<div class="alert error"><img src="'._PS_IMG_.'admin/forbbiden.gif" alt="nok" />&nbsp;'.$this->_erroWs.'</div>';

                $this->_html .= '<ul id="fkcustomers_menuTab">';
                $this->_html .= '   <li id="menuTab1" class="menuTabButton selected">1. '.$id_licenca.'</li>';
                $this->_html .= '   <li id="menuTab2" class="menuTabButton">2. '.$id_config.'</li>';
                $this->_html .= '</ul>';

                $this->_html .= '<div id="fkcustomers_tabList">';

                $this->_html .= '   <div id="menuTab1Sheet" class="fkcustomers_tabItem selected">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayRegistro_1.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '</div>';

            }else {
                $this->_html .= '<ul id="fkcustomers_menuTab">';
                $this->_html .= '   <li id="menuTab1" class="menuTabButton">1. '.$id_licenca.'</li>';
                $this->_html .= '   <li id="menuTab2" class="menuTabButton selected">2. '.$id_config.'</li>';
                $this->_html .= '</ul>';

                $this->_html .= '<div id="fkcustomers_tabList">';

                $this->_html .= '   <div id="menuTab1Sheet" class="fkcustomers_tabItem">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayRegistro_2.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '   <div id="menuTab2Sheet" class="fkcustomers_tabItem selected">';
                ob_start();
                include_once dirname(__FILE__).'/config/displayConfigGeral.php';
                $this->_html .= ob_get_contents();
                ob_end_clean();
                $this->_html .= '   </div>';

                $this->_html .= '</div>';

            }
        }else {

            $this->_html .= '<ul id="fkcustomers_menuTab">';
            $this->_html .= '   <li id="menuTab1" class="menuTabButton selected">1. '.$id_licenca.'</li>';
            $this->_html .= '   <li id="menuTab2" class="menuTabButton">2. '.$id_config.'</li>';
            $this->_html .= '</ul>';

            $this->_html .= '<div id="fkcustomers_tabList">';

            $this->_html .= '   <div id="menuTab1Sheet" class="fkcustomers_tabItem selected">';
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
        $this->_html .= '       $(".fkcustomers_tabItem.selected").removeClass("selected");';
        $this->_html .= '       $("#" + this.id + "Sheet").addClass("selected");';
        $this->_html .= '   });';
        $this->_html .= '</script>';

        if (isset($_GET['id_tab'])) {
            $this->_html .= '<script>';
            $this->_html .= '   $(".menuTabButton.selected").removeClass("selected");';
            $this->_html .= '   $("#menuTab'.Tools::safeOutput(Tools::getValue('id_tab')).'").addClass("selected");';
            $this->_html .= '   $(".fkcustomers_tabItem.selected").removeClass("selected");';
            $this->_html .= '   $("#menuTab'.Tools::safeOutput(Tools::getValue('id_tab')).'Sheet").addClass("selected");';
            $this->_html .= '</script>';
        }

        return $this->_html;

    }

    public function hookDisplayBackOfficeHeader() {
        // CSS
        if (version_compare(substr(_PS_VERSION_, 0, 5), '1.6.0', '<')) {
            $this->context->controller->addCSS($this->_path.'css/fkcustomers_admin_15x.css');
        }else {
            $this->context->controller->addCSS($this->_path.'css/fkcustomers_admin_16x.css');
        }

        $this->context->controller->addCSS($this->_path.'css/fkcustomers_tab.css');
    }

    public function hookactionCustomerAccountAdd($params) {

        $cliente = $params['newCustomer'];

        if (Configuration::get('FKCUSTOMERS_GRUPO') != '0' AND $cliente->tipo == 'pj') {
            $customer = new Customer($cliente->id);
            $customer->cleanGroups();
            $customer->addGroups(array(Configuration::get('FKCUSTOMERS_GRUPO')));
        }
    }

    private function alteraTabela() {

        $db = Db::getInstance();

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '"._DB_PREFIX_."customer' AND column_name = 'tipo' AND table_schema = '"._DB_NAME_."'";
        $dados = $db->getRow($sql);
        if (!$dados) {
            $sql =   "ALTER TABLE`" . _DB_PREFIX_ . "customer` ADD `tipo` varchar(2) DEFAULT ' ';";
            $db-> Execute($sql);
        }

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '"._DB_PREFIX_."customer' AND column_name = 'cpf_cnpj' AND table_schema = '"._DB_NAME_."'";
        $dados = $db->getRow($sql);
        if (!$dados) {
            $sql =   "ALTER TABLE`" . _DB_PREFIX_ . "customer` ADD `cpf_cnpj` varchar(20) DEFAULT ' ';";
            $db-> Execute($sql);
        }

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '"._DB_PREFIX_."customer' AND column_name = 'rg_ie' AND table_schema = '"._DB_NAME_."'";
        $dados = $db->getRow($sql);
        if (!$dados) {
            $sql =   "ALTER TABLE`" . _DB_PREFIX_ . "customer` ADD `rg_ie` varchar(20) DEFAULT ' ';";
            $db-> Execute($sql);
        }

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '"._DB_PREFIX_."address' AND column_name = 'numend' AND table_schema = '"._DB_NAME_."'";
        $dados = $db->getRow($sql);
        if (!$dados) {
            $sql =   "ALTER TABLE`" . _DB_PREFIX_ . "address` ADD `numend` varchar(20) DEFAULT ' ';";
            $db-> Execute($sql);
        }

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '"._DB_PREFIX_."address' AND column_name = 'compl' AND table_schema = '"._DB_NAME_."'";
        $dados = $db->getRow($sql);
        if (!$dados) {
            $sql =   "ALTER TABLE`" . _DB_PREFIX_ . "address` ADD `compl` varchar(20) DEFAULT ' ';";
            $db-> Execute($sql);
        }

        return true;
    }

    private function alteraFormatoEndereco() {

        // Recupera id_country do Brasil
        $dados = Db::getInstance()->getRow('SELECT id_country FROM `'._DB_PREFIX_.'country` WHERE `iso_code` = "br" Or `iso_code` = "BR"');
        $id_country = $dados['id_country'];

        // Altera o formato do endereço
        $formato = array('format' => 'firstname lastname'.chr(10).'company'.chr(10).'postcode'.chr(10).'address1'.chr(10).'numend'.chr(10).'compl'.chr(10).'address2'.chr(10).'city'.chr(10).'Country:name'.chr(10).'phone');
        Db::getInstance()->update('address_format', $formato, '`id_country` = '.$id_country);

        return true;
    }

    private function instArquivosTpl() {

        // Verifica tema instalado
        foreach (Theme::getThemes() as $theme) {

            $idshop = $this->context->shop->id;
            $dados = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'shop WHERE id_shop = '.(int)$idshop. ' AND id_theme = '.(int)$theme->id);

            if ($dados > 0){
                $themedir = $theme->directory;
                break;
            }
        }

        // Efetua backup dos arquivos originais
        $origem = (_PS_ALL_THEMES_DIR_.$themedir.'/address.tpl');
        $destino = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/address.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_ALL_THEMES_DIR_.$themedir.'/authentication.tpl');
        $destino = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/authentication.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_ALL_THEMES_DIR_.$themedir.'/identity.tpl');
        $destino = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/identity.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_ALL_THEMES_DIR_.$themedir.'/order-opc-new-account.tpl');
        $destino = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/order-opc-new-account.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        // Copia os novos arquivos
        $pasta = '';
        $ps_version = substr(_PS_VERSION_, 0, 5);

        if (version_compare($ps_version, '1.5.4', '==')) {
            $pasta='v154';
        }elseif (version_compare($ps_version, '1.5.5', '==')) {
            $pasta='v155';
        }elseif (version_compare($ps_version, '1.5.6', '==')) {
            $pasta='v156';
        }else {
            if (version_compare(_PS_VERSION_, '1.6.0.5', '==')) {
                $pasta='v160_0_5';
            }elseif (version_compare(_PS_VERSION_, '1.6.0.6', '==')) {
                $pasta='v160_0_6';
            }elseif (version_compare(_PS_VERSION_, '1.6.0.7', '==') or version_compare(_PS_VERSION_, '1.6.0.8', '==')) {
                $pasta='v160_0_7';
            }
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/'.$pasta.'/address.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/address.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/'.$pasta.'/authentication.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/authentication.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/'.$pasta.'/identity.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/identity.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/'.$pasta.'/order-opc-new-account.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/order-opc-new-account.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        return true;
    }

    private function desinstArquivosTpl() {

        // Verifica tema instalado
        foreach (Theme::getThemes() as $theme) {

            $idshop = $this->context->shop->id;
            $dados = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'shop WHERE id_shop = '.(int)$idshop. ' AND id_theme = '.(int)$theme->id);

            if ($dados > 0){
                $themedir = $theme->directory;
                break;
            }
        }

        // Retorna os arquivos originais
        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/address.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/address.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/authentication.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/authentication.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/identity.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/identity.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

        $origem = (_PS_MODULE_DIR_.$this->name.'/update_theme/backup/order-opc-new-account.tpl');
        $destino = (_PS_ALL_THEMES_DIR_.$themedir.'/order-opc-new-account.tpl');

        if (!copy($origem, $destino)) {
            return false;
        }

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