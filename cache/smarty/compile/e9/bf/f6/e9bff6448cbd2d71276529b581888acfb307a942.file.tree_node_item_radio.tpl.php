<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 18:42:47
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/helpers/tree/tree_node_item_radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36733203153d966d72b2351-26337091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9bff6448cbd2d71276529b581888acfb307a942' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/helpers/tree/tree_node_item_radio.tpl',
      1 => 1406738489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36733203153d966d72b2351-26337091',
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
  'unifunc' => 'content_53d966d72e5ca9_36013728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d966d72e5ca9_36013728')) {function content_53d966d72e5ca9_36013728($_smarty_tpl) {?>
<li class="tree-item<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true){?> tree-item-disable<?php }?>">
	<label class="tree-item-name">
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true){?> disabled="disabled"<?php }?> />
		<i class="tree-dot"></i>
		<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>

	</label>
</li><?php }} ?>