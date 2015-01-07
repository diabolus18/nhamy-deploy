<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:26:19
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145059387954ac7d2b93a9d4-80575812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5e738ee17d3859fe032466ead225684e32b8b38' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1406734890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145059387954ac7d2b93a9d4-80575812',
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
  'unifunc' => 'content_54ac7d2b94d2b4_12564373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d2b94d2b4_12564373')) {function content_54ac7d2b94d2b4_12564373($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>