<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:26:41
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120379572154ac7d41a551e0-80613391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915374844d2b7ef84e5bc4ccfff8a19a38e5b876' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/modules/feeder/feederHeader.tpl',
      1 => 1406560798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120379572154ac7d41a551e0-80613391',
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
  'unifunc' => 'content_54ac7d41a6a034_28006787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d41a6a034_28006787')) {function content_54ac7d41a6a034_28006787($_smarty_tpl) {?>

<link rel="alternate" type="application/rss+xml" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>