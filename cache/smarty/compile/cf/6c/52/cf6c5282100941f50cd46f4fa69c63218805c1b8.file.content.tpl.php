<?php /* Smarty version Smarty-3.1.14, created on 2014-12-02 21:43:28
         compiled from "/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:403931661547e5cb0d90ff2-04271320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf6c5282100941f50cd46f4fa69c63218805c1b8' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy/admin3007/themes/default/template/content.tpl',
      1 => 1406734888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '403931661547e5cb0d90ff2-04271320',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547e5cb0da2357_79284034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e5cb0da2357_79284034')) {function content_547e5cb0da2357_79284034($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>