<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
$id_shop = (int)Context::getContext()->shop->id;
/*load color default*/
$array_color = array ();
if (DIRECTORY_SEPARATOR == '/')
	$directory_color = _PS_ROOT_DIR_.'/modules/csthemeeditor/settings/default//';
else
	$directory_color = _PS_ROOT_DIR_.'\modules\csthemeeditor\settings\default\\';
$color_templates = glob($directory_color."*.xml");
foreach($color_templates as $k=>$template)
{
	if(substr(basename($template),8,-4) != "custom")
		$array_color[$k]=substr(basename($template),8,-4);
}
/*load color default*/
if(isset($_COOKIE["color_template_".$id_shop.""]))
{
	$color_tp = $_COOKIE["color_template_".$id_shop.""];
}
else
	$color_tp = Configuration::get('CS_COLOR_TEMPLATE_'.$id_shop,false,Shop::getGroupFromShop($id_shop),$id_shop);
if($color_tp == "custom")
	$color_tp .= '_shop'.$id_shop;
if($color_tp != '')
{
	$path = dirname(__FILE__).'/settings/';
	foreach($array_color as $cdf)
	{
		if($color_tp == $cdf)
			$path = dirname(__FILE__).'/settings/default/';
	}
	$settings = simplexml_load_file($path.'setting_'.$color_tp.'.xml');
}

header("Content-type: text/css");    
?>
/* general */
/* #page background*/
<?php if(isset($settings->g_b_color) || isset($settings->g_b_pattern) || isset($settings->g_b_img) || isset($settings->g_b_repeat)) { ?>
#page, ul.step li span, ul.step li a
{
	<?php 
		if(isset($settings->g_b_img) && (!isset($settings->g_b_pattern) || (isset($settings->g_b_pattern) && ($settings->g_b_pattern == 'up_load_image_general') && $settings->g_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/general/background/<?php echo $settings->g_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->g_b_pattern)) { 
			if($settings->g_b_pattern != 'no_img.jpg' && $settings->g_b_pattern != 'up_load_image_general') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->g_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->g_b_repeat)) {?>
		background-repeat: <?php echo $settings->g_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->g_b_color)) {
			if(isset($settings->g_b_img) || (isset($settings->g_b_pattern) && $settings->g_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->g_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->g_b_color;?>;
		<?php } ?>
		border-color: <?php echo $settings->g_b_color;?>;
		<?php } ?>
}
<?php } ?>

/* body background*/
<?php if(isset($settings->g_b_b_color) || isset($settings->g_b_b_pattern) || isset($settings->g_b_b_img) || isset($settings->g_b_b_repeat)) { ?>
body
{
	<?php 
		if(isset($settings->g_b_b_img) && (!isset($settings->g_b_b_pattern) || (isset($settings->g_b_b_pattern) && ($settings->g_b_b_pattern == 'up_load_image_general_body') && $settings->g_b_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/general_body/background/<?php echo $settings->g_b_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->g_b_b_pattern)) { 
			if($settings->g_b_b_pattern != 'no_img.jpg' && $settings->g_b_b_pattern != 'up_load_image_general_body') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->g_b_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->g_b_b_repeat)) {?>
		background-repeat: <?php echo $settings->g_b_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->g_b_b_color)) {
			if(isset($settings->g_b_b_img) || (isset($settings->g_b_b_pattern) && $settings->g_b_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->g_b_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->g_b_b_color;?>;
		<?php } ?>
		border-color: <?php echo $settings->g_b_b_color;?>;
		<?php } ?>
}
<?php } ?>

<?php 
if(isset($_COOKIE['mode_css']) && $_COOKIE['mode_css'] !='')
{?>
	#page{
	width: <?php echo $_COOKIE['mode_css']?>;
}
<?php }?>

 
<?php if(isset($settings->g_link_color_normal)){?>
a, a:active, a:visited, .block li a,
.ambiance .your_cart, #categories_block_left .tree a, #categories_block_left .tree ul a, #footer .copy-right a, #footer  .countries_ul a,#footer .currencies_ul a, #my-account .myaccount_lnk_list li a, .color-myaccount{color:<?php echo $settings->g_link_color_normal;?>;}
<?php } ?>
<?php if(isset($settings->g_link_color_hover)){?>
a:hover,#page .block li a:hover,.ambiance .your_cart:hover,
#footer li a:hover, #footer .myaccount li a:hover,#footer li.selected_language,
#footer .currencies_ul li.selected a,
#categories_block_left ul.tree a.selected,
#categories_block_left .tree a:hover,
.name_product h4 a:hover,
#left_column h4.title_block a:hover,
.resetimg #wrapResetImages a:hover,
.lost_password a:hover,
li.address_update a:hover,li.address_delete a:hover,l li.address_update a:hover,li.address_delete a:hover,
#ambiance-notification a:hover, #footer .copy-right a:hover, 
.idTabs a:hover, .idTabs .selected, #my-account .myaccount_lnk_list li a:hover, #subcategories ul li a:hover{
	color:<?php echo $settings->g_link_color_hover;?>;
	text-decoration:none;
}

#page #header div.sf-contener .sf-menu li a:hover, #page #menu ul li.menu_item a.title_menu_parent:hover, #menu ul li.menu_item.parent a.title_menu_parent:hover, #menu ul li.menu_item.parent:hover a.title_menu_parent,#sitemap_content div.sitemap_block li a:hover, #listpage_content ul.tree li a:hover
{
	color:<?php echo $settings->g_link_color_hover;?>;
}
<?php } ?>


