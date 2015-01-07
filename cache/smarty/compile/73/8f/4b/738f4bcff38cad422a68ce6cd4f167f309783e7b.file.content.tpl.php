<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:16:24
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85274050453d93678d82d71-99116970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '738f4bcff38cad422a68ce6cd4f167f309783e7b' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/admin3007/themes/default/template/content.tpl',
      1 => 1406738487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85274050453d93678d82d71-99116970',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d93678d95437_81978556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d93678d95437_81978556')) {function content_53d93678d95437_81978556($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>