<html>
<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=1&section=configRegistro_1" method="post" class="form" id="configRegistro_1">

	<div class="fkcarrier_opcoes">
		<input id="fkcarrier_button_ajuda" name="fkcarrier_button_ajuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkcarrier/ajuda/registro_licenca.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
		<p>Ajuda</p>
	</div>
	
	<div class="fkcarrier_margin_form" id="fkcarrier_registro_1">
	
        <div class="fkcarrier_form_group">
            <label><?php echo $this->l('Referência do pedido:');?></label>
            <input type="text" name="fkcarrier_referencia" value="<?php echo (!Tools::getValue('fkcarrier_referencia') ? Configuration::get('FKCARRIER_REFERENCIA') : Tools::getValue('fkcarrier_referencia'));?>">
        </div>

        <div class="fkcarrier_form_group">
            <label><?php echo $this->l('Domínio licenciado:');?></label>
            <input disabled type="text" name="fkcarrier_proprietario" size="40" maxlength="100" value="<?php echo Tools::getShopDomain(false,true)?>">
        </div>

        <div class="fkcarrier_form_group">
            <label><?php echo $this->l('Proprietário do domínio:');?></label>
            <input type="text" name="fkcarrier_proprietario" size="40" maxlength="100" value="<?php echo (!Tools::getValue('fkcarrier_proprietario') ? Configuration::get('FKCARRIER_PROPRIETARIO') : Tools::getValue('fkcarrier_proprietario'));?>">
        </div>

        <div class="fkcarrier_div_button">
            <input class="fkcarrier_button" name="submitSave" type="submit" value="<?php echo $this->l('Enviar');?>">
        </div>

	</div>

</form>
</html>