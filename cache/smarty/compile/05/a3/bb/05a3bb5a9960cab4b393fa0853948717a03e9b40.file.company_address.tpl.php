<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:58:45
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/company_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158611426053d92445ecbdd9-19745501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05a3bb5a9960cab4b393fa0853948717a03e9b40' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/company_address.tpl',
      1 => 1404841242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158611426053d92445ecbdd9-19745501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TipoPessoa' => 0,
    'field_name' => 0,
    'address_validation' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d92445efce47_83487654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d92445efce47_83487654')) {function content_53d92445efce47_83487654($_smarty_tpl) {?><div class="form-group" <?php if ($_smarty_tpl->tpl_vars['TipoPessoa']->value=='pf'){?> style="display: none" <?php }else{ ?> style="display: block"<?php }?>>
    <label for="company"><?php echo smartyTranslate(array('s'=>'Razão social'),$_smarty_tpl);?>
</label>
    <input class="form-control validate" data-validate="<?php echo $_smarty_tpl->tpl_vars['address_validation']->value[$_smarty_tpl->tpl_vars['field_name']->value]['validate'];?>
" type="text" id="company" name="company" value="<?php if (isset($_POST['company'])){?><?php echo $_POST['company'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->company)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value->company, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }?>" />
</div>
<?php }} ?>