<?php if(isset($settings->g_text_color) || isset($settings->g_fstyle_1) || isset($settings->g_fsize_1) || isset($settings->g_fweight_1)) {?>
body, .print a,#static_block_top_chat,
input[type="text"], input[type="email"], input[type="search"], input[type="password"],
#search_block_top #search_query_top,
select,
.idTabs a, .title_hide_show,
#new_account_form p.required,
#new_account_form span.form_info, #new_account_form span.inline-infos,
textarea, .title span, .title_cats span.cat_desc, li.address_update a, li.address_delete a, l li.address_update a, li.address_delete a, #address form.std p.required label, #address form.std p.text label, #address form.std p.textarea label,
#identity .std p label, #identity .std p.select span, #identity .std p.radio span, #account-creation_form p.required, #block-history, #subcategories ul li a, #categories_block_left .tree ul a, .ui-tabs .ui-tabs-nav li a
{
	<?php if(isset($settings->g_text_color)){?>
	color:<?php echo $settings->g_text_color;?>;
	<?php } ?>
	<?php if(isset($settings->g_fstyle_1)){?>
	font-family: <?php echo $settings->g_fstyle_1;?>;
	<?php } ?>
	<?php if(isset($settings->g_fsize_1)){?>
	font-size: <?php echo $settings->g_fsize_1;?>px;
	<?php } ?>
	<?php if(isset($settings->g_fweight_1)){?>
	font-style: <?php echo $settings->g_fweight_1;?>;
	<?php } ?>
}
	<?php if(isset($settings->g_text_color)){?>
	ul.step li span, ul.step li a{
		color:<?php echo $settings->g_text_color;?>;
	}
	<?php } ?>
	<?php if(isset($settings->g_fstyle_1)){?>
	ul.pagination a, ul.pagination span, .cart_voucher .title_block, .cart_voucher h4, #block_contact_infos li pre{
		font-family: <?php echo $settings->g_fstyle_1;?>;
	}
	<?php } ?>
	<?php if(isset($settings->g_fsize_1)){?>
	#categories_block_left .tree a, .cart_voucher .title_block, .cart_voucher h4, #block_contact_infos li pre, #layered_block_left .layered_subtitle{
		font-size: <?php echo $settings->g_fsize_1;?>px;
	}
	
	
	<?php } ?>
<?php } ?>
/*color text custom class*/
<?php if(isset($settings->g_color_1)){?>
#page .g_color_1,
.g_color_1,h2, h3, h4, h5, #more_info_sheets h5, #new_account_form h3, .order_carrier_content h3, .order_carrier_content, .cart_voucher .title_block, .cart_voucher h4,
table#cart_summary th, table#cart_summary tfoot td,
#pb-left-column #buy_block label,
table.std th, table.table_block th,
span.address_name, span.address_firstname, span.address_lastname, span.address_update a, span.address_delete a, li.address_title, .pagination .select label, .sortPagiBar .select label, div.addresses p.address_delivery label, div.addresses p#address_invoice_form label, #order .delivery_options_address h3, #order-opc .delivery_options_address h3, ul.pagination li span, ul.pagination li a {
	color:<?php echo $settings->g_color_1;?>;
}
<?php } ?>

<?php if(isset($settings->g_color_2)){?>
#page .g_color_2,
.g_color_2, ul.step li.step_current span, ul.step li.step_current_end span{
	color:<?php echo $settings->g_color_2;?>;
}
<?php } ?>

<?php if(isset($settings->g_color_3)){?>
#page .g_color_3,.g_color_3, #layered_block_left .layered_subtitle {
	color:<?php echo $settings->g_color_3;?>;
}
<?php } ?>
<?php if(isset($settings->g_b_color_custom)){?>
#page .g_b_color_custom,
.g_b_color_custom{
	background-color:<?php echo $settings->g_b_color_custom;?>;
}
<?php } ?>

<?php if(isset($settings->g_b_color_custom)){?>
#page .g_b_color_custom,
.g_b_color_custom {
	background-color:<?php echo $settings->g_b_color_custom;?>;
}
<?php } ?>

/*Blokc Module*/

<?php if(isset($settings->g_bm_t_fstyle_1) ||isset($settings->g_bm_t_fsize_1) || isset($settings->g_bm_t_fweight_1)){?>
#page .g_bm_t_fstyle_1, .g_bm_t_fstyle_1, .block .title_block, .block h4, s_title, #best-sellers_block_center h4.title_block, .ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .title_cats h1, .title h1, .s_title{
	<?php if(isset($settings->g_bm_t_fstyle_1)){?>
	font-family: <?php echo $settings->g_bm_t_fstyle_1;?>;
	<?php }?>
	<?php if(isset($settings->g_bm_t_fsize_1)){?>
	font-size: <?php echo $settings->g_bm_t_fsize_1;?>px;
	<?php }?>
	<?php if(isset($settings->g_bm_t_fweight_1)){?>
	font-style: <?php echo $settings->g_bm_t_fweight_1;?>;
	<?php }?>
}
<?php }?>
<?php if(isset($settings->g_bm_t_fstyle_1)){?>
.ssssss{
	font-family: <?php echo $settings->g_bm_t_fstyle_1;?>;
	}
<?php }?>

/*Block Module Left*/

<?php if(isset($settings->g_bm1_b_color)){?>
#page .g_bm1_b_color,
.g_bm1_b_color,#left_column .block h4.title_block
{
	<?php 
		if(isset($settings->g_bm1_b_img) && (!isset($settings->g_bm1_b_pattern) || (isset($settings->g_bm1_b_pattern) && ($settings->g_bm1_b_pattern == 'up_load_image_blockmodule1') && $settings->g_bm1_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/blockmodule1/background/<?php echo $settings->g_bm1_b_img;?>");
		<?php } else { ?>
		<?php if(isset($settings->g_bm1_b_pattern)) { 
		if($settings->g_bm1_b_pattern != 'no_img.jpg' && $settings->g_bm1_b_pattern != 'up_load_image_blockmodule1') {?>
				background-image: url("images/blockmodule1/background/<?php echo $settings->g_bm1_b_pattern;?>");
		<?php } else { ?>
				background-image: none;
				border:none!important;
		<?php } } } ?>
		
		<?php if(isset($settings->g_bm1_b_repeat)) {?>
		background-repeat: <?php echo $settings->g_bm1_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;
		
		<?php if(isset($settings->g_bm1_b_color)) {
			if(isset($settings->g_bm1_b_img) || (isset($settings->g_bm1_b_pattern) && $settings->g_bm1_b_pattern != 'no_img.jpg') ){ ?>
		background-color: <?php echo $settings->g_bm1_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->g_bm1_b_color;?>;
		<?php } } ?>
}
<?php } ?>
<?php if(isset($settings->g_bm1_sh_color)){?>
#page .g_bm1_sh_color,.g_bm1_sh_color, #left_column .block h4.title_block{
	box-shadow:3px 3px 0 <?php echo $settings->g_bm1_sh_color?>;
	-moz-box-shadow:3px 3px 0 <?php echo $settings->g_bm1_sh_color?>;
	-webkit-box-shadow:3px 3px 0 <?php echo $settings->g_bm1_sh_color?>;
}
<?php } ?>

<?php if(isset($settings->g_bm1_bor_color)){?>
#page .g_bm1_bor_color, .g_bm1_bor_color, #left_column h4.title_block{
	border:2px solid <?php echo $settings->g_bm1_bor_color; ?>;
}
<?php } ?>

<?php if(isset($settings->g_bm1_t_color)){?>
#page .g_bm1_t_color, .g_bm1_t_color, #left_column h4.title_block, #left_column h4.title_block a{
	color:<?php echo $settings->g_bm1_t_color;?>;
}
<?php } ?>

