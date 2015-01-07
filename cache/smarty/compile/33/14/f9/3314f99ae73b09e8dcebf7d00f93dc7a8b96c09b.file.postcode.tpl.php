<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:56:23
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/postcode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52378510853d923b7cc2491-50028484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3314f99ae73b09e8dcebf7d00f93dc7a8b96c09b' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/postcode.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52378510853d923b7cc2491-50028484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d923b7d03d73_45823965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d923b7d03d73_45823965')) {function content_53d923b7d03d73_45823965($_smarty_tpl) {?><input class="form-control" type="hidden" name="postcode" id="postcode" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->postcode)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->postcode;?>
<?php }?><?php }?>"/>
<input class="form-control" type="text" name="postcode_fk" id="postcode_fk" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->postcode)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->postcode;?>
<?php }?><?php }?>" onblur="processaCEP(this, true);"/>
<span class="form_info" name="alertpostcode" id="alertpostcode"</span>
<br>
<?php }} ?>