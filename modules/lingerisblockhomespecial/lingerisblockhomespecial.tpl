<script type="text/javascript">
	$(document).ready(function() {
		$("#specialpro").multipleElementsCycleHome({
			prev: '#cprev',
			next: '#cnext',
			container: '#cycle',
			start: 0,
			show: 4
		});
	});
</script>
<div id="specialpro" class="cycleElementsContainer specialpro">
	<h4>{l s='Especiais' mod='lingerisblockspecial'}</h4>
	<p class="title_special">Teste proin pulvinar mauris aliquam libero</p>
	<div class="cycleElementsArrow">
		<a href="#" id="cprev">prev</a>
		<a href="#" id="cnext">next</a>
	</div>
	<div id="cycle">
		<ul class="products-list">
			{if $products}
			{foreach from=$products item=product name=products}
			<li class="ajax_block_product {if $smarty.foreach.products.first}first_item{elseif $smarty.foreach.products.last}last_item{/if}">
				<div onmouseover="$(this).addClass('more-detail-hover')" onmouseout="$(this).removeClass('more-detail-hover')">
					<a href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home')}" alt="{$product.name|escape:html:'UTF-8'}" /></a>
					<a href="{$product.link}" style="display: none;" class="detail_new"></a>
				</div>
				<h3><a href="{$product.link}" title="{$product.name|truncate:32:'...'|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'}</a></h3>
				<p class="manu-name">
					{if $product.id_manufacturer}{$product.manufacturer_name}{/if}
				</p>
				{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
					{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
					<p class="old_price"><span class="bold">
						<span class="old_price_display">{convertPrice price=$product.price_without_reduction}</span>
					</span></p>
					
					<div class="reduction_percent">
					
					<span class="reduction_percent_display">
					{if $product.specific_prices.reduction_type == 'percentage'}
					{$product.specific_prices.reduction*100}%
					{else}
					{convertPrice price=$product.specific_prices.reduction}
					{/if}
					</span><span>off</span></div>
					{/if}
					<p class="price_container"><span class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span></p>
				{else}<div style="height:21px;"></div>{/if}
			</li>
			{/foreach}
			{/if}
		</ul>
	</div>
</div>