/*block module center*/
<?php if(isset($settings->g_bm2_b_color)){?>
#page .g_bm2_b_color,
.g_bm2_b_color,.s_title {
	background-color:<?php echo $settings->g_bm2_b_color;?>;
}
<?php } ?>
<?php if(isset($settings->g_bm2_sh_color)){?>
#page .g_bm2_sh_color,.g_bm2_sh_color, .s_title{
	box-shadow:3px 3px 0 <?php echo $settings->g_bm2_sh_color?>;
	-moz-box-shadow:3px 3px 0 <?php echo $settings->g_bm2_sh_color?>;
	-webkit-box-shadow:3px 3px 0 <?php echo $settings->g_bm2_sh_color?>;
}
<?php } ?>

<?php if(isset($settings->g_bm2_sh_color)){?>
#page .g_bm2_sh_color, .g_bm2_sh_color{}
<?php } ?>
<?php if(isset($settings->g_bm2_bor_color)){?>
#page .g_bm2_bor_color, .g_bm2_bor_color, .s_title{
	border:2px solid <?php echo $settings->g_bm2_bor_color;?>
}
<?php } ?>

<?php if(isset($settings->g_bm2_t_color)){?>
#page .g_bm2_t_color, .g_bm2_t_color, .s_title{
	color:<?php echo $settings->g_bm2_t_color;?>;
}
<?php } ?>

/*block Module Right*/
<?php if(isset($settings->g_bm3_b_color)){?>
#page .g_bm3_b_color,
.g_bm3_b_color,#best-sellers_block_center h4.title_block {
	background-color:<?php echo $settings->g_bm3_b_color;?>;
}
<?php } ?>

<?php if(isset($settings->g_bm3_sh_color)){?>
#page .g_bm3_sh_color,.g_bm3_sh_color, #best-sellers_block_center h4.title_block{
	box-shadow:3px 3px 0 <?php echo $settings->g_bm3_sh_color?>;
	-moz-box-shadow:3px 3px 0 <?php echo $settings->g_bm3_sh_color?>;
	-webkit-box-shadow:3px 3px 0 <?php echo $settings->g_bm3_sh_color?>;
}
<?php } ?>

<?php if(isset($settings->g_bm3_bor_color)){?>
#page .g_bm3_bor_color, .g_bm3_bor_color , #best-sellers_block_center h4.title_block{
	border:2px solid <?php echo $settings->g_bm3_bor_color;?>;
}
<?php } ?>
<?php if(isset($settings->g_bm3_t_color)){?>
#page .g_bm3_t_color, .g_bm3_t_color, #best-sellers_block_center h4.title_block{
	color:<?php echo $settings->g_bm3_t_color;?>;
}
<?php } ?>

/*Static block */
<?php if(isset($settings->g_st_b_color1)){?>
#page .g_st_b_color1, .g_st_b_color1,.cs_staticblock_left_banner .first{
	background-color:<?php echo $settings->g_st_b_color1; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_b_color2)){?>
#page .g_st_b_color2, .g_st_b_color2, .cs_staticblock_left_banner .last{
	background-color:<?php echo $settings->g_st_b_color2; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_b_color3)){?>
#page .g_st_b_color3,#footer .block.stactic_adv_footer{
	background-color:<?php echo $settings->g_st_b_color3; ?>;
}
<?php } ?>


<?php if(isset($settings->g_st_b_img1_b_pattern) || isset($settings->g_st_b_img1_b_img) || isset($settings->g_st_b_img1_b_repeat)){?>
#footer .block.stactic_adv_footer .first .f_content{
	background-image:url(images/staticblock1/background/<?php echo $settings->g_st_b_img1_b_img; ?>);
}
<?php } ?>

<?php if(isset($settings->g_st_b_img2_b_pattern) || isset($settings->g_st_b_img2_b_img) || isset($settings->g_st_b_img2_b_repeat)){?>
#footer .block.stactic_adv_footer .middle .f_content{
	background-image:url(images/staticblock2/background/<?php echo $settings->g_st_b_img2_b_img; ?>);
}
<?php } ?>

<?php if(isset($settings->g_st_b_img3_b_pattern) || isset($settings->g_st_b_img3_b_img) || isset($settings->g_st_b_img3_repeat)){?>
#footer .block.stactic_adv_footer .last .f_content{
	background-image:url(images/staticblock3/background/<?php echo $settings->g_st_b_img3_b_img; ?>);
}
<?php } ?>

<?php if(isset($settings->g_st_t_color1)){?>
#page .g_st_t_color1, .g_st_t_color1, .cs_staticblock_left_banner .first p{
	color:<?php echo $settings->g_st_t_color1; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_t_color2)){?>
#page .g_st_t_color2, .g_st_t_color2, .cs_staticblock_left_banner .last p{
	color:<?php echo $settings->g_st_t_color2; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_t_color3)){?>
#page .g_st_t_color3, .g_st_t_color3, .cs_home_staticblock .col .cscontent{
	color:<?php echo $settings->g_st_t_color3; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_t_color4)){?>
#page .g_st_t_color4, .g_st_t_color4, #footer .block.stactic_adv_footer .first .f_content{
	color:<?php echo $settings->g_st_t_color4; ?>;
}
<?php } ?>
<?php if(isset($settings->g_st_t_color5)){?>
#page .g_st_t_color5, .g_st_t_color5, #footer .block.stactic_adv_footer .middle .f_content{
	color:<?php echo $settings->g_st_t_color5; ?>;
}
<?php } ?>
<?php if(isset($settings->g_st_t_color6)){?>
#page .g_st_t_color6, .g_st_t_color6, #footer .block.stactic_adv_footer .last .f_content{
	color:<?php echo $settings->g_st_t_color6; ?>;
}
<?php } ?>

<?php if(isset($settings->g_st_t_fstyle_1) || isset($settings->g_st_t_fsize_1) || isset($settings->g_st_t_fweight_1)) {?>
#page .cs_home_staticblock .col .cscontent h4{
	<?php if(isset($settings->g_st_t_fstyle_1)){?>
	font-family:<?php echo $settings->g_st_t_fstyle_1; ?>;
	<?php }?>
	<?php if(isset($settings->g_st_t_fsize_1)){?>
	font-size:<?php echo $settings->g_st_t_fsize_1; ?>px;
	<?php }?>
	<?php if(isset($settings->g_st_t_fweight_1)){?>
	font-weight:<?php echo $settings->g_st_t_fweight_1;?>;
	<?php }?>
	}
<?php }?>

