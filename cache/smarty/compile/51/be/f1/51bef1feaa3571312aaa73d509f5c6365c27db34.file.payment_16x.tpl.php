<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:16:34
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/hook/payment_16x.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47341981653d93682620250-67350962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51bef1feaa3571312aaa73d509f5c6365c27db34' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/hook/payment_16x.tpl',
      1 => 1402339386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47341981653d93682620250-67350962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'link_parc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d93682646c97_84409639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d93682646c97_84409639')) {function content_53d93682646c97_84409639($_smarty_tpl) {?>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <p class="payment_module">
            <a class="fkpagseg" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('fkpagseguro','payment',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pagamento através do PagSeguro.','mod'=>'fkpagseguro'),$_smarty_tpl);?>
">
                <?php echo smartyTranslate(array('s'=>'Pagamento através do PagSeguro','mod'=>'fkpagseguro'),$_smarty_tpl);?>
 <span><?php echo smartyTranslate(array('s'=>'(várias formas de pagamentos disponíveis)','mod'=>'fkpagseguro'),$_smarty_tpl);?>
</span>
            </a>
            <?php if ($_smarty_tpl->tpl_vars['link_parc']->value!=''){?>
                <br>
                <input style="float: right" class="btn btn-default button button-medium" type="button" value="<?php echo smartyTranslate(array('s'=>'Parcelamentos PagSeguro','mod'=>'fkpagseguro'),$_smarty_tpl);?>
" onClick="window.open('<?php echo $_smarty_tpl->tpl_vars['link_parc']->value;?>
','janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500,left=600,top=100')">
            <?php }?>
        </p>
    </div>
</div>
<?php }} ?>