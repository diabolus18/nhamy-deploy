<!-- CS Home Tab module -->
<div class="home_top_tab">
{if count($tabs) > 0}
<div id="tabs">
	{if $option->js_tab == "true"}
	<ul id="ul_cs_tab">
		{foreach from=$tabs item=tab name=tabs}
			<li class="{if $smarty.foreach.tabs.last}last{/if} refreshCarousel">
				<a href="#tabs-{$smarty.foreach.tabs.iteration}" {if $option->scrollPanel == "true"} onclick="return updateCarousel({$smarty.foreach.tabs.iteration});" {else}onclick="return updateNotCarousel({$smarty.foreach.tabs.iteration});"{/if}>{$tab->title[(int)$cookie->id_lang]}</a>
			</li>
		{/foreach}
	</ul>
	{/if}
	{foreach from=$tabs item=tab name=tabs}
		{if $option->js_tab == "false"}
			<div class="title_cats"><h3>{$tab->title[(int)$cookie->id_lang]}</h3></div>
		{/if}
		<div class="title_tab_hide_show" style="display:none">
			{$tab->title[(int)$cookie->id_lang]}
			<input type='hidden' value='{$smarty.foreach.tabs.iteration}' />
		</div>
	<div class="tabs-carousel" id="tabs-{$smarty.foreach.tabs.iteration}">
		<div class="cycleElementsContainer" id="cycle-{$smarty.foreach.tabs.iteration}">
			
			<div id="elements-{$smarty.foreach.tabs.iteration}">
				{if $tab->product_list}
				<div class="list_carousel responsive">
					<ul id="carousel{$smarty.foreach.tabs.iteration}" class="product-list">
					{foreach from=$tab->product_list item=product name=product_list}
						<li class="ajax_block_product {if $smarty.foreach.product_list.first}first_item{elseif $smarty.foreach.product_list.last}last_item{/if}{if $smarty.foreach.product_list.iteration%$option->show == 0} last_item_of_line{/if}">
						<a href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:html:'UTF-8'}" /></a>
						
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
					{if $option->scrollPanel == "true"}
					<a id="prev{$smarty.foreach.tabs.iteration}" class="prev" href="#">&lt;</a>
					<a id="next{$smarty.foreach.tabs.iteration}" class="next" href="#">&gt;</a>
					{/if}
				</div>
				{/if}
			</div>
		</div>
	</div>
	{/foreach}
</div>
<script type="text/javascript">
	$('div.title_tab_hide_show').first().addClass('selected');
	$(document).ready(function() {
		cs_resize();
		initCarousel();
		if(getWidthBrowser() < 767)
		{
			$('#tabs').on('click', '.title_tab_hide_show', function() {
				if($(this).hasClass('selected')) {
					$(this).removeClass('selected');
					var id = $(this).find('input').val();
					$('#tabs-'+id).hide();
				} else {
					$(this).addClass('selected');
					var id = $(this).find('input').val();
					$('#tabs-'+id).show();
				}
			});
		}
	});

	$(window).resize(function() {
		if(!isMobile())
		{
			cs_resize();
		}
	});
	function cs_resize()	{
		if(getWidthBrowser() < 767){ //767
		{if $option->js_tab == "true"}
			$('#tabs').tabs('destroy');
			initCarousel();
		{/if}
			$('.title_tab').hide();
			$('.tabs-carousel').show();
			$('#ul_cs_tab').hide();
			$('#tabs div.title_tab_hide_show').show();
			$('#tabs div.title_tab_hide_show').addClass('selected');
			//initCarousel();
		} else {
			{if $option->js_tab == "true"}
				$('#tabs').tabs();
			{/if}
			{if $option->js_tab == "false"}
				$('.title_tab').show();
			{/if}
			$('.tabs-carousel').show();
			
			$('#ul_cs_tab').show();
			$('#tabs div.title_tab_hide_show').hide();
			
		}
	}
	
	function initCarousel() {
		{if $option->scrollPanel == "true"}
			{foreach from=$tabs item=tab name=tabs}
			//	Responsive layout, resizing the items
			$('#carousel{$smarty.foreach.tabs.iteration}').carouFredSel({
				responsive: true,
				width: '100%',
				prev: '#prev{$smarty.foreach.tabs.iteration}',
				next: '#next{$smarty.foreach.tabs.iteration}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width: 230,
					height: 320,	//	optionally resize item-height
					visible: {
						min: 1,
						max: {$option->show}
					}
				},
				scroll: {
					direction : 'left',    //  The direction of the transition.
					duration  : 500   //  The duration of the transition.
				}
			});
			{/foreach}
		{/if}
	}
	
	function updateNotCarousel(idx){
		jQuery(".tabs-carousel").hide();
		jQuery("#tabs-"+idx).show();
	}

	function updateCarousel(idx){
		$('#carousel'+idx).trigger("destroy", true);
		jQuery(".tabs-carousel").hide();
		jQuery("#tabs-"+idx).show();
		
		$('#carousel'+idx).carouFredSel({
			responsive: true,
			width: '100%',
			prev: '#prev'+idx,
			next: '#next'+idx,
			auto: false,
			swipe: {
				onTouch : true
			},
			items: {
				width: 300,
				height: 350,	//	optionally resize item-height
				visible: {
					min: 3,
					max: {$option->show}
				}
			},
			scroll: {
					direction : 'left',    //  The direction of the transition.
					duration  : 500   //  The duration of the transition.
				}
		});
	}
	
	function isMobile() {
		if(navigator.userAgent.match(/iPod/i)){
				return true;
		}
		return false;
	}

</script>
{/if}
</div>
<!-- /CS Home Tab module -->