/*Header */
/*Header mode background*/
<?php if(isset($settings->h_b_color) || isset($settings->h_b_img) || isset($settings->h_b_pattern) || isset($settings->h_b_repeat)) { ?>
.mode_header
{
	<?php 
		if(isset($settings->h_b_img) && (!isset($settings->h_b_pattern) || (isset($settings->h_b_pattern) && ($settings->h_b_pattern == 'up_load_image_header') && $settings->h_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/header/background/<?php echo $settings->h_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->h_b_pattern)) { 
			if($settings->h_b_pattern != 'no_img.jpg' && $settings->h_b_pattern != 'up_load_image_header') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->h_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->h_b_repeat)) {?>
		background-repeat: <?php echo $settings->h_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->h_b_color)) {
			if(isset($settings->h_b_img) || (isset($settings->h_b_pattern) && $settings->h_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->h_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->h_b_color;?>;
		<?php } ?>
		border-color: <?php echo $settings->h_b_color;?>;
		<?php } ?>
}
<?php } ?>
/*color text custom - header*/
 <?php if(isset($settings->h_color_1)){?>
#page .h_color_1,
.h_color_1,
#header_links a
{
	color:<?php echo $settings->h_color_1;?>;
}
<?php } ?>
 <?php if(isset($settings->h_color_2)){?>
#page  .h_color_2,
.h_color_2,
#shopping_cart a, #header_user #your_account a.txtmy-account, #static_block_top_face span,
#static_block_top_chat span{
	color:<?php echo $settings->h_color_2;?>;
}
<?php } ?>
 <?php if(isset($settings->h_color_3)){?>
#page .h_color_3,
.h_color_3,
#header_user #your_account a,
#header_user #your_account p,#shopping_cart p span,
#static_block_top_chat {
	color:<?php echo $settings->h_color_3;?>;
}
<?php } ?>
 
/*font text custom - header*/
<?php if(isset($settings->h_fstyle_1) || isset($settings->h_fsize_1) || isset($settings->h_fweight_1)) {?>
#page .h_fstyle_1,
.h_fstyle_1,
#page #shopping_cart a,
#static_block_top_face span,
#header_user #your_account a.txtmy-account,
#static_block_top_chat span
	{	
		<?php if(isset($settings->h_fstyle_1)){?>
		font-family: "<?php echo $settings->h_fstyle_1;?>";
		<?php } ?>
		<?php if(isset($settings->h_fsize_1)){?>
		font-size: <?php echo $settings->h_fsize_1;?>px;
		<?php } ?>
		<?php if(isset($settings->h_fweight_1)){?>
		font-style: <?php echo $settings->h_fweight_1;?>;
		<?php } ?>
	}
<?php } ?>

<?php if(isset($settings->h_fstyle_2) || isset($settings->h_fsize_2) || isset($settings->h_fweight_2)) {?>
#page .h_fstyle_2,
.h_fstyle_2,
#header_user #header_nav li, #shopping_cart p span
	{	
		<?php if(isset($settings->h_fstyle_2)){?>
		font-family: "<?php echo $settings->h_fstyle_2;?>";
		<?php } ?>
		<?php if(isset($settings->h_fsize_2)){?>
		font-size: <?php echo $settings->h_fsize_2;?>px;
		<?php } ?>
		<?php if(isset($settings->h_fweight_2)){?>
		font-style: <?php echo $settings->h_fweight_2;?>;
		<?php } ?>
	}
<?php } ?>


/* Footer */
/* Footer mode background */
<?php if(isset($settings->f_b_color) || isset($settings->f_b_img) || isset($settings->f_b_pattern) || isset($settings->f_b_repeat)) { ?>
.mode_footer
{		
	<?php 
		if(isset($settings->f_b_img) && (!isset($settings->f_b_pattern) || (isset($settings->f_b_pattern) && ($settings->f_b_pattern == 'up_load_image_footer') && $settings->f_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/footer/background/<?php echo $settings->f_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->f_b_pattern)) { 
			if($settings->f_b_pattern != 'no_img.jpg' && $settings->f_b_pattern != 'up_load_image_footer') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->f_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->f_b_repeat)) {?>
		background-repeat: <?php echo $settings->f_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->f_b_color)) {
			if(isset($settings->f_b_img) || (isset($settings->f_b_pattern) && $settings->f_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->f_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->f_b_color;?>;
		<?php } ?>
		border-color: <?php echo $settings->f_b_color;?>;
		<?php } ?>
}
<?php } ?>

 /*color text custom - footer*/
 <?php if(isset($settings->f_color_1)){?>
#page .f_color_1,
.f_color_1,
#page #footer h4 ,
#page #footer h4 a {
	color:<?php echo $settings->f_color_1;?>;
}
<?php } ?>
 <?php if(isset($settings->f_color_2)){?>
#page .f_color_2,
.f_color_2,
#footer,
#footer a,
#block_contact_infos li strong, #block_contact_infos li pre, #block_contact_infos li, #footer .myaccount li a, #footer .copy-right a, #footer .countries_ul a, #footer .currencies_ul a{
	color:<?php echo $settings->f_color_2;?>;
}
<?php } ?>
 <?php if(isset($settings->f_color_3)){?>
#page .f_color_3,
.f_color_3,
#footer li a:hover, #footer .myaccount li a:hover, #footer .copy-right a:hover, #footer .countries_ul li.selected_language, .currencies_ul li, #footer .currencies_ul li.selected a {
	color:<?php echo $settings->f_color_3;?>;
}
<?php } ?>
 
/*font text custom - footer*/
<?php if(isset($settings->f_fstyle_1) || isset($settings->f_fsize_1) || isset($settings->f_fweight_1)) {?>
#page .f_fstyle_1,
.f_fstyle_1,
#page #footer h4 ,
#page #footer h4 a
	{	
		<?php if(isset($settings->f_fstyle_1)){?>
		font-family: <?php echo $settings->f_fstyle_1;?>;
		<?php } ?>
		<?php if(isset($settings->f_fsize_1)){?>
		font-size: <?php echo $settings->f_fsize_1;?>px;
		<?php } ?>
		<?php if(isset($settings->f_fweight_1)){?>
		font-style: <?php echo $settings->f_fweight_1;?>;
		<?php } ?>
	}
<?php } ?>

<?php if(isset($settings->f_fstyle_2) || isset($settings->f_fsize_2) || isset($settings->f_fweight_2)) {?>
#page .f_fstyle_2,
#footer p,
#footer a,
#block_contact_infos li strong, #block_contact_infos li pre
	{	
		<?php if(isset($settings->f_fstyle_2)){?>
		font-family: <?php echo $settings->f_fstyle_2;?>;
		<?php } ?>
		<?php if(isset($settings->f_fsize_2)){?>
		font-size: <?php echo $settings->f_fsize_2;?>px;
		<?php } ?>
		<?php if(isset($settings->f_fweight_2)){?>
		font-style: <?php echo $settings->f_fweight_2;?>;
		<?php } ?>
	}
<?php } ?>


