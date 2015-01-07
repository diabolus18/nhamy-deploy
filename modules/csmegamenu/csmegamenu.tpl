{* define the function create category *}
{function menu level=1}
 {if is_array($data) && $data|@count > 0}
  <div class="sub_menu" style="width : {$width}px;"><ul class="level_{$level}">
  {foreach from=$data item=menu key=k name=menu }
	{assign var="image" value=$ps_cat_img_dir|cat:$menu['id']|cat:'-'|cat:$image_size|cat:'.jpg'}
    {if is_array($menu['children']) && $menu['children']|@count > 0}
      <li class="{if $menu['children']}parent{/if}">
			<a class="cat_child" href="{$menu['link']}">
		{if $show_image == 1 && file_exists($image)} 
		  <img class="img_child" src="{$link->getCatImageLink($menu['name'], $menu['id'], $image_size)}" />
		{/if}
		  {$menu['name']} </a>
		{menu data=$menu['children'] level=$level+1}
	  </li>
    {else}
      <li><a href="{$menu['link']}">
	  {if $show_image == 1 && file_exists($image)}
		  <img class="img_child" src="{$link->getCatImageLink($menu['name'], $menu['id'], $image_size)}" />
	  {/if}
	  {$menu['name']}</a></li>
    {/if}
  {/foreach}
  </ul></div>
  {/if}
{/function}
{if isset($menus) && $menus|@count>0}
<!-- Block mega menu module -->
<div class="cs_mega_menu" id="menu">
	<ul class="ul_mega_menu">
	{foreach from=$menus item=menu  name=menus}
		<li class="menu_item{if $smarty.foreach.menus.first} menu_first{/if} {if $smarty.foreach.menus.last}menu_last {/if}level-1{if $menu->options && $menu->options|@count > 0} parent{/if}">
			<a class="title_menu_parent" href="{$menu->link_of_title}">{$menu->title[(int)$cookie->id_lang]}</a>
			{if $menu->options && $menu->options|@count > 0}
			<div class="options_list" style="width : {$menu->width}px;">
				{foreach from=$menu->options item=option  name=options}
				<div class="option" style="width : {$option['width']}px; float:left">
				 {if $option['type_option'] == 0} <!--case category-->
					{if isset($option['category_parent']) && $option['category_parent']}
						<div class="out_cat_parent">
						{if $option['content_option']->opt_show_parent_cat== 1}
							<a class="ms_text1_color_normal" href="{$link->getCategoryLink($option['category_parent']->id_category, $option['category_parent']->link_rewrite)|escape:'htmlall':'UTF-8'}">
							{$option['category_parent']->name}</a>
						{/if}
						
						{assign var="image" value=$ps_cat_img_dir|cat:$option['category_parent']->id_category|cat:'-'|cat:$option['content_option']->opt_image_size_cate|cat:'.jpg'}
						
						{if $option['content_option']->opt_show_image_cat == 1 && file_exists($image)}
						
						<a class="cat_parent" href="{$link->getCategoryLink($option['category_parent']->id_category, $option['category_parent']->link_rewrite)|escape:'htmlall':'UTF-8'}">
							<img class="img_parent" src="{$link->getCatImageLink($option['category_parent']->link_rewrite, $option['category_parent']->id_image, $option['content_option']->opt_image_size_cate)}" alt=""/>
						</a>{/if}
						</div>
					{/if}
					{if isset($option['sub_category']) && $option['sub_category']}
						{assign var="sub_categories" value=$option['sub_category']['children']}
							{assign var="ul" value=0}
							{while $ul < $sub_categories|@count}
							<ul class="level_0" style="width : {$menu->width_item}px;">
							{assign var="temp" value=$sub_categories|@count/$option['content_option']->opt_fill_column|ceil}
							{assign var="li" value= $ul + $temp}
							{while $ul < $li}
								{if isset($sub_categories[$ul])}
									{assign var="category" value= $sub_categories[$ul]}
									<li class="category_item{if $option['content_option']->opt_show_sub_cat == 1 &&$category['children']} parent{/if}">
										<a class="cat_child" href="{$category.link}">
										{assign var="image" value=$ps_cat_img_dir|cat:$category.id|cat:'-'|cat:$option['content_option']->opt_image_size_cate|cat:'.jpg'}
										{if $option['content_option']->opt_show_image_cat == 1 && file_exists($image)}
										<img class="img_child" src="{$link->getCatImageLink($category.name, $category.id, $option['content_option']->opt_image_size_cate)}" alt=""/>
										{/if}
										{$category.name}</a>
										{if $option['content_option']->opt_show_sub_cat == 1}
											{menu data=$category['children'] show_image=$option['content_option']->opt_show_image_cat image_size=$option['content_option']->opt_image_size_cate
											width={$menu->width_item}}
										{/if}
									</li>
								{/if}	
								{math equation="nbLi + nb" nbLi=$ul nb=1 assign=ul}
							{/while}
							</ul>
							{/while}
					{/if}
				 {/if}
				 {if $option['type_option'] == 1} <!--case product-->
					{assign var="ul" value=0}
					{if isset($option['product_list']) && $option['product_list']}
					{while $ul < $option['product_list']|@count}
						<ul class="column product " style="width : {$menu->width_item}px;">
						{assign var="temp" value=$option['product_list']|@count/$option['content_option']->opt_fill_column|ceil}
						{assign var="li" value= $ul + $temp}
							{while $ul < $li}
								{if isset($option['product_list'][$ul])}
									{assign var="product" value= $option['product_list'][$ul]}
									<li class="ajax_block_product">
									<div class="center_block">
										{if $option['content_option']->opt_show_image_product ==  1      } 											
											<div class="image">
											<a class="menu_product_image" title="{$product->name|escape:'htmlall':'UTF-8'}" href="{$product->getLink()}">
												
												{assign var=imageIds value="`$product->id`-`$product->images['id_image']`"}	<img src="{$link->getImageLink($product->link_rewrite, $imageIds, $option['content_option']->opt_image_size_product)}" alt="{$product->name|escape:'htmlall':'UTF-8'}"/>

											</a></div>
										{/if}
										<div class="name_product">
										<h3><a title="{$product->name|escape:'htmlall':'UTF-8'}" href="{$product->getLink()}">{$product->name|escape:'htmlall':'UTF-8'|truncate:40:'...'}</a></h3></div>
										
										{if (isset($add_prod_display) && ($add_prod_display == 1)) && $product->available_for_order && !isset($restricted_country_mode) && $product->minimal_quantity <= 1 && $product->customizable != 2 && !$PS_CATALOG_MODE}
										{if $product->quantity > 0}
											{if isset($static_token)}
												<a class="button ajax_add_to_cart_button exclusive" rel="ajax_id_product_{$product->id|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product->id|intval}&amp;token={$static_token}", false)}" title="{l s='Add to cart' mod='csmegamenu'}">{l s='Add to cart' mod='csmegamenu'}</a>
											{else}
												<a class="button ajax_add_to_cart_button exclusive" rel="ajax_id_product_{$product->id|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product->id|intval}", false)}" title="{l s='Add to cart' mod='csmegamenu'}">{l s='Add to cart' mod='csmegamenu'}</a>
											{/if}						
										{else}
											<span class="exclusive"><span class="addtocard" >{l s='Out of stock' mod='csmegamenu'}</span></span>
										{/if}
				{/if}
									</div>
									</li>
								{/if}	
								{math equation="nbLi + nb" nbLi=$ul nb=1 assign=ul}
							{/while}
						</ul>
						<span class="spanColumn" style="width : {$menu->width_item}px;" ></span>
						{/while}
						{/if}
				 {/if}
					 {if $option['type_option'] == 2} <!--static block-->
					 {assign var=lang value=$cookie->id_lang}
					 {if isset($option['content_option']->opt_content_static->$lang) && $option['content_option']->opt_content_static->$lang}
					 <div class="div_static">
						{$option['content_option']->opt_content_static->$lang}
					 </div>
					 {/if}
					 {/if}
				 {if $option['type_option'] == 3} <!--manufacture-->
				 {if isset($option['opt_list_manu_info'])}
					{assign var="ul" value=0}
					{while $ul < $option['opt_list_manu_info']|@count}
						<ul class="column manufacture" style="width : {$menu->width_item}px;">
						{assign var="temp" value=$option['opt_list_manu_info']|@count/$option['content_option']->opt_fill_column|ceil}
						{assign var="li" value= $ul + $temp}
							{while $ul < $li}
								{if isset($option['opt_list_manu_info'][$ul])}
									{assign var="manufac" value= $option['opt_list_manu_info'][$ul]}
									<li class="product_item">
									{assign var="image" value=$ps_manu_img_dir|cat:$manufac->id_manufacturer|cat:'-'|cat:$option['content_option']->opt_image_size_manu|cat:'.jpg'}
									
										{if $option['content_option']->opt_show_image_manu == 1 && file_exists($image)}
											<a class="img_manu" href="{$link->getmanufacturerLink($manufac->id_manufacturer, $manufac->link_rewrite)}" title="{$manufac->name|escape:'htmlall':'UTF-8'}">
											<img src="{$img_manu_dir}{$manufac->id_manufacturer|escape:'htmlall':'UTF-8'}-{$option['content_option']->opt_image_size_manu}.jpg" alt="{$manufac->name|escape:'htmlall':'UTF-8'}"/></a>
										{/if}
										{if $option['content_option']->opt_show_name_manu == 1}
										<a href="{$link->getmanufacturerLink($manufac->id_manufacturer, $manufac->link_rewrite)}">{$manufac->name|escape:'htmlall':'UTF-8'|truncate:25:'...'}</a>
										{/if}
									</li>
								{/if}	
								{math equation="nbLi + nb" nbLi=$ul nb=1 assign=ul}
							{/while}
						</ul>
						<span class="spanColumn" style="width : {$menu->width_item}px;" ></span>
						{/while}
					{/if}
				 {/if}
				 {if $option['type_option'] == 4} <!--cms-->
					{assign var="ul" value=0}
					{if isset($option['cms']) && $option['cms']}
					{while $ul < $option['cms']|@count}
						<ul class="column cms" style="width : {$menu->width_item}px;">
						{assign var="temp" value=$option['cms']|@count/$option['content_option']->opt_fill_column|ceil}
						{assign var="li" value= $ul + $temp}
							{while $ul < $li}
								{if isset($option['cms'][$ul])}
									{assign var="cms" value= $option['cms'][$ul]}
									<li class="cms_item">
										<a href="{$cms.link|addslashes}">{$cms.meta_title|escape:'htmlall':'UTF-8'}</a>
									</li>
								{/if}	
								{math equation="nbLi + nb" nbLi=$ul nb=1 assign=ul}
							{/while}
						</ul>
						<span class="spanColumn" style="width : {$menu->width_item}px;" ></span>
						{/while}
					{/if}
				 {/if}
				</div>
				<span class="spanOption" style="width : {$option['width']}px" ></span>
				{/foreach}
			</div>
			<span class="spanOptionList" style="width : {$menu->width}px;" ></span>
			{/if}
		</li>
	{/foreach}
	</ul>
	</div>
<!-- /Block mega menu module -->
{/if}
<script type="text/javascript">
		/*----------Get Var-------------*/
		var numLiItem=0;
			numLiItem=$("#menu ul li.level-1").length;
		var moreInsert1={$option_megamenu->moreipadh};
		var moreInsert2={$option_megamenu->moreipadv};
			
		var htmlLiHide1=getHtmlHide1(moreInsert1,numLiItem);
		var htmlLiHide2=getHtmlHide2(moreInsert2,numLiItem);
		var htmlMenu=$("#menu ul.ul_mega_menu").html();
			
		/*------End get Var----------*/
	if(moreInsert1>0 &&moreInsert2>0)
	{
		/*Ipad onorien*/
		 window.onorientationchange = function(){
				//refesh menu tro lai ban dau
				refeshMenuIpad(moreInsert1,moreInsert2,htmlLiHide1,htmlLiHide2);
				addMoreOnLoad(moreInsert1,moreInsert2,numLiItem,htmlLiHide1,htmlLiHide2);
			 }
	}
	
		});
	
	/*$('document').ready(function(){
			iconClickIpad();			
		});*/
</script>
