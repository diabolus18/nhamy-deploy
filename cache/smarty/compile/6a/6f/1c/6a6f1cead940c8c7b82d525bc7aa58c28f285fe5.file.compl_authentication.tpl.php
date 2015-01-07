<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:56:23
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102257087153d923b7c6d532-36258797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a6f1cead940c8c7b82d525bc7aa58c28f285fe5' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/compl_authentication.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102257087153d923b7c6d532-36258797',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d923b7c89b54_76714904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d923b7c89b54_76714904')) {function content_53d923b7c89b54_76714904($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['field_name']->value=="compl"){?>
<div class="form-group">
    <label for="compl"><?php echo smartyTranslate(array('s'=>'Complemento'),$_smarty_tpl);?>
</label>
    <input type="text" class="form-control" name="compl" id="compl" value="<?php if (isset($_POST['compl'])){?><?php echo $_POST['compl'];?>
<?php }?>"/>
</div>
<?php }?>
<?php }} ?>