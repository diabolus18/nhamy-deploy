<!-- CS Home Tab module -->
<div class="home_cat_product">
{if count($tabs) > 0}
<div id="cats-product">
	{foreach from=$tabs item=tab name=tabs}
	<div class="cats-product-content{if $smarty.foreach.tabs.iteration==1} alpha{/if}{if $smarty.foreach.tabs.iteration==count($tabs)} omega{/if}">
		{if $option->js_tab == "false"}
			<div class="title_cats">
			<h3>{$tab->title[(int)$cookie->id_lang]}</h3>
			{if isset($tab->cat_desc)}
			{*
				<span class="cat_desc">{$tab->cat_desc|strip_tags:'UTF-8'|truncate:150:'...'}</span>
			*}
			{/if}
			<a href="{$tab->cat_link}" class="cstabtag"><span>{l s="Destaques: "}<strong>{$tab->title[(int)$cookie->id_lang]}</strong></span></a></div>
			
		{/if}
		<div class="cats-content" id="cats-{$smarty.foreach.tabs.iteration}">	
		{if $tab->product_list}
			<ul id="cat{$smarty.foreach.tabs.iteration}" class="product-list">
			{foreach from=$tab->product_list item=product name=product_list}
				<li class="ajax_block_product {if $smarty.foreach.product_list.first}first_item{elseif $smarty.foreach.product_list.last}last_item{/if}{if $smarty.foreach.product_list.iteration%$option->show == 0} last_item_of_line{/if}">
				<a href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')}" alt="{$product.name|escape:html:'UTF-8'}" /></a>
				<div class="product-content">
				<h4><a href="{$product.link}" title="{$product.name|truncate:150:'...'|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'}</a></h4>
				<p class="category_name">{$product.category|escape:'htmlall':'UTF-8'}</p>
				<div class="products_list_price">
					{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
						{if $priceDisplay && $product.reduction}<span class="price-discount">{displayWtPrice p=$product.price_without_reduction}</span>{/if}
						<span class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
					{/if}
				</div>
			</li>
			{/foreach}
			</ul>
			<div class="cclearfix"></div>
		{/if}
		</div>
	</div>
	{/foreach}
</div>
{/if}
</div>
<!-- /CS Home Tab module -->