/* Menu */
/* Menu Parent */
<?php if(isset($settings->mp_b_color_normal) OR isset($settings->mp_b_img) OR isset($settings->mp_b_pattern)){?>
#menu,#menu ul.ul_mega_menu,div.sf-contener .sf-menu
	{
		<?php 
		if(isset($settings->mp_b_img) && (!isset($settings->mp_b_pattern) || (isset($settings->mp_b_pattern) && ($settings->mp_b_pattern == 'up_load_image_menuparent') && $settings->mp_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/menuparent/background/<?php echo $settings->mp_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->mp_b_pattern)) { 
			if($settings->mp_b_pattern != 'no_img.jpg' && $settings->mp_b_pattern != 'up_load_image_menuparent') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->mp_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->mp_b_repeat)) {?>
		background-repeat: <?php echo $settings->mp_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->mp_b_color_normal)) {
			if(isset($settings->mp_b_img) || (isset($settings->mp_b_pattern) && $settings->mp_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->mp_b_color_normal; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->mp_b_color_normal;?>;
		<?php } ?>
		border-color: <?php echo $settings->mp_b_color_normal;?>;
		<?php } ?>
		
	}
<?php } ?>
<?php if(isset($settings->mp_b_color_hover)){?>
#menu ul li.menu_item:hover
	{
		background: <?php echo $settings->mp_b_color_hover;?>;
	}
<?php } ?>

<?php if(isset($settings->mp_text_color_normal) || isset($settings->mp_text_fstyle) || isset($settings->mp_text_fsize) || isset($settings->mp_text_fweight)){?>	
#page #menu ul li a.title_menu_parent,
#page #header .sf-menu li a
	{
		<?php if(isset($settings->mp_text_color_normal)){?>	
		color:<?php echo $settings->mp_text_color_normal;?>;
		<?php } ?>
		<?php if(isset($settings->mp_text_fstyle)){?>
		font-family: <?php echo $settings->mp_text_fstyle;?>;
		<?php } ?>
		<?php if(isset($settings->mp_text_fsize)){?>
		font-size: <?php echo $settings->mp_text_fsize;?>px;
		<?php } ?>
		<?php if(isset($settings->mp_text_fweight)){?>
		font-style: <?php echo $settings->mp_text_fweight;?>;
		<?php } ?>
	}
<?php } ?>
<?php if(isset($settings->mp_text_color_hover)){?>
#page #header div.sf-contener .sf-menu li a:hover,
#page #menu ul  li.menu_item a.title_menu_parent:hover
	{
	color:<?php echo $settings->mp_text_color_hover;?>;	
	}
#menu ul li.level-1:hover{
	border-bottom:3px solid <?php echo $settings->mp_text_color_hover;?>;	
}
<?php } ?>


/* Sub menu */
<?php if(isset($settings->ms_b_color_normal) OR isset($settings->ms_b_img) OR isset($settings->ms_b_pattern)){?>
#page #menu > ul li > div.options_list, 
#page #menu > ul li > div.sub_menu,.more-menu,
#page .sf-contener .sf-menu li ul
	{
		<?php 
		if(isset($settings->ms_b_img) && (!isset($settings->ms_b_pattern) || (isset($settings->ms_b_pattern) && ($settings->ms_b_pattern == 'up_load_image_menusub') && $settings->ms_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/menusub/background/<?php echo $settings->ms_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->ms_b_pattern)) { 
			if($settings->ms_b_pattern != 'no_img.jpg' && $settings->ms_b_pattern != 'up_load_image_menusub') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->ms_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->ms_b_repeat)) {?>
		background-repeat: <?php echo $settings->ms_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->ms_b_color_normal)) {
			if(isset($settings->ms_b_img) || (isset($settings->ms_b_pattern) && $settings->ms_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->ms_b_color_normal; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->ms_b_color_normal;?>;
		<?php } ?>
		border-color: <?php echo $settings->ms_b_color_normal;?>;
		<?php } ?>
	}
<?php } ?>


<?php if(isset($settings->ms_b_color_hover)){?>
#page #menu > ul > li .options_list li.category_item:hover,
#page #menu > ul > li .options_list li.category_item li:hover,
#page div.sf-contener .sf-menu li ul li:hover
	{
		background: <?php echo $settings->ms_b_color_hover;?>;
	}
<?php } ?>

/*color text custom - submenu*/
<?php if(isset($settings->ms_text1_color_normal)){?>
#page .ms_text1_color_normal,.ms_text1_color_normal,
#page #menu ul li .out_cat_parent a.ms_text1_color_normal,
#menu > ul li.menu_item > div a,
#menu ul li .div_static p,
#menu ul li .div_static h2, #menu #cs_megamenu_more:hover .more-menu .column .menu_item a.title_menu_parent {
	color : <?php echo $settings->ms_text1_color_normal;?>
}
<?php } ?>
<?php if(isset($settings->ms_text1_color_hover)){?>
#page .ms_text1_color:hover,
#page #menu ul li .out_cat_parent a.ms_text1_color_normal:hover, #menu > ul > li div a:hover, #menu > ul li.menu_item > div a:hover, #menu ul li .product_item a:hover, #menu #cs_megamenu_more:hover .more-menu .column .menu_item a:hover {
	color : <?php echo $settings->ms_text1_color_hover;?>
}
<?php } ?>
<?php if(isset($settings->ms_text2_color_normal)){?>
#page .ms_text2_color,
#page #menu li ul li a{
	color : <?php echo $settings->ms_text2_color_normal;?>
}
<?php } ?>
<?php if(isset($settings->ms_text2_color_hover)){?>
#page .ms_text2_color:hover,
#page #menu li ul li a:hover,
#page #menu > ul li.menu_item > div a:hover{
	color : <?php echo $settings->ms_text2_color_hover;?>
}
<?php } ?>
/*font text custom - submenu*/
<?php if(isset($settings->m_fstyle_1) || isset($settings->m_fsize_1) || isset($settings->m_fweight_1)) {?>
#page .m_fstyle_1,
#page #menu ul li a.title_menu_parent
	{	
		<?php if(isset($settings->m_fstyle_1)){?>
		font-family: "<?php echo $settings->m_fstyle_1;?>";
		<?php } ?>
		<?php if(isset($settings->m_fsize_1)){?>
		font-size: <?php echo $settings->m_fsize_1;?>px;
		<?php } ?>
		<?php if(isset($settings->m_fweight_1)){?>
		font-style: <?php echo $settings->m_fweight_1;?>;
		<?php } ?>
	}
<?php } ?>
<?php if(isset($settings->m_fstyle_2) || isset($settings->m_fsize_2) || isset($settings->m_fweight_2)) {?>
#page .m_fstyle_2,
#page #menu > ul li.menu_item > div a,
#page #menu ul li .ajax_block_product h2 a, #menu ul li .out_cat_parent a, #menu ul li .div_static h2
	{	
		<?php if(isset($settings->m_fstyle_2)){?>
		font-family: "<?php echo $settings->m_fstyle_2;?>";
		<?php } ?>
		<?php if(isset($settings->m_fsize_2)){?>
		font-size: <?php echo $settings->m_fsize_2;?>px;
		<?php } ?>
		<?php if(isset($settings->m_fweight_2)){?>
		font-style: <?php echo $settings->m_fweight_2;?>;
		<?php } ?>
	}
<?php } ?>


