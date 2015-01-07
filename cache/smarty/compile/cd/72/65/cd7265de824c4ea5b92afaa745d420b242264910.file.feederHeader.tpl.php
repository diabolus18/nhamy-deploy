<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:16:33
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74638666953d9368156cc21-89919370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd7265de824c4ea5b92afaa745d420b242264910' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/feeder/feederHeader.tpl',
      1 => 1406564398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74638666953d9368156cc21-89919370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d93681580d22_74187146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d93681580d22_74187146')) {function content_53d93681580d22_74187146($_smarty_tpl) {?>

<link rel="alternate" type="application/rss+xml" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>