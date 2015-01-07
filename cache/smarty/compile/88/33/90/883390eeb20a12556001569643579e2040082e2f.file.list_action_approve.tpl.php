<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 17:10:34
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/productcomments/views/templates/admin/list_action_approve.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150231840853d9513a578fe3-94403141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '883390eeb20a12556001569643579e2040082e2f' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/productcomments/views/templates/admin/list_action_approve.tpl',
      1 => 1406564454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150231840853d9513a578fe3-94403141',
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
  'unifunc' => 'content_53d9513a588929_89501456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d9513a588929_89501456')) {function content_53d9513a588929_89501456($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="btn btn-success" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<i class="icon-check"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>