<html>

<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=2&section=configGeral" method="post" class="form" id="configGeral">

	<div class="fkcarrier_opcoes">
		<input id="fkcarrier_button_ajuda" name="fkcarrier_button_ajuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkcarrier/ajuda/config_gerais.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
		<p class="fkcarrier_p">Ajuda</p>
	</div>
	
	<div class="fkcarrier_margin_form" id="fkcarrier_config_geral">
	
        <div class="fkcarrier_divisao">
            <div><?php echo $this->l('Meu CEP');?></div>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input class="fkcarrier_text_cep" type="text" size="10" name="fkcarrier_meu_cep" value="<?php echo (!Tools::getValue('fkcarrier_meu_cep') ? Configuration::get('FKCARRIER_MEU_CEP') : Tools::getValue('fkcarrier_meu_cep'));?>"/>
        </div>

        <div class="fkcarrier_divisao">
            <div><?php echo $this->l('CEP da minha cidade');?></div>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input class="fkcarrier_text_cep" type="text" size="10" id="fkcarrier_cidade_cep1" name="fkcarrier_cidade_cep1" value=""/>
            a
            <input class="fkcarrier_text_cep" type="text" size="10" id="fkcarrier_cidade_cep2" name="fkcarrier_cidade_cep2" value=""/>
            <input class="fkcarrier_button" name="button" type="button" value="<?php echo $this->l('Incluir');?>" onclick="fkcarrierIncluirCepCidade();">
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <textarea rows="2" id="fkcarrier_cep_cidade" name="fkcarrier_cep_cidade"><?php echo (!Tools::getValue('fkcarrier_cep_cidade') ? Configuration::get('FKCARRIER_CEP_CIDADE') : Tools::getValue('fkcarrier_cep_cidade'));?></textarea>
        </div>

        <div class="fkcarrier_divisao">
            <div><?php echo $this->l('Correios');?></div>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_offline" value="on" <?php echo ((Configuration::get('FKCARRIER_OFFLINE') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Cálculo com base somente nas tabelas offline');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_mao_propria" value="on" <?php echo ((Configuration::get('FKCARRIER_MAO_PROPRIA') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Mão própria');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_valor_declarado" value="on" <?php echo ((Configuration::get('FKCARRIER_VALOR_DECLARADO') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Valor declarado');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_aviso_recebimento" value="on" <?php echo ((Configuration::get('FKCARRIER_AVISO_RECEBIMENTO') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Aviso de recebimento');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input value="0" name="fkcarrier_calculo_serv_adic" type="radio" <?php echo (Configuration::get('FKCARRIER_CALCULO_SERV_ADIC') == '0' ? 'checked="checked" ' : '')?>> <?php echo $this->l('Considerar embalagem');?>
        </div>
        <div class="fkcarrier_form_group">
            <label></label>
            <input value="1" name="fkcarrier_calculo_serv_adic" type="radio" <?php echo (Configuration::get('FKCARRIER_CALCULO_SERV_ADIC') == '1' ? 'checked="checked" ' : '')?>> <?php echo $this->l('Considerar pedido');?>
        </div>


        <div class="fkcarrier_divisao">
            <div><?php echo $this->l('Frete e envio');?></div>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="number" name="fkcarrier_tempo_preparacao" value="<?php echo (!Tools::getValue('fkcarrier_tempo_preparacao') ? Configuration::get('FKCARRIER_TEMPO_PREPARACAO') : Tools::getValue('fkcarrier_tempo_preparacao'));?>"/> <?php echo $this->l('Tempo de preparação em dias');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="text" size="10" name="fkcarrier_custos_envio" value="<?php echo (!Tools::getValue('fkcarrier_custos_envio') ? Configuration::get('FKCARRIER_CUSTOS_ENVIO') : Tools::getValue('fkcarrier_custos_envio'));?>"/> <?php echo $this->l('Custos de envio');?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input value="1" name="fkcarrier_embalagem" type="radio" <?php echo (Configuration::get('FKCARRIER_EMBALAGEM') == '1' ? 'checked="checked" ' : '')?>> <?php echo $this->l('Utilizar embalagens padrões');?>
        </div>
        <div class="fkcarrier_form_group">
            <label></label>
            <input value="0" name="fkcarrier_embalagem" type="radio" <?php echo (Configuration::get('FKCARRIER_EMBALAGEM') == '0' ? 'checked="checked" ' : '');?>> <?php echo $this->l('Utilizar embalagens individuais')?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_frete_gratis_transp" value="on" <?php echo ((Configuration::get('FKCARRIER_FRETE_GRATIS_TRANSP') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Quando frete grátis, disponibilizar demais transportadoras com valores');?>
        </div>
        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_calculo_logado" value="on" <?php echo ((Configuration::get('FKCARRIER_CALCULO_LOGADO') == 'on') ? 'checked="checked"' : '')?>/> <?php echo $this->l('Calcular frete (carrinho de compras) somente com o cliente logado');?>
        </div>

        <div class="fkcarrier_divisao">
            <div><?php echo $this->l('Bloco de informações');?></div>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_bloco_produto" value="on" <?php echo ((Configuration::get('FKCARRIER_BLOCO_PRODUTO') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Produto')?>
        </div>

        <div class="fkcarrier_form_group">
            <label></label>
            <input type="checkbox" name="fkcarrier_bloco_carrinho" value="on" <?php echo ((Configuration::get('FKCARRIER_BLOCO_CARRINHO') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Carrinho')?>
        </div>

        <div class="fkcarrier_div_button">
            <input class="fkcarrier_button" name="submitSave" type="submit" value="<?php echo $this->l('Salvar');?>">

            <div>
                <input class="fkcarrier_button_warning" name="submitCache" type="submit" value="<?php echo $this->l('Limpar cache');?>" onclick="return fkcarrierExcluir('<?php echo $this->l('Confirma a exclusão do cache?')?>');">
            </div>
        </div>
        
	</div>

</form>

</html>
