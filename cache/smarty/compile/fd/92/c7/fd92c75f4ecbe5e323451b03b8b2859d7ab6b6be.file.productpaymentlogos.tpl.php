<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 17:04:10
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/productpaymentlogos/views/templates/hook/productpaymentlogos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141808460753d94fba3a72e8-69230534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd92c75f4ecbe5e323451b03b8b2859d7ab6b6be' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/productpaymentlogos/views/templates/hook/productpaymentlogos.tpl',
      1 => 1406564454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141808460753d94fba3a72e8-69230534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'banner_title' => 0,
    'banner_link' => 0,
    'module_dir' => 0,
    'banner_img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d94fba3ef498_46511061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d94fba3ef498_46511061')) {function content_53d94fba3ef498_46511061($_smarty_tpl) {?>
<!-- Productpaymentlogos module -->
<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
<div id="product_payment_logos">
	<div class="box-security">
    <h5 class="product-heading-h5"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_title']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h5> 
  	<?php if ($_smarty_tpl->tpl_vars['banner_link']->value!=''){?><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_link']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_title']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php }?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_img']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_title']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="img-responsive" />
	<?php if ($_smarty_tpl->tpl_vars['banner_link']->value!=''){?></a><?php }?>
    </div>
</div>
<?php }?>  
<!-- /Productpaymentlogos module -->
<?php }} ?>