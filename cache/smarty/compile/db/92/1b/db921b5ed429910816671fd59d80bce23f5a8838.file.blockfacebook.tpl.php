<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 16:43:09
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/blockfacebook/blockfacebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120467897053d94acdef8173-55853413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db921b5ed429910816671fd59d80bce23f5a8838' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/blockfacebook/blockfacebook.tpl',
      1 => 1406738495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120467897053d94acdef8173-55853413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d94ace066d24_10930090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d94ace066d24_10930090')) {function content_53d94ace066d24_10930090($_smarty_tpl) {?>
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