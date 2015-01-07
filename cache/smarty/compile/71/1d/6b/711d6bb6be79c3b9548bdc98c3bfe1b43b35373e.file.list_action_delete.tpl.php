<?php /* Smarty version Smarty-3.1.14, created on 2014-12-02 21:43:37
         compiled from "/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268411786547e5cb9b0d925-47412514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711d6bb6be79c3b9548bdc98c3bfe1b43b35373e' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1406734890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268411786547e5cb9b0d925-47412514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547e5cb9b28ec1_29949304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e5cb9b28ec1_29949304')) {function content_547e5cb9b28ec1_29949304($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" class="delete">
	<i class="icon-trash"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>