<?php /* Smarty version Smarty-3.1.14, created on 2014-12-02 21:43:14
         compiled from "/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1149746594547e5ca2db19a0-73919551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e58e4b29ac309dd9bb4cde04c5c50c2c693b6c27' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1406734890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1149746594547e5ca2db19a0-73919551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547e5ca2db9889_59152639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e5ca2db9889_59152639')) {function content_547e5ca2db9889_59152639($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
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