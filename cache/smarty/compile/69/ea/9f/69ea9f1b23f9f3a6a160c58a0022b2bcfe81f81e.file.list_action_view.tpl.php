<?php /* Smarty version Smarty-3.1.14, created on 2014-07-31 15:34:59
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75777915653da8c53a0c9f7-18437135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69ea9f1b23f9f3a6a160c58a0022b2bcfe81f81e' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1406738489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75777915653da8c53a0c9f7-18437135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53da8c53a26fb2_38298439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da8c53a26fb2_38298439')) {function content_53da8c53a26fb2_38298439($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<i class="icon-search-plus"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>