/*slideshow*/
<?php if(isset($settings->s_b_color) || isset($settings->s_b_pattern) || isset($settings->s_b_img)) { ?>
.cs_mode_slideshow {
	<?php 
		if(isset($settings->s_b_img) && (!isset($settings->s_b_pattern) || (isset($settings->s_b_pattern) && ($settings->s_b_pattern == 'up_load_image_slideshow') && $settings->s_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/slideshow/background/<?php echo $settings->s_b_img;?>");
		<?php } else {?>
		<?php 
		if(isset($settings->s_b_pattern)) { 
			if($settings->s_b_pattern != 'no_img.jpg' && $settings->s_b_pattern != 'up_load_image_slideshow') {
		?>
		background-image: url("images/general/patterns/<?php echo $settings->s_b_pattern;?>");
		<?php } else { ?>
		background-image: none;
		<?php } } } ?>
		
		<?php if(isset($settings->s_b_repeat)) {?>
		background-repeat: <?php echo $settings->s_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;

		<?php if(isset($settings->s_b_color)) {
			if(isset($settings->s_b_img) || (isset($settings->s_b_pattern) && $settings->s_b_pattern != 'no_img.jpg')){ ?>
		background-color: <?php echo $settings->s_b_color; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->s_b_color;?>;
		<?php } ?>
		border-color: <?php echo $settings->s_b_color;?>;
		<?php } ?>
}
<?php } ?>
/* color custom - slideshow */
<?php if(isset($settings->s_title) and isset($settings->s_box_show_color)){?>
.s_title{
	background-color:<?php echo $settings->s_title;?>;
	box-shadow: 3px 3px 0 <?php echo $settings->s_box_shadow_color;?>;
	-moz-box-shadow: 3px 3px 0 <?php echo $settings->s_box_shadow_color;?>;
	-webkit-box-shadow: 3px 3px 0 <?php echo $settings->s_box_shadow_color;?>;
}
<?php }?>
<?php if(isset($settings->s_bt_b_color)){?>
#page  .s_bt_b_color {
	background-image:none;
	background-color:<?php echo $settings->s_bt_b_color;?>; 
}
<?php } ?> 


<?php if(isset($settings->s_color_1)){?>
#page .s_color_1 {
	color:<?php echo $settings->s_color_1;?>;
}
<?php } ?>
 <?php if(isset($settings->s_color_2)){?>
#page .s_color_2, .cameraContent h4 {
	color:<?php echo $settings->s_color_2;?>;
}
<?php } ?>
 <?php if(isset($settings->s_color_3)){?>
#page .s_color_3, .cameraContent a.s_bt_b_color, #page .cameraContent a.s_bt_b_color:hover {
	color:<?php echo $settings->s_color_3;?>;
}
<?php } ?>
 
/*font text custom - slideshow*/
<?php if(isset($settings->s_fstyle_1) || isset($settings->s_fsize_1) || isset($settings->s_fweight_1)) {?>
#page .s_fstyle_1
	{	
		<?php if(isset($settings->s_fstyle_1)){?>
		font-family: <?php echo $settings->s_fstyle_1;?>;
		<?php } ?>
		<?php if(isset($settings->s_fsize_1)){?>
		font-size: <?php echo $settings->s_fsize_1;?>px;
		<?php } ?>
		<?php if(isset($settings->s_fweight_1)){?>
		font-style: <?php echo $settings->s_fweight_1;?>;
		<?php } ?>
	}
<?php } ?>

<?php if(isset($settings->s_fstyle_2) || isset($settings->s_fsize_2) || isset($settings->s_fweight_2)) {?>
#page .s_fstyle_2, .cameraContent h4
	{	
		<?php if(isset($settings->s_fstyle_2)){?>
		font-family: <?php echo $settings->s_fstyle_2;?>;
		<?php } ?>
		<?php if(isset($settings->s_fsize_2)){?>
		font-size: <?php echo $settings->s_fsize_2;?>px;
		<?php } ?>
		<?php if(isset($settings->s_fweight_2)){?>
		font-style: <?php echo $settings->s_fweight_2;?>;
		<?php } ?>
	}
<?php } ?>
/*Product*/
/*Name product*/
<?php if(isset($settings->p_name_color) || isset($settings->p_fstyle_name) || isset($settings->p_fsize_name) || isset($settings->p_fweight_name)){?>

#page .name_product h4 a,
#page .product_name a,
#page h3 a,
#page h3.s_title_block a,
#best-sellers_block_right li h3 a,
#cart_block #cart_block_list dt a,
#special_block_right li h3 a,
#viewed-products_block_left h3 a,
#page #menu ul li .ajax_block_product h3 a,
#page .block.products_block li h3 a,
#productscategory_list li p.product_name a,
.accessories_block ul#product_list .name_product a,
.ambiance h3 a,.ui-widget-content a, #pb-left-column h4,#pb-left-column h3, .accessories_block div ul li a,  #best-sellers_block_right li h3 a, #special_block_right li h4 a, .product-list li a, #cart_block #cart_block_list dt a,
.cart_last_product_content .s_title_block a, .cs_quickshop h4, table#cart_summary td.cart_description p.s_title_block a
	{
		<?php if(isset($settings->p_name_color)) {?>
		color:<?php echo $settings->p_name_color;?>;
		<?php } ?>
		<?php if(isset($settings->p_fstyle_name)) {?>
		font-family: <?php echo $settings->p_fstyle_name;?>;
		<?php } ?>
		<?php if(isset($settings->p_fsize_name)) {?>
		font-size: <?php echo $settings->p_fsize_name;?>px;
		<?php } ?>
		<?php if(isset($settings->p_fweight_name)) {?>
		font-style: <?php echo $settings->p_fweight_name;?>;
		<?php } ?>
	}
<?php } ?>

