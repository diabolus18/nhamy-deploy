{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{$lang_iso}"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="{$lang_iso}"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang_iso}">
	<head>
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta http-equiv="content-language" content="{$meta_language}" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var baseUri = '{$base_uri}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>

{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
	{/foreach}
{/if}
<!--<link href="{$css_dir}reponsive.css" rel="stylesheet" type="text/css" media="screen" />-->
<link href="{$css_dir}bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
{if isset($js_files)}
	{foreach from=$js_files item=js_uri}	
		{if $settings->column == '1_column'}
			{if !strpos($js_uri,"blocklayered.js")}
				<script type="text/javascript" src="{$js_uri}"></script>
			{/if}
		{else}
			<script type="text/javascript" src="{$js_uri}"></script>
		{/if}
	{/foreach}
{/if}


	<script type="text/javascript" src="{$js_dir}codespot/csjquery.cookie.js"></script> 
	<script type="text/javascript" src="{$js_dir}codespot/list.gird.js"></script>
	<script type="text/javascript" src="{$js_dir}codespot/jquery.carouFredSel-6.1.0.js"></script>
	<script type="text/javascript" src="{$js_dir}codespot/getwidthbrowser.js"></script>
	<script type="text/javascript" src="{$js_dir}codespot/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="{$js_dir}codespot/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="{$js_dir}codespot/jquery.ba-throttle-debounce.min.js"></script>

	<script>

$(window).scroll(function(){
  if($(window).scrollTop() > 100){
      $("#scroller").fadeIn("slow").css("display", "visible");
  }
});
$(window).scroll(function(){
  if($(window).scrollTop() < 100){
      $("#scroller").fadeOut("fast");
  }
});


</script>


{if $page_name == 'products-comparison'}
	<script type="text/javascript" src="{$js_dir}codespot/jquery.nicescroll.min.js"></script>
{/if}
<!--[if IE 7]><link href="{$css_dir}global-ie.css" rel="stylesheet" type="text/css" media="{$media}" /><![endif]-->

		{$HOOK_HEADER}

		
<script language="javascript" type="text/javascript">
//<![CDATA[
var cvc_loc0=(window.location.protocol == "https:")? "https://secure.comodo.net/trustlogo/javascript/trustlogo.js" :
"http://www.trustlogo.com/trustlogo/javascript/trustlogo.js";
document.writeln('<scr' + 'ipt language="JavaScript" src="'+cvc_loc0+'" type="text\/javascript">' + '<\/scr' + 'ipt>');
//]]>
</script>

	</head>
	
	<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if $hide_left_column}hide-left-column{/if} {if $hide_right_column}hide-right-column{/if} {if $content_only} content_only {/if}">
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	{if !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
		{/if}
		<div id="page" class="{if $settings->bg_mode == 'box_mode'}page_content{/if}">

			<div id="scroller">
					<div class="container container_24">
						<div class="minha-conta {if $cookie->isLogged()}
										grid_10 
									{else}
										grid_6 
									{/if} ">
							<a href="{$link->getPageLink('index.php')}" class="mini-ico-nhamy-scroller"></a>
							<!-- Block user information module HEADER -->
							<div id="conta">
								<span class="conta_info">
									
									{if $cookie->isLogged()}
										{l s='Oi' mod='blockuserinfo'} <strong>{$cookie->customer_firstname} {$cookie->customer_lastname}</strong>
										</span>

										<ul class="bullet">
											<li><a href="{$link->getPageLink('my-account.php', true)}">{l s='Minha Conta' mod='blockuserinfo'}</a></li>
											<li><a href="{$link->getPageLink('history.php', true)}" title="">{l s='Minhas compras' mod='blockmyaccount'}</a></li>
											<li><a href="{$link->getPageLink('index.php')}?mylogout" title="{l s='Log me out' mod='blockuserinfo'}">{l s='Sair' mod='blockuserinfo'}</a></li>
											
											
									</ul>
									{else}
										Já é cliente? <a href="{$link->getPageLink('my-account.php', true)}">{l s='Entrar' mod='blockuserinfo'}</a>
									{/if}
								</span>
								
							</div>
							<!-- /Block user information module HEADER -->
						</div>

						

						<div class="{if $cookie->isLogged()}
										grid_8 
									{else}
										grid_12 
									{/if}">
							<form method="get" action="{$link->getPageLink('search', true)}" id="searchbox" class="form-search search">
								<div class="input-append">
									<label for="search_query_top"><!-- image on background --></label>
									<input type="hidden" name="orderby" value="position" />
									<input type="hidden" name="orderway" value="desc" />
									<input class="{if $cookie->isLogged()}span3
									{else}span5{/if} search-query" type="text" id="search_query_top" name="search_query" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|htmlentities:$ENT_QUOTES:'utf-8'|stripslashes}{/if}" placeholder="Ex.: Almofada Gamer" required/>
									<button type="submit" name="submit_search" value="{l s='Search' mod='blocksearch'}" class="btn"><i class="icon-search"></i></button>
								</div>
							</form>
						</div>						
						
						<div class="status-carrinho grid_6">
							<!-- MODULE Block cart -->


									<div class="sumario">
										
										
			
			{if $show_wrapping}
			<p>
				{assign var='cart_flag' value='Cart::ONLY_WRAPPING'|constant}
				<span id="cart_block_wrapping_cost" class="price cart_block_wrapping_cost">{if $priceDisplay == 1}{convertPrice price=$cart->getOrderTotal(false, $cart_flag)}{else}{convertPrice price=$cart->getOrderTotal(true, $cart_flag)}{/if}</span>
				<span>{l s='Wrapping' mod='blockcart'}</span>
			</p>
			{/if}

			<span id="cart_block_total" class="price ajax_block_cart_total">{$total}</span>

	
		
									</div>
									<div class="checkout">
										
									<a href="{$link->getPageLink("$order_process", true)}" class="btn btn-mini">{l s='Ver Carrinho >' mod='blockcart'}</a>
									</div><!-- /checkout -->
								
							<!-- /MODULE Block cart -->
						</div><!-- /status-carrinho -->	

					</div><!--/container -->		
				</div><!--/scroller -->

			<!-- Header -->
			<div class="mode_header">
				<div class="container_24">
					<div id="header" class="grid_24 clearfix omega alpha">						
						<div id="header_right" class="grid_14 omega">
							{$HOOK_TOP}
						</div>
						<div class="head">
							<a id="header_logo" href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
							<img class="logo" src="{$img_ps_dir}logo.png" alt="{$shop_name|escape:'htmlall':'UTF-8'}" />
						</a>
						<div class="menu0head">{if isset($CS_MEGA_MENU)}{$CS_MEGA_MENU}{/if}</div><!--/head-->
						</div>
						
					</div>
				</div>
			</div>
			<div class="mode_container">
				<div class="container_24">{if $page_name == 'index'}{hook h='Slider'}{/if}</div>
				<div class="diferenciais">
					<div class="container_24"><img src="{$img_dir}tarja-diferenciais.png" /></div>
				</div><!-- /diferenciais-->
				<div class="container_24">
				{if $page_name != 'index'}
						<!-- Breadcumb -->
						<script type="text/javascript">
							jQuery(document).ready(function() {
								if (jQuery("#old_bc").html()) {
									jQuery("#bc").html(jQuery("#old_bc").html());
									jQuery("#old_bc").hide();
								}
							});
						</script>
						<div class="bc_line">
							<div id="bc" class="breadcrumb"></div>
						</div>
						{/if}
				<div id="columns" class="{if isset($grid_column)}{$grid_column}{/if} grid_24 omega alpha">				
					
					{if isset($settings)}
						{if $page_name != 'index'}
							{if (($settings->column == '2_column_left' || $settings->column == '3_column'))}
								<!-- Left -->
								<div id="left_column" class="{$settings->left_class} alpha">
									{$HOOK_LEFT_COLUMN}
								</div>
							{/if}
						{else}
						<!-- Left -->
							<div id="left_column" class="grid_5 alpha">
								{$HOOK_LEFT_COLUMN}
							</div>
						{/if}
					{else}
						<!-- Left -->
							<div id="left_column" class="grid_5 alpha">
								{$HOOK_LEFT_COLUMN}
							</div>
					{/if}
					<!-- Center -->
					<div id="center_column" class="{if isset($settings)}{if $page_name != 'index'}{$settings->center_class} omega{else} grid_19 omega {/if}{else}grid_19 omega{/if}">
						{if $page_name == 'index'}
							{if isset($HOOK_CS_SLIDESHOW)}
								<div class="cs_mode_slideshow">
									{$HOOK_CS_SLIDESHOW}
								</div>
							{/if}
						{/if}
		{/if}
