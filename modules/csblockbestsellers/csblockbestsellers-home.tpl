{*
* 2007-2012 PrestaShop
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
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- MODULE Home Block best sellers -->
<div id="best-sellers_block_center" class="grid_5 omega block products_block">
	<h4 class="title_block">{l s='Best sellers' mod='csblockbestsellers'}</h4>
	{if isset($best_sellers) AND $best_sellers}
		<div class="block_content">
			{assign var='liHeight' value=320}
			{assign var='nbItemsPerLine' value=5}
			{assign var='nbLi' value=$best_sellers|@count}
			{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
			{math equation="nbLines*liHeight" nbLines=$nbLines|ceil liHeight=$liHeight assign=ulHeight}
			<ul class="cs_best_seller_home">
			{foreach from=$best_sellers item=product name=myLoop}
				<li style="border-bottom:0" class="ajax_block_product">
				<div class="center_block">
					<h3 class="s_title_block"><a href="{$product.link}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:40:'...'|escape:'htmlall':'UTF-8'}</a></h3>
					<p class="price_container"><span class="price">{$product.price}</span></p>
					<a href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}" class="product_image product_img_link"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:html:'UTF-8'}" /></a>
					
				</div>
				</li>
			{/foreach}
			</ul>
			<a id="cs_seller_prev" class="prev btn" href="#">&lt;</a>
			<a id="cs_seller_next" class="next btn" href="#">&gt;</a>
		</div>
	{else}
		<p>{l s='No best sellers at this time' mod='csblockbestsellers'}</p>
	{/if}
</div>
<script type="text/javascript">
	$(window).load(function(){
		$(".cs_best_seller_home").carouFredSel({
			auto: false,
			responsive: true,
				width: '100%',
				prev: '#cs_seller_prev',
				next: '#cs_seller_next',
				swipe: {
					onTouch : true
				},
				items: {
					width : 236,
					visible: {
						min: 1,
						max: 5
					}
				},
				scroll: {
					items : 1 ,       //  The number of items scrolled.
					direction : 'left',    //  The direction of the transition.
					duration  : 500   //  The duration of the transition.
				}

		});
	});
</script>
<!-- /MODULE Home Block best sellers -->