/*Description product*/
<?php if(isset($settings->p_des_color) || isset($settings->p_fstyle_description) || isset($settings->p_fsize_description) || isset($settings->p_fweight_description)){?>
#page .product_desc,
.homecategoryfeature .product_desc,
#viewed-products_block_left li .text_desc p, #viewed-products_block_left li .text_desc p a,
#short_description_content p {
	<?php if(isset($settings->p_des_color)) {?>
		color:<?php echo $settings->p_des_color;?>;
		<?php } ?>
		<?php if(isset($settings->p_fstyle_description)) {?>
		font-family: <?php echo $settings->p_fstyle_description;?>;
		<?php } ?>
		<?php if(isset($settings->p_fsize_description)) {?>
		font-size: <?php echo $settings->p_fsize_description;?>px;
		<?php } ?>
		<?php if(isset($settings->p_fweight_description)) {?>
		font-style: <?php echo $settings->p_fweight_description;?>;
		<?php } ?>
}
<?php } ?>
/*Price*/
<?php if(isset($settings->p_price_color)) { ?>
#page .price,
#page .our_price_display,
#page #cart_block #cart_block_total.price, #menu ul li .ajax_block_product p
{
	color:<?php echo $settings->p_price_color;?>;
}
<?php } ?>
<?php if(isset($settings->p_spec_price_color)) { ?>
#page .price-discount {
	color:<?php echo $settings->p_spec_price_color;?>;
}
<?php } ?>

<?php if(isset($settings->p_fstyle_price) || isset($settings->p_fsize_price) || isset($settings->p_fweight_price)){?>
#page .price,
#page .price-discount,
#page .our_price_display,
.homecategoryfeature li .price, #menu ul li .ajax_block_product p{
	<?php if(isset($settings->p_fstyle_price)) {?>
	font-family: <?php echo $settings->p_fstyle_price;?>;
	<?php } ?>
	<?php if(isset($settings->p_fsize_price)) {?>
	font-size: <?php echo $settings->p_fsize_price;?>px;
	<?php } ?>
	<?php if(isset($settings->p_fweight_price)) {?>
	font-style: <?php echo $settings->p_fweight_price;?>;
	<?php } ?>
}
<?php } ?>


/*  Button -- add to cart */
<?php if(isset($settings->bt_b_color_normal) || isset($settings->bt_b_pattern) || isset($settings->bt_b_img) || isset($settings->bt_text_color_normal)){?>
input.button_mini, input.button_small, input.button, input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled, input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large, input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled, a.button_mini, a.button_small, a.button_large, a.exclusive_mini, a.exclusive_small, a.exclusive_large, span.button_mini, span.button_small, span.button, span.button_large, span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled,
#product_list li a.button, #pb-left-column #buy_block input.exclusive,a.exclusive,
.cart_navigation .button, .cart_navigation .button_large, a.button
{
		<?php 
		if(isset($settings->bt_b_img) && (!isset($settings->bt_b_pattern) || (isset($settings->bt_b_pattern) && ($settings->bt_b_pattern == 'up_load_image_button') && $settings->bt_b_pattern != 'no_img.jpg')) ) { ?>
		background-image: url("images/button/background/<?php echo $settings->bt_b_img;?>");
		<?php } else { ?>
		<?php if(isset($settings->bt_b_pattern)) { 
		if($settings->bt_b_pattern != 'no_img.jpg' && $settings->bt_b_pattern != 'up_load_image_button') {?>
				background-image: url("images/general/patterns/<?php echo $settings->bt_b_pattern;?>");
		<?php } else { ?>
				background-image: none;
				border:none!important;
		<?php } } } ?>
		
		<?php if(isset($settings->bt_b_repeat)) {?>
		background-repeat: <?php echo $settings->bt_b_repeat;?>;
		<?php } else { ?>
		background-repeat:repeat;
		<?php } ?>
		background-position:0 0;
		
		<?php if(isset($settings->bt_b_color_normal)) {
			if(isset($settings->bt_b_img) || (isset($settings->bt_b_pattern) && $settings->bt_b_pattern != 'no_img.jpg') ){ ?>
		background-color: <?php echo $settings->bt_b_color_normal; ?>;
		border:none;
		<?php } else { ?>
		background: <?php echo $settings->bt_b_color_normal;?>;
		<?php } ?>
		
		<?php } ?>
		<?php if(isset($settings->bt_text_color_normal)){?>
			color: <?php echo $settings->bt_text_color_normal;?> !important;
		<?php } ?>
}
<?php } ?>


<?php if(isset($settings->bt_b_color_hover) || isset($settings->bt_text_color_hover)){?>
#product_list li a.button:hover,
input.button_mini:hover, input.button_small:hover, input.button:hover, input.button_large:hover, input.button_mini_disabled:hover, input.button_small_disabled:hover, input.button_disabled:hover, input.button_large_disabled:hover, input.exclusive_mini:hover, input.exclusive_small:hover, input.exclusive:hover, input.exclusive_large:hover, input.exclusive_mini_disabled:hover, input.exclusive_small_disabled:hover, input.exclusive_disabled:hover, input.exclusive_large_disabled:hover, a.button_mini:hover, a.button_small:hover, a.button:hover, a.button_large:hover, a.exclusive_mini:hover, a.exclusive_small:hover, a.exclusive:hover, a.exclusive_large:hover, span.button_mini:hover, span.button_small:hover, span.button:hover, span.button_large:hover, span.exclusive_mini:hover, span.exclusive_small:hover, span.exclusive:hover, span.exclusive_large:hover, span.exclusive_large_disabled:hover, #product_list li a.button:hover, #pb-left-column #buy_block input.exclusive:hover, .cart_navigation .button:hover, .cart_navigation .button_large:hover,
a#cs_quickview_handler span:hover, 
#login_form .button:hover , #address #submitAddress.button:hover
{	
	<?php if(isset($settings->bt_b_color_hover)){?>
		background-color: <?php echo $settings->bt_b_color_hover;?>;
	<?php } ?>
	<?php if(isset($settings->bt_text_color_hover)){?>
		color:<?php echo $settings->bt_text_color_hover;?>
	<?php } ?>
}
<?php } ?>



