<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:56:23
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111078825753d923b7c4ab64-23145710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b482f73d2c6283eef3b10c7b65a08d3d888235b1' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_authentication.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111078825753d923b7c4ab64-23145710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d923b7c68843_20736449',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d923b7c68843_20736449')) {function content_53d923b7c68843_20736449($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="numend"){?>
<div class="required form-group">
    <label for="numend"><?php echo smartyTranslate(array('s'=>'Número'),$_smarty_tpl);?>
 <sup>*</sup></label>
    <input type="text" class="form-control" name="numend" id="numend" value="<?php if (isset($_POST['numend'])){?><?php echo $_POST['numend'];?>
<?php }?>"/>
</div>
<?php }?>
<?php }} ?>