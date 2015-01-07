<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 14:52:56
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_order_opc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58318606753d930f866f1d4-60424568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '555acc2e85f92bf8a3f264a9f8b5adfd15eea181' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_order_opc.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58318606753d930f866f1d4-60424568',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d930f868d497_90401373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d930f868d497_90401373')) {function content_53d930f868d497_90401373($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="compl"){?>
<div class="form-group">
    <label for="compl"><?php echo smartyTranslate(array('s'=>'Complemento'),$_smarty_tpl);?>
</label>
    <input type="text" class="form-control" name="compl" id="compl" value="<?php if (isset($_POST['compl'])){?><?php echo $_POST['compl'];?>
<?php }?>"/>
</div>
<?php }?>
<?php }} ?>