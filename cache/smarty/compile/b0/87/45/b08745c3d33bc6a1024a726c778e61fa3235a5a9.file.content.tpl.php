<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:25:55
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4433138454ac7d13314eb4-92151320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b08745c3d33bc6a1024a726c778e61fa3235a5a9' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/content.tpl',
      1 => 1406734888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4433138454ac7d13314eb4-92151320',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7d13327989_43946733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d13327989_43946733')) {function content_54ac7d13327989_43946733($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>