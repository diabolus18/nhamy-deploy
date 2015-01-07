<html>
<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=1&section=configRegistro_1" method="post" class="form" id="configRegistro_1">

	<div class="fkcustomers_opcoes">
		<input id="fkcustomers_button_ajuda" name="fkcustomers_button_ajuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkcustomers/ajuda/registro_licenca.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
		<p>Ajuda</p>
	</div>
	
	<div class="fkcustomers_margin_form" id="fkcustomers_registro_1">
	
        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Referência do pedido:');?></label>
            <input type="text" name="fkcustomers_referencia" value="<?php echo (!Tools::getValue('fkcustomers_referencia') ? Configuration::get('FKCUSTOMERS_REFERENCIA') : Tools::getValue('fkcustomers_referencia'));?>">
        </div>

        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Domínio licenciado:');?></label>
            <input disabled type="text" name="fkcustomers_proprietario" size="40" maxlength="100" value="<?php echo Tools::getShopDomain(false,true)?>">
        </div>

        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Proprietário do domínio:');?></label>
            <input type="text" name="fkcustomers_proprietario" size="40" maxlength="100" value="<?php echo (!Tools::getValue('fkcustomers_proprietario') ? Configuration::get('FKCUSTOMERS_PROPRIETARIO') : Tools::getValue('fkcustomers_proprietario'));?>">
        </div>

        <div class="fkcustomers_div_button">
            <input class="fkcustomers_button" name="submitSave" type="submit" value="<?php echo $this->l('Enviar');?>">
        </div>

	</div>

</form>
</html>