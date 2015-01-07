<?php /* Smarty version Smarty-3.1.14, created on 2014-12-02 21:43:36
         compiled from "/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/tree/tree_node_item_radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1732832534547e5cb8530229-65434564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9443c601a5bf12f98db8012d793ec5424fb955ae' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/tree/tree_node_item_radio.tpl',
      1 => 1406734890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1732832534547e5cb8530229-65434564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
    'input_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547e5cb8574af3_05832787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e5cb8574af3_05832787')) {function content_547e5cb8574af3_05832787($_smarty_tpl) {?>
<li class="tree-item<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true){?> tree-item-disable<?php }?>">
	<label class="tree-item-name">
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true){?> disabled="disabled"<?php }?> />
		<i class="tree-dot"></i>
		<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>

	</label>
</li><?php }} ?>