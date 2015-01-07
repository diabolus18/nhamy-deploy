<?php /* Smarty version Smarty-3.1.14, created on 2014-07-31 15:10:29
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/themeconfigurator/views/templates/admin/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66004779053da8695aab8a7-02154702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0a06975f87bb7c35469197c4d3a411afdb3e1c0' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/themeconfigurator/views/templates/admin/messages.tpl',
      1 => 1406738497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66004779053da8695aab8a7-02154702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'text' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53da8695b34083_22805986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da8695b34083_22805986')) {function content_53da8695b34083_22805986($_smarty_tpl) {?>

<div id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
-response" <?php if (!isset($_smarty_tpl->tpl_vars['text']->value)){?>style="display:none;"<?php }?> class="message alert alert-<?php if (isset($_smarty_tpl->tpl_vars['class']->value)&&$_smarty_tpl->tpl_vars['class']->value=='error'){?>danger<?php }else{ ?>success<?php }?>">
	<div><?php if (isset($_smarty_tpl->tpl_vars['text']->value)){?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></div>
</div><?php }} ?>