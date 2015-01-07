<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 14:52:56
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_order_opc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74660667153d930f864b539-33551945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24aebbfcb12de2f3ce37fbb192cc747a1e64bb5e' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_order_opc.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74660667153d930f864b539-33551945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d930f8669981_92305653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d930f8669981_92305653')) {function content_53d930f8669981_92305653($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="numend"){?>
<div class="required text form-group">
    <label for="numend"><?php echo smartyTranslate(array('s'=>'Número'),$_smarty_tpl);?>
 <sup>*</sup></label>
    <input type="text" class="form-control" name="numend" id="numend" value="<?php if (isset($_POST['numend'])){?><?php echo $_POST['numend'];?>
<?php }?>"/>
</div>
<?php }?>
<?php }} ?>