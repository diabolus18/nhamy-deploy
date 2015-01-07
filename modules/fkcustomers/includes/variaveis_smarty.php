<?php
$tipo = '';
$email = '';
$usuario = '';
$senha = '';

$context = Context::getContext();

// Recupera e-mail
if (isset($context->customer->email)) {
    $email = $context->customer->email;
}

// Recupera se e Pessoa Fisica ou Juridica
if (isset($context->customer->id)) {

    if ($reg = Db::getInstance()->getRow('Select `tipo` From `'._DB_PREFIX_.'customer` Where `id_customer` = '.$context->customer->id)) {
        $tipo = $reg['tipo'];
    }
}

if (Configuration::get('FKCUSTOMERS_WS') == 'BY') {
    $usuario = Configuration::get('FKCUSTOMERS_USUARIOBY');
    $senha = Configuration::get('FKCUSTOMERS_SENHABY');
}else {
    if (Configuration::get('FKCUSTOMERS_WS') == 'AC') {
        $usuario = Configuration::get('FKCUSTOMERS_CODIGOAC');
        $senha = Configuration::get('FKCUSTOMERS_CHAVEAC');
    }
}

$context->smarty->assign(array(
    'TipoPessoa'    	=> $tipo,
    'Email' 			=> $email,
    'WebService' 		=> Configuration::get('FKCUSTOMERS_WS'),
    'Usuario' 		    => $usuario,
    'Senha' 			=> $senha,
    'RealPath'          => _PS_MODULE_DIR_.'fkcustomers',
    'UrlFuncoes' 	    => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/fkcustomers/funcoes.php',
    'UrlJs'      	    => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/fkcustomers/js/'
));