<?php if(isset($settings->bt_fstyle_text) || isset($settings->bt_fsize_text) || isset($settings->bt_fweight_text)){?>
input.button_mini, input.button_small, input.button, input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled, input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large, input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled, a.button_mini, a.button_small, a.button_large, a.exclusive_mini, a.exclusive_small, a.exclusive_large, span.button_mini, span.button_small, span.button, span.button_large, span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled,
#product_list li a.button, #pb-left-column #buy_block input.exclusive,a.exclusive,
.cart_navigation .button, .cart_navigation .button_large, a.button, #menu ul li .ajax_block_product .exclusive
{
	<?php if(isset($settings->bt_fstyle_text)){?>
	font-family:<?php echo $settings->bt_fstyle_text;?>;
	<?php } ?>
	<?php if(isset($settings->bt_fsize_text)){?>
	font-size:<?php echo $settings->bt_fsize_text;?>px;
	<?php } ?>
	<?php if(isset($settings->bt_fweight_text)){?>
	font-style:<?php echo $settings->bt_fweight_text;?>;
	<?php } ?>	
}
<?php } ?>
/*Button 2 color:  buttom Compare*/

<?php if(isset($settings->bt2_b_color_normal) || isset($settings->bt2_b_pattern) || isset($settings->bt2_b_img) || isset($settings->bt2_text_color_normal)){?>
	.cameraContent a.s_bt_b_color, #cart_block #cart-buttons #button_order_cart, input.button_large, .cart_navigation .exclusive, .cart_voucher .submit input.button, .cart_navigation .exclusive, .cart_navigation .exclusive_large, .compare #bt_compare,#cs_quickview_handler span,
	#new_comment_form button, #login_form .button{
		<?php if(isset($settings->bt2_b_color_normal)){?>
		background-color:<?php echo $settings->bt2_b_color_normal;?>;
		<?php }else { ?>
		background-color:transparent;
		<?php } ?>
		<?php if(isset($settings->bt2_b_img)){?>
		background-image:url(images/button2/background/<?php echo $settings->bt2_b_img;?>);
		<?php }else { ?>
		background-image:none;		
		<?php } ?>
		<?php if(isset($settings->bt2_text_color_normal)){?>
			color: <?php echo $settings->bt2_text_color_normal;?> !important;
		<?php } ?>
	}
<?php } ?>


<?php if(isset($settings->bt2_b_color_hover) || isset($settings->bt2_text_color_hover)){?>
#page .bt2_b_color_hover, .bt2_b_color_hover, 
.cameraContent a.s_bt_b_color:hover, #cart_block #cart-buttons #button_order_cart:hover, input.button_large:hover, .cart_navigation .exclusive:hover, .cart_voucher .submit input.button:hover, .cart_navigation .exclusive:hover, .cart_navigation .exclusive_large:hover, .compare #bt_compare:hover,
	#new_comment_form button:hover, #login_form .button:hover, #cs_quickview_handler span:hover{
	<?php if(isset($settings->bt2_b_color_hover)){?>
		background-color:<?php echo $settings->bt2_b_color_hover; ?>;
	<?php } ?>
	<?php if(isset($settings->bt2_text_color_hover)){?>
		color: <?php echo $settings->bt2_text_color_hover;?> !important;
	<?php } ?>
}
<?php }?>




<?php if(isset($settings->bt2_fstyle_text)){?>
#page .bt2_fstyle_text, .bt2_fstyle_text,
.cameraContent a.s_bt_b_color, #cart_block #cart-buttons #button_order_cart, input.button_large, .cart_navigation .exclusive, .cart_voucher .submit input.button, .cart_navigation .exclusive, .cart_navigation .exclusive_large, .compare #bt_compare,#new_comment_form button, #login_form .button, #cs_quickview_handler span{
	<?php if(isset($settings->bt2_fstyle_text)){?>
	font-family:<?php echo $settings->bt2_fstyle_text;?>;
	<?php } ?>
	<?php if(isset($settings->bt2_fsize_text)){?>
	font-size:<?php echo $settings->bt2_fsize_text;?>px;
	<?php } ?>
	<?php if(isset($settings->bt2_fweight_text)){?>
	font-style:<?php echo $settings->bt2_fweight_text;?>;
	<?php } ?>	
}
<?php }?>

/*Title*/
/*Tilte page*/
<?php if(isset($settings->t_p_color) || isset($settings->t_fstyle_page) || isset($settings->t_fsize_page) || isset($settings->t_fweight_page)){?>
.t_p_color, #page #center_column h1, .ui-tabs .ui-tabs-nav li.ui-tabs-selected a, #subcategories h3, .title_tab, .ui-tabs .ui-tabs-nav li a:hover
{
	<?php if(isset($settings->t_p_color)){?>
	color:<?php echo $settings->t_p_color;?>;
	<?php } ?>
	<?php if(isset($settings->t_fstyle_page)){?>
	font-family: <?php echo $settings->t_fstyle_page;?>;
	<?php } ?>
	<?php if(isset($settings->t_fsize_page)){?>
	font-size: <?php echo $settings->t_fsize_page;?>px;
	<?php } ?>
	<?php if(isset($settings->t_fweight_page)){?>
	font-style: <?php echo $settings->t_fweight_page;?>;
	<?php } ?>
}
<?php if(isset($settings->t_fstyle_page)){?>
#categories_block_left .tree a, #layered_block_left .layered_subtitle, h2.productscategory_h2{
	font-family: <?php echo $settings->t_fstyle_page;?>;
}
<?php } ?>
<?php if(isset($settings->t_fweight_page)){?>
#categories_block_left .tree a{
	font-style: <?php echo $settings->t_fweight_page;?>;
	}
<?php } ?>
<?php } ?>
/*breadcrumb*/
<?php if(isset($settings->t_f_bre_color)) { ?>
#page .breadcrumb a {
	color:<?php echo $settings->t_f_bre_color;?>;
}
<?php } ?>
<?php if(isset($settings->t_s_bre_color)) { ?>
#page .breadcrumb {
	color:<?php echo $settings->t_s_bre_color;?>;
}
<?php } ?>

<?php if(isset($settings->t_fstyle_breadcrumb) || isset($settings->t_fsize_breadcrumb) || isset($settings->t_fweight_breadcrumb)){?>
#page .breadcrumb a,
#page .breadcrumb {
	<?php if(isset($settings->t_fstyle_breadcrumb)){?>
	font-family: <?php echo $settings->t_fstyle_breadcrumb;?>;
	<?php } ?>
	<?php if(isset($settings->t_fsize_breadcrumb)){?>
	font-size: <?php echo $settings->t_fsize_breadcrumb;?>px;
	<?php } ?>
	<?php if(isset($settings->t_fweight_breadcrumb)){?>
	font-style: <?php echo $settings->t_fweight_breadcrumb;?>;
	<?php } ?>
}
<?php } ?>
