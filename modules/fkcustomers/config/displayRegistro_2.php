<html>
<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=1&section=configRegistro_2" method="post" class="form" id="configRegistro_2">

	<div class="fkcustomers_opcoes">
		<input id="fkcustomers_button_ajuda" name="fkcustomers_button_ajuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkcustomers/ajuda/registro_licenca.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
		<p>Ajuda</p>
	</div>
	
	<div class="fkcustomers_margin_form" id="fkcustomers_registro_2">
	
        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Referência do pedido:');?></label>
            <?php echo Configuration::get('FKCUSTOMERS_REFERENCIA')?>
        </div>

        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Domínio licenciado:');?></label>
            <?php echo Tools::getShopDomain(false,true)?>
        </div>

        <div class="fkcustomers_form_group">
            <label><?php echo $this->l('Proprietário do domínio:');?></label>
            <?php echo Configuration::get('FKCUSTOMERS_PROPRIETARIO')?>
        </div>

        <div class="fkcustomers_div_button">
            <input class="fkcustomers_button" name="submitSave" type="submit" value="<?php echo $this->l('Alterar Licença');?>">

            <div style="font-size: 16px; color: blue; font-weight: bold;">
                <?php echo $this->l('Licença Registrada') ?>
            </div>
        </div>

	</div>
	
</form>
</html>