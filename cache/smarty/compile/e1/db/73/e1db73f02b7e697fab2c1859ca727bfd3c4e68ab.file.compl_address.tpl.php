<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:58:45
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187358906453d92445e91481-34895110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1db73f02b7e697fab2c1859ca727bfd3c4e68ab' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_address.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187358906453d92445e91481-34895110',
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
  'unifunc' => 'content_53d92445ec5174_88236684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d92445ec5174_88236684')) {function content_53d92445ec5174_88236684($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="compl"){?>
<div class="form-group">
    <label for="compl"><?php echo smartyTranslate(array('s'=>'Complemento'),$_smarty_tpl);?>
</label>
    <input type="text" class="form-control" name="compl" id="compl" value="<?php if (isset($_POST['compl'])){?><?php echo $_POST['compl'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->compl)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value->compl, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }?>"/>
</div>
<?php }?>
<?php }} ?>