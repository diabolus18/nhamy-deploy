<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 14:59:09
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/front/payment_execution_16x.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32853373853d9326d5a3469-15458922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fa820b35d9290daff2da52e69906af17e666941' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/front/payment_execution_16x.tpl',
      1 => 1402339386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32853373853d9326d5a3469-15458922',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nbProducts' => 0,
    'link' => 0,
    'total' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d9326d668b50_75689828',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d9326d668b50_75689828')) {function content_53d9326d668b50_75689828($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
    <?php echo smartyTranslate(array('s'=>'Pagamento através do PagSeguro.','mod'=>'fkpagseguro'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="page-heading">
    <?php echo smartyTranslate(array('s'=>'Resumo do pedido','mod'=>'fkpagseguro'),$_smarty_tpl);?>

</h1>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['nbProducts']->value<=0){?>
    <p class="alert alert-warning">
        <?php echo smartyTranslate(array('s'=>'Seu carrinho está vazio.','mod'=>'fkpagseguro'),$_smarty_tpl);?>

    </p>
<?php }else{ ?>
    <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('fkpagseguro','validation',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" method="post">
        <div class="box cheque-box">
            <h3 class="page-subheading">
                <?php echo smartyTranslate(array('s'=>'Pagamento através do PagSeguro.','mod'=>'fkpagseguro'),$_smarty_tpl);?>

            </h3>
            <p>
                <strong class="dark">
                    <?php echo smartyTranslate(array('s'=>'Você selecionou pagamento através do PagSeguro.','mod'=>'fkpagseguro'),$_smarty_tpl);?>

                </strong>
            </p>
            <p>
                <?php echo smartyTranslate(array('s'=>'O valor total do seu pedido é de','mod'=>'fkpagseguro'),$_smarty_tpl);?>

                <span id="amount" class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</span>
            </p>
            <br>
            <p>
                <img style="margin: 0px 10px 5px 0px;" src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
img/pagamentos.jpg" alt="<?php echo smartyTranslate(array('s'=>'PagSeguro','mod'=>'fkpagseguro'),$_smarty_tpl);?>
" width="500" height="91"/>
            </p>
            <br>
            <p>
                <?php echo smartyTranslate(array('s'=>'Após clicar "Eu confirmo meu pedido" você será redirecionado ao ambiente seguro do PagSeguro, onde poderá escolher entre as várias formas de pagamentos disponíveis, a que melhor lhe atender.','mod'=>'fkpagseguro'),$_smarty_tpl);?>

                <br><br>
                <b><?php echo smartyTranslate(array('s'=>'Por favor, confirme seu pedido clicando em "Eu confirmo meu pedido"','mod'=>'fkpagseguro'),$_smarty_tpl);?>
.</b>
            </p>
            <p class="cart_navigation clearfix" id="cart_navigation" style="margin-top: 30px;">
                <a class="button-exclusive btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,"step=3"), ENT_QUOTES, 'UTF-8', true);?>
">
                    <i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Outras formas de pagamento','mod'=>'fkpagseguro'),$_smarty_tpl);?>

                </a>
                <button class="button btn btn-default button-medium" type="submit">
                    <span><?php echo smartyTranslate(array('s'=>'Eu confirmo meu pedido','mod'=>'fkpagseguro'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span>
                </button>
            </p>
        </div>

    </form>
<?php }?>
<?php }} ?>