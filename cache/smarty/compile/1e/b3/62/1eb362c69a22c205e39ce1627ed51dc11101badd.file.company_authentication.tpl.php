<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:56:23
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/company_authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69930641553d923b7c90323-37197173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eb362c69a22c205e39ce1627ed51dc11101badd' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/company_authentication.tpl',
      1 => 1404841242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69930641553d923b7c90323-37197173',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d923b7cbbbe7_51342549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d923b7cbbbe7_51342549')) {function content_53d923b7cbbbe7_51342549($_smarty_tpl) {?><div class="form-group" id="fkcustomers_company" <?php if (isset($_POST['tipo'])&&$_POST['tipo']=='pj'){?> style="display: block" <?php }else{ ?> style="display: none"<?php }?>>
    <label for="company"><?php echo smartyTranslate(array('s'=>'Razão social'),$_smarty_tpl);?>
</label>
    <input type="text" class="form-control" id="company" name="company" value="<?php if (isset($_POST['company'])){?><?php echo $_POST['company'];?>
<?php }?>" />
</div><?php }} ?>