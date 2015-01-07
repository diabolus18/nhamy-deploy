<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 16:36:58
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/controllers/localization/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55769221753d9495a235a84-97227393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87cb7117b14c06fdff4d903ca39089c0d7f89ba5' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/controllers/localization/content.tpl',
      1 => 1406738487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55769221753d9495a235a84-97227393',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'localization_form' => 0,
    'localization_options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d9495a2a1394_95777676',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d9495a2a1394_95777676')) {function content_53d9495a2a1394_95777676($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['localization_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['localization_form']->value;?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['localization_options']->value)){?><?php echo $_smarty_tpl->tpl_vars['localization_options']->value;?>
<?php }?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#PS_CURRENCY_DEFAULT').change(function(e) {
			alert('Before changing the default currency, we strongly recommend that you enable maintenance mode because any change on default currency requires manual adjustment of the price of each product');
		});
	});
</script><?php }} ?>