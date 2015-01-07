<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:16:34
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169341041453d936823a2de0-08705264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b03ebf0fc3ac15b01e06cc953d242736ceab5797' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/blockadvertising/blockadvertising.tpl',
      1 => 1406738494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169341041453d936823a2de0-08705264',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d936823b5bf8_79375225',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d936823b5bf8_79375225')) {function content_53d936823b5bf8_79375225($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>