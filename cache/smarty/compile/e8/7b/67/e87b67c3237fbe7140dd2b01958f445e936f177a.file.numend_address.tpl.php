<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:58:45
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137497835253d92445e594e8-32660927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87b67c3237fbe7140dd2b01958f445e936f177a' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/numend_address.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137497835253d92445e594e8-32660927',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field_name' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d92445e8c510_05764638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d92445e8c510_05764638')) {function content_53d92445e8c510_05764638($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="numend"){?>
<div class="required form-group">
    <label for="numend"><?php echo smartyTranslate(array('s'=>'Número'),$_smarty_tpl);?>
 <sup>*</sup></label>
    <input type="text" class="form-control" name="numend" id="numend" value="<?php if (isset($_POST['numend'])){?><?php echo $_POST['numend'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->numend)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->numend;?>
<?php }?><?php }?>"/>
</div>
<?php }?>
<?php }} ?>