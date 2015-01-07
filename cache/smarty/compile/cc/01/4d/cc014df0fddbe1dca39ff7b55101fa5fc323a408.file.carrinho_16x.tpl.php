<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:16:34
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcarrier/views/carrinho_16x.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159471451353d93682564930-99643791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc014df0fddbe1dca39ff7b55101fa5fc323a408' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcarrier/views/carrinho_16x.tpl',
      1 => 1400860142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159471451353d93682564930-99643791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fkcarrier_cep_msg' => 0,
    'fkcarrier_cep' => 0,
    'fkcarrier_cep_frete' => 0,
    'opcoes' => 0,
    'frete' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d936825aea23_72553177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d936825aea23_72553177')) {function content_53d936825aea23_72553177($_smarty_tpl) {?>
<div class="fkcarrier_calculo_cep">

    <div class="opc-main-block">
        <div class="order_carrier_content box">
            <div class="delivery_options_address">
                <h3>
                    <?php echo smartyTranslate(array('s'=>'Informe o CEP para cálculo do frete do pedido','mod'=>'fkcarrier'),$_smarty_tpl);?>

                </h3>
                <div id="fkcarrier_cep_msg">
                    <?php echo $_smarty_tpl->tpl_vars['fkcarrier_cep_msg']->value['msg'];?>

                </div>
                <div class="delivery_options">
                    <div id="fkcarrier_cep_form">
                        <form action="#" method="post">
                            <input type="text" class="fkcarrier_text_cep" size="10" name="fkcarrier_cep_carrinho" value="<?php echo $_smarty_tpl->tpl_vars['fkcarrier_cep']->value;?>
"/>
                            <input type="submit" class="btn btn-default button button-medium" value="<?php echo smartyTranslate(array('s'=>'Calcular frete','mod'=>'fkcarrier'),$_smarty_tpl);?>
" name="submitCarrinho"/>
                        </form>
                    </div>

                    <?php if (isset($_smarty_tpl->tpl_vars['fkcarrier_cep_frete']->value)){?>
                        <table>
                            <?php  $_smarty_tpl->tpl_vars['opcoes'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcoes']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fkcarrier_cep_frete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['opcoes']->key => $_smarty_tpl->tpl_vars['opcoes']->value){
$_smarty_tpl->tpl_vars['opcoes']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['opcoes']->key;
?>
                                <?php  $_smarty_tpl->tpl_vars['frete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['frete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['opcoes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['frete']->key => $_smarty_tpl->tpl_vars['frete']->value){
$_smarty_tpl->tpl_vars['frete']->_loop = true;
?>
                                    <tr>
                                        <td id="fkcarrier_cep_img">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['frete']->value['url_imagem'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['frete']->value['nome_carrier'];?>
"/>
                                        </td>
                                        <td id="fkcarrier_cep_nome">
                                            <b><?php echo $_smarty_tpl->tpl_vars['frete']->value['nome_carrier'];?>
</b>
                                            <br>
                                            <?php echo smartyTranslate(array('s'=>'Prazo de entrega:','mod'=>'fkcarrier'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['frete']->value['prazo_entrega'];?>

                                        </td>
                                        <td id="fkcarrier_cep_valor">
                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['frete']->value['valor_frete']),$_smarty_tpl);?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

</div><?php }} ?>