<html>
<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=2&section=configGeral" method="post" class="form" id="configGeral">

    <div class="fkcustomers_opcoes">
        <input id="fkcustomers_button_ajuda" name="fkcustomers_button_ajuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkcustomers/ajuda/config_geral.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
        <p>Ajuda</p>
    </div>

    <div class="fkcustomers_margin_form" id="fkcustomers_corpo">

        <div class="fkcustomers_corpo_titulo">
            <?php echo $this->l('Configuração');?>
        </div>

        <div class="fkcustomers_divisao">
            <div><?php echo $this->l('Provedores de CEP');?></div>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input type="radio" name="fkcustomers_ws" value=""  <?php echo (Configuration::get('FKCUSTOMERS_WS') == '' ? 'checked="checked" ' : '');?>> <?php echo $this->l('Inativo');?>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input value="RV" name="fkcustomers_ws" type="radio" <?php echo (Configuration::get('FKCUSTOMERS_WS') == 'RV' ? 'checked="checked" ' : '');?>> República Virtual
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input value="BY" name="fkcustomers_ws" type="radio" <?php echo (Configuration::get('FKCUSTOMERS_WS') == 'BY' ? 'checked="checked" ' : '')?>> BYJG
        </div>
        <div class="fkcustomers_form_group" id="fkcustomers_by">
            <label><?php echo $this->l('Usuário: ');?></label>
            <input type="text" size="14" name="fkcustomers_usuarioby" value="<?php echo (!Tools::getValue('fkcustomers_usuarioby') ? Configuration::get('FKCUSTOMERS_USUARIOBY') : Tools::getValue('fkcustomers_usuarioby'));?>"/>
            <label><?php echo $this->l('Senha: ');?></label>
            <input type="password" size="10" name="fkcustomers_senhaby" value="<?php echo (!Tools::getValue('fkcustomers_senhaby') ? Configuration::get('FKCUSTOMERS_SENHABY') : Tools::getValue('fkcustomers_senhaby'));?>"/>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input value="AC" name="fkcustomers_ws" type="radio" <?php echo (Configuration::get('FKCUSTOMERS_WS') == 'AC' ? 'checked="checked" ' : '')?>> AutoCep
        </div>
        <div class="fkcustomers_form_group" id="fkcustomers_ac">
            <label><?php echo $this->l('Usuário: ');?></label>
            <input type="text" size="14" name="fkcustomers_codigoac" value="<?php echo (!Tools::getValue('fkcustomers_codigoac') ? Configuration::get('FKCUSTOMERS_CODIGOAC') : Tools::getValue('fkcustomers_codigoac'));?>"/>
            <label><?php echo $this->l('Senha: ');?></label>
            <input type="password" size="10" name="fkcustomers_chaveac" value="<?php echo (!Tools::getValue('fkcustomers_chaveac') ? Configuration::get('FKCUSTOMERS_CHAVEAC') : Tools::getValue('fkcustomers_chaveac'));?>"/>
        </div>

        <div class="fkcustomers_divisao">
            <div><?php echo $this->l('Grupo de Clientes - Pessoa Jurídica');?></div>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input type="radio" name="fkcustomers_grupo[]" value="0" <?php echo ((Configuration::get('FKCUSTOMERS_GRUPO') == '0') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Padrão')?>
        </div>
        <?php
            $group = new Group();
            $grupo_clientes = $group->getGroups($this->context->language->id);

            foreach ($grupo_clientes as $grupo) {
                echo '<div class="fkcustomers_form_group">';
                echo '<label></label> ';
                echo '<input type="radio" name="fkcustomers_grupo[]" value="'.$grupo['id_group'].'" '.(($grupo['id_group'] == Configuration::get('FKCUSTOMERS_GRUPO')) ? 'checked="checked"' : '').'/> '.$grupo['name'];
                echo '</div>';
            }
        ?>

        <div class="fkcustomers_divisao">
            <div><?php echo $this->l('Diversos');?></div>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input type="checkbox" name="fkcustomers_ufauto" value="on" <?php echo ((Configuration::get('FKCUSTOMERS_UFAUTO') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Preencher automaticamente o campo UF.');?>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input type="checkbox" name="fkcustomers_dupl_cpf_cnpj" value="on" <?php echo ((Configuration::get('FKCUSTOMERS_DUPL_CPF_CNPJ') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Verificar duplicidade de CPF e CNPJ.');?>
        </div>
        <div class="fkcustomers_form_group">
            <label></label>
            <input type="checkbox" name="fkcustomers_delcampos" value="on" <?php echo ((Configuration::get('FKCUSTOMERS_DELCAMPOS') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Manter os novos campos na desinstalação.');?>
        </div>

        <div class="fkcustomers_div_button">
            <input class="fkcustomers_button" name="submitSave" type="submit" value="<?php echo $this->l('Salvar');?>">
        </div>

        
    </div>

</form>
</html>