<?php /* Smarty version Smarty-3.1.14, created on 2014-12-02 21:44:02
         compiled from "/Applications/MAMP/htdocs/nhamy/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1767847229547e5cd288d183-76603623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4686a12e66e65e178967963f400efd0700e1faa5' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy/modules/feeder/feederHeader.tpl',
      1 => 1406560798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1767847229547e5cd288d183-76603623',
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
  'unifunc' => 'content_547e5cd28a7f37_97296042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e5cd28a7f37_97296042')) {function content_547e5cd28a7f37_97296042($_smarty_tpl) {?>

<link rel="alternate" type="application/rss+xml" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>