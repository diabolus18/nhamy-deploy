<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:28:29
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/modules/blockwishlist/blockwishlist_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74813749154ac7dadd83691-88866678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7097c4de68b23172c0476285bf3563f473cf2c2d' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/modules/blockwishlist/blockwishlist_button.tpl',
      1 => 1406998051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74813749154ac7dadd83691-88866678',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7dadd9f816_83818630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7dadd9f816_83818630')) {function content_54ac7dadd9f816_83818630($_smarty_tpl) {?>

<div class="wishlist">
	<a class="addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" href="#" rel="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
', false, 1); return false;">
		<?php echo smartyTranslate(array('s'=>"Add to Wishlist",'mod'=>'blockwishlist'),$_smarty_tpl);?>

	</a>
</div><?php }} ?>