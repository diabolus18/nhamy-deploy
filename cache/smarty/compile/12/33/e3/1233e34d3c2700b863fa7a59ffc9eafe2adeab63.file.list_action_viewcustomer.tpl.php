<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 16:49:48
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/blocknewsletter/views/templates/admin/list_action_viewcustomer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37272548153d94c5c696ab3-60791627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1233e34d3c2700b863fa7a59ffc9eafe2adeab63' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/blocknewsletter/views/templates/admin/list_action_viewcustomer.tpl',
      1 => 1406738495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37272548153d94c5c696ab3-60791627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'disable' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d94c5c6f2d50_60094909',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d94c5c6f2d50_60094909')) {function content_53d94c5c6f2d50_60094909($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit btn btn-default <?php if ($_smarty_tpl->tpl_vars['disable']->value){?>disabled<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<i class="icon-search-plus"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>