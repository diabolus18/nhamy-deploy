<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:45:49
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/controllers/modules/filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151124653353d9213d32c014-46483991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f1525f4ce7a46a6f8e38e1b54bfbf26733459e0' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/controllers/modules/filters.tpl',
      1 => 1406738487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151124653353d9213d32c014-46483991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showInstalledModules' => 0,
    'showEnabledModules' => 0,
    'showTypeModules' => 0,
    'logged_on_addons' => 0,
    'list_modules_authors' => 0,
    'module_author' => 0,
    'status' => 0,
    'showCountryModules' => 0,
    'nameCountryDefault' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d9213d44aab4_54586602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d9213d44aab4_54586602')) {function content_53d9213d44aab4_54586602($_smarty_tpl) {?>

<!--start filter module-->
<form method="post" class="form-inline">
<div class="row">
	<div class="col-lg-8">
		<div class="form-group">
			<label><?php echo smartyTranslate(array('s'=>'Filter by'),$_smarty_tpl);?>
</label>
			<select name="module_install" id="module_install_filter" class="form-control <?php if (isset($_smarty_tpl->tpl_vars['showInstalledModules']->value)&&$_smarty_tpl->tpl_vars['showInstalledModules']->value&&$_smarty_tpl->tpl_vars['showInstalledModules']->value!='installedUninstalled'){?>active<?php }?>" <?php if ($_smarty_tpl->tpl_vars['showInstalledModules']->value!='installedUninstalled'&&$_smarty_tpl->tpl_vars['showInstalledModules']->value!=''){?><?php }?>>
				<option value="installedUninstalled" <?php if ($_smarty_tpl->tpl_vars['showInstalledModules']->value=='installedUninstalled'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Installed & Not Installed'),$_smarty_tpl);?>
</option>
				<option value="installed" <?php if ($_smarty_tpl->tpl_vars['showInstalledModules']->value=='installed'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Installed Modules'),$_smarty_tpl);?>
</option>
				<option value="uninstalled" <?php if ($_smarty_tpl->tpl_vars['showInstalledModules']->value=='uninstalled'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Modules Not Installed '),$_smarty_tpl);?>
</option>
			</select>
		</div>

		<div class="form-group">
			<select name="module_status" id="module_status_filter" class="form-control <?php if (isset($_smarty_tpl->tpl_vars['showEnabledModules']->value)&&$_smarty_tpl->tpl_vars['showEnabledModules']->value&&$_smarty_tpl->tpl_vars['showEnabledModules']->value!='enabledDisabled'){?>active<?php }?>" <?php if ($_smarty_tpl->tpl_vars['showEnabledModules']->value!='enabledDisabled'&&$_smarty_tpl->tpl_vars['showEnabledModules']->value!=''){?><?php }?>>
				<option value="enabledDisabled" <?php if ($_smarty_tpl->tpl_vars['showEnabledModules']->value=='enabledDisabled'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Enabled & Disabled'),$_smarty_tpl);?>
</option>
				<option value="enabled" <?php if ($_smarty_tpl->tpl_vars['showEnabledModules']->value=='enabled'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Enabled Modules'),$_smarty_tpl);?>
</option>
				<option value="disabled" <?php if ($_smarty_tpl->tpl_vars['showEnabledModules']->value=='disabled'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Disabled Modules'),$_smarty_tpl);?>
</option>
			</select>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
			<label><?php echo smartyTranslate(array('s'=>'Authors'),$_smarty_tpl);?>
</label>
			<select class="filter <?php if (isset($_smarty_tpl->tpl_vars['showTypeModules']->value)&&$_smarty_tpl->tpl_vars['showTypeModules']->value&&$_smarty_tpl->tpl_vars['showTypeModules']->value!='allModules'){?>active<?php }?>" name="module_type" id="module_type_filter">
				<!-- <option value="allModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='allModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'All Modules'),$_smarty_tpl);?>
</option>
				<option value="nativeModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='nativeModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Free Modules'),$_smarty_tpl);?>
</option>
				<option value="partnerModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='partnerModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Partner Modules (Free)'),$_smarty_tpl);?>
</option>
				<option value="mustHaveModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='mustHaveModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Must Have'),$_smarty_tpl);?>
</option>
				<?php if (isset($_smarty_tpl->tpl_vars['logged_on_addons']->value)){?><option value="addonsModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='addonsModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Modules purchased on Addons'),$_smarty_tpl);?>
</option><?php }?> -->
				<option value="allModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='allModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'All'),$_smarty_tpl);?>
</option>
				<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['module_author'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list_modules_authors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['module_author']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
					<option value="authorModules[<?php echo $_smarty_tpl->tpl_vars['module_author']->value;?>
]" <?php if ($_smarty_tpl->tpl_vars['status']->value=="selected"){?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['module_author']->value,20,'...');?>
</option>
				<?php } ?>
				<!-- <option value="otherModules" <?php if ($_smarty_tpl->tpl_vars['showTypeModules']->value=='otherModules'){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Other Modules'),$_smarty_tpl);?>
</option> -->
			</select>
		</div>
	</div>
</div>
	<!-- <span>
		<select class="filter fixed-width-lg" name="country_module_value" id="country_module_value_filter">
			<option value="0" ><?php echo smartyTranslate(array('s'=>'All countries'),$_smarty_tpl);?>
</option>
			<option value="1" <?php if ($_smarty_tpl->tpl_vars['showCountryModules']->value==1){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Current country:'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['nameCountryDefault']->value;?>
</option>
		</select>
	</span> -->
	<!-- <span class="pull-right">
		<button class="btn btn-default " type="submit" name="resetFilterModules">
			<i class="icon-eraser"></i>
			<?php echo smartyTranslate(array('s'=>'Reset'),$_smarty_tpl);?>
 
		</button>
		<button class="btn btn-default " name="filterModules" id="filterModulesButton" type="submit">
			<i class="icon-filter"></i> 
			<?php echo smartyTranslate(array('s'=>'Filter'),$_smarty_tpl);?>

		</button>
	</span> -->
</form>
<!--end filter module--><?php }} ?>