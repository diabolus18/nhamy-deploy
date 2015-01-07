<?php


if (!defined('_PS_VERSION_'))
	exit;
	
class CsCurrenciesFooter extends Module
{
	public function __construct()
	{
		$this->name = 'cscurrenciesfooter';
		$this->tab = 'custom';
		$this->version = 0.1;
		$this->author = 'Codespot';
		$this->need_instance = 0;

		parent::__construct();
		
		$this->displayName = $this->l('Currency block on footer');
		$this->description = $this->l('Adds a block for selecting a currency.');
	}

	public function install()
	{
		return (parent::install() AND $this->registerHook('footerbottom') AND $this->registerHook('header'));
	}

	/**
	* Returns module content for header
	*
	* @param array $params Parameters
	* @return string Content
	*/
	public function hookDisplayFooterBottom($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return ;
	
		global $smarty;
		$currencies = Currency::getCurrencies();
		if (!sizeof($currencies))
			return '';
		$smarty->assign('currencies', $currencies);
		return $this->display(__FILE__, 'cscurrenciesfooter.tpl');
	}
	
	public function hookHeader($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return ;
		$this->context->controller->addCSS($this->_path.'cscurrenciesfooter.css', 'all');
	}
}


