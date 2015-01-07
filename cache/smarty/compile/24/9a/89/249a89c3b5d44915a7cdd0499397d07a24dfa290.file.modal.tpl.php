<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:25:41
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133911158254ac7d05733a31-88031124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '249a89c3b5d44915a7cdd0499397d07a24dfa290' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/admin3007/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1406734890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133911158254ac7d05733a31-88031124',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7d05739601_79456815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d05739601_79456815')) {function content_54ac7d05739601_79456815($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div><?php }} ?>