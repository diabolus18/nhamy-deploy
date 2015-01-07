<html>

<div class="fkpagseguro_opcoes">
    <input class="fkpagseguro_buttonOpcoes" id="fkpagseguro_buttonAjuda" name="fkpagseguro_buttonAjuda" type="button" value="" onClick="window.open('<?php echo _MODULE_DIR_?>/fkpagseguro/ajuda/config_geral.html','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500,left=500,top=150'); return false;">
    <p class="fkpagseguro_p">Ajuda</p>
</div>

<form action="<?php echo Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI'])?>&id_tab=2&section=configGeral" method="post" class="form" id="configGeral">

    <div class="fkpagseguro_margin_form">

        <div id="fkpagseguro_corpo_geral">

            <div class="fkpagseguro_corpo_titulo">
                <?php echo $this->l('Configuração');?>
            </div>

            <div class="fkpagseguro_sep">
                <div class="fkpagseguro_sep_titulo_toggle" onclick="fkpagseguroToggle('fkpagseguro_pagseguro')">
                    <?php echo $this->l('PagSeguro');?>
                </div>
            </div>
            <div id="fkpagseguro_pagseguro" style="display: none;">
                <div class="fkpagseguro_form_group">
                    <label><?php echo $this->l('Email:');?></label>
                    <input type="text" size="50" name="fkpagseguro_email" value="<?php echo (!Tools::getValue('fkpagseguro_email') ? Configuration::get('FKPAGSEGURO_EMAIL') : Tools::getValue('fkpagseguro_email'));?>">
                </div>
                <div class="fkpagseguro_form_group">
                    <label><?php echo $this->l('Token:');?></label>
                    <input type="text" size="50" name="fkpagseguro_token" value="<?php echo (!Tools::getValue('fkpagseguro_token') ? Configuration::get('FKPAGSEGURO_TOKEN') : Tools::getValue('fkpagseguro_token'));?>">
                </div>
                <div class="fkpagseguro_form_group">
                    <label><?php echo $this->l('Expiração da URL:');?></label>
                    <input type="text" size="7" name="fkpagseguro_validade" value="<?php echo (!Tools::getValue('fkpagseguro_validade') ? Configuration::get('FKPAGSEGURO_VALIDADE') : Tools::getValue('fkpagseguro_validade'));?>">
                </div>
                <div class="fkpagseguro_form_group">

                    <label><?php echo $this->l('Charset:');?></label>
                    <select name="fkpagseguro_charset" id="fkpagseguro_charset" class="select">

                        <?php
                        foreach ($this->_charsetOptions as $key => $charset) {

                            if ($charset == Configuration::get('FKPAGSEGURO_CHARSET')) {
                                echo '<option selected value="'.$key.'">'.$charset.'</option>';
                            }else {
                                echo '<option value="'.$key.'">'.$charset.'</option>';
                            }

                        }
                        ?>

                    </select>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_lightbox" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_LIGHTBOX') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Utilizar LightBox');?>
                </div>
            </div>

            <div class="fkpagseguro_sep">
                <div class="fkpagseguro_sep_titulo_toggle" onclick="fkpagseguroToggle('fkpagseguro_msg')">
                    <?php echo $this->l('Mensagens');?>
                </div>
            </div>
            <div id="fkpagseguro_msg" style="display: none;">
                <div class="fkpagseguro_form_group">
                    <?php $msg = (!Tools::getValue('fkpagseguro_msg_1') ? Configuration::get('FKPAGSEGURO_MSG_1') : Tools::getValue('fkpagseguro_msg_1'));?>
                    <?php $msg = html_entity_decode($msg);?>
                    <label><?php echo $this->l('Pagamento concluido:');?></label>
                    <textarea rows=4 name="fkpagseguro_msg_1"><?php echo $msg;?></textarea>
                </div>
                <div class="fkpagseguro_form_group">
                    <?php $msg = (!Tools::getValue('fkpagseguro_msg_2') ? Configuration::get('FKPAGSEGURO_MSG_2') : Tools::getValue('fkpagseguro_msg_2'));?>
                    <?php $msg = html_entity_decode($msg);?>
                    <label><?php echo $this->l('Pagamento não concluido:');?></label>
                    <textarea rows=4 name="fkpagseguro_msg_2"><?php echo $msg;?></textarea>
                </div>
            </div>

            <div class="fkpagseguro_sep">
                <div class="fkpagseguro_sep_titulo_toggle" onclick="fkpagseguroToggle('fkpagseguro_div')">
                    <?php echo $this->l('Opções diversas');?>
                </div>
            </div>
            <div id="fkpagseguro_div" style="display: none;">
                <div class="fkpagseguro_form_group">
                    <label><?php echo $this->l('Link parcelamento:');?></label>
                    <input type="text" size="70" name="fkpagseguro_link_parc" value="<?php echo (!Tools::getValue('fkpagseguro_link_parc') ? Configuration::get('FKPAGSEGURO_LINK_PARC') : Tools::getValue('fkpagseguro_link_parc'));?>">
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_email_inicial" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_EMAIL_INICIAL') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Enviar e-mail');?>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_coluna_direita" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_COLUNA_DIREITA') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Mostrar coluna direita');?>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_coluna_esquerda" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_COLUNA_ESQUERDA') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Mostrar coluna esquerda');?>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_status_pago" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_STATUS_PAGO') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Alterar status do pedido quando receber notificação de Pagamento Aceito');?>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_status_canc" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_STATUS_CANC') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Alterar status do pedido quando receber notificação de Cancelamento');?>
                </div>
                <div class="fkpagseguro_form_group">
                    <label></label>
                    <input type="checkbox" name="fkpagseguro_manter_dados" value="on" <?php echo ((Configuration::get('FKPAGSEGURO_MANTER_DADOS') == 'on') ? 'checked="checked"' : '');?>/> <?php echo $this->l('Manter dados de status na desinstalação do módulo');?>
                </div>
            </div>

            <div class="fkpagseguro_div_button">
                <input class="fkpagseguro_button" name="submitSave" type="submit" value="<?php echo $this->l('Salvar');?>">
            </div>

        </div>
    </div>
</form>

</html>        