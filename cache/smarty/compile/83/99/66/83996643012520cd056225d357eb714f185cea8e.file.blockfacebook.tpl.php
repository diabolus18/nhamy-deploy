<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:26:42
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/modules/blockfacebook/blockfacebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196029262654ac7d4291e3b4-60815972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83996643012520cd056225d357eb714f185cea8e' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/modules/blockfacebook/blockfacebook.tpl',
      1 => 1406571526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196029262654ac7d4291e3b4-60815972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7d429357a7_85185343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d429357a7_85185343')) {function content_54ac7d429357a7_85185343($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['facebookurl']->value!=''){?>
<div id="fb-root"></div>
<div id="facebook_block" class="col-xs-4">
	<h4 ><?php echo smartyTranslate(array('s'=>'Follow us on Facebook','mod'=>'blockfacebook'),$_smarty_tpl);?>
</h4>
	<div class="facebook-fanbox">
		<div class="fb-like-box" data-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebookurl']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false">
		</div>
	</div>
</div>
<?php }?>
<?php }} ?>