{*
	* 2007-2014 PrestaShop
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
	*  @copyright  2007-2014 PrestaShop SA
	*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	*  International Registered Trademark & Property of PrestaShop SA
	*}
	<!DOCTYPE HTML>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"><![endif]-->
	<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"><![endif]-->
	<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{$lang_iso}"><![endif]-->
	<!--[if gt IE 8]> <html class="no-js ie9" lang="{$lang_iso}"><![endif]-->
	<html lang="{$lang_iso}">
	<head>
		<meta charset="utf-8" />
		<title>{$meta_title|escape:'html':'UTF-8'}</title>
		{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}" />
		{/if}
		{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}" />
		{/if}
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		{if isset($css_files)}
		{foreach from=$css_files key=css_uri item=media}
		<link rel="stylesheet" href="{$css_uri|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}" />
		{/foreach}
		{/if}
		{if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
		{$js_def}
		{foreach from=$js_files item=js_uri}
		<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
		{/foreach}
		{/if}
		{$HOOK_HEADER}
		



		
		<!--[if IE 8]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<style>
			
			#center_column #subcategories { display: none;}
			header #block_top_menu .sf-menu a:hover { background: none; color: #ed1f79;}
			header #block_top_menu .sf-menu .sfHover a { background: none; color: #ed1f79;}
			header #block_top_menu .sf-menu .submenu-container li a {
				border-bottom: 1px solid;
				color: #806d62;
				float: left;
				font-size: 16px;
				padding: 15px 10px;
			}
		</style>

	</head>
	<body{if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if isset($content_only) && $content_only} content_only{/if} lang_{$lang_iso}">
	{if !isset($content_only) || !$content_only}
	{if isset($restricted_country_mode) && $restricted_country_mode}
	<div id="restricted-country">
		<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country|escape:'html':'UTF-8'}</span></p>
	</div>
	{/if}
	<div id="page">
		<div class="header-container">
			<header id="header">
				<div class="banner">
					<div class="container">
						<div class="row">
							{hook h="displayBanner"}
						</div>
					</div>
				</div>
				<div class="nav-top">
					<div class="container">
						<div class="row">
							<nav>{hook h="displayNav"}</nav>
						</div>
					</div>
				</div>
				<div>
					<div class="container">
						<div class="row">
							<div id="header_logo">
								<a href="{$base_dir}" title="{$shop_name|escape:'html':'UTF-8'}">
									<img class="logo img-responsive" src="{$img_ps_dir}logo.png" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height}"{/if}/>
								</a>
							</div>
							{if isset($HOOK_TOP)}{$HOOK_TOP}{/if}

						</div>
						<div class="row">
							<nav class="navbar yamm navbar-custom" role="navigation">
								<div class="container">
									<!-- Brand and toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<span class="visible-xs title">Categorias</span>
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>

									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse" id="navbar-collapse-1">
										<ul class="nav navbar-nav">

											<!-- Papelaria -->
											<li class="dropdown yamm-fw">
												<a href="#" data-toggle="dropdown" class="menu-item dropdown-toggle">Papelaria <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<!-- Content container to add padding -->
														<div class="yamm-content">
															<div class="row">
																<div class="col-lg-4 col-md-4 section">
																	<h2><a href="http://nhamy.com.br/5-papelaria">Papelaria</a></h2>
																	<ul class="col-lg-6 list-content">
																		<li><a href="http://nhamy.com.br/71-borrachas-e-clipes">Borrachas e Clips</a></li>
																		<li><a href="http://nhamy.com.br/70-cadernos-e-blocos">Cadernos e Blocos</a></li>
																		<li><a href="http://nhamy.com.br/69-canetas">Canetas</a></li>
																		<li><a href="http://nhamy.com.br/64-estojo">Estojos</a></li>
																		<li><a href="http://nhamy.com.br/67-porta-coisas">Porta Coisas</a></li>
																		<li><a href="http://nhamy.com.br/72-utilidades">Utilidades</a></li>
																	</ul>
																</div>
																<div class="col-lg-8 col-md-6 col-sm-12 hidden-xs banner">
																	<a href="http://nhamy.com.br/67-porta-coisas">
																		<img src="{$img_dir}banners/papelaria.jpg" alt="" class="img-responsive">
																	</a>
																</div>


															</div>
														</div>
													</li>
												</ul>
											</li>


											<!-- Casa e Decoração -->
											<li class="dropdown yamm-fw">
												<a href="#" data-toggle="dropdown" class="menu-item dropdown-toggle">Casa e Decoração <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<!-- Content container to add padding -->
														<div class="yamm-content">
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-12 section">
																	<h2><a href="http://nhamy.com.br/7-casa-e-decoracao">Casa e Decoração</a></h2>
																	<ul class="col-sm-6 list-content">
																		<li><a href="http://nhamy.com.br/10-almofadas">Almofada</a></li>
																		<li><a href="http://nhamy.com.br/63-almofada-de-pescoco">Almofada de Pescoço</a></li>
																		<li><a href="http://nhamy.com.br/14-porta-toalha">Banheiro Divertido</a></li>
																		<li><a href="http://nhamy.com.br/9-capachos">Capachos</a></li>
																		<li><a href="http://nhamy.com.br/23-cofres">Cofres</a></li>
																		<li><a href="http://nhamy.com.br/24-cozinha-divertida">Cozinha Divertida</a></li>
																		<li><a href="http://nhamy.com.br/65-decoracao">Decoração</a></li>
																		<li><a href="http://nhamy.com.br/43-forma-de-gelo">Forma de Gelo</a></li>
																		<li><a href="http://nhamy.com.br/45-garrafas-e-copos">Garrafas e Copos</a></li>
																	</ul>
																	<ul class="col-sm-6 list-content">
																		<li><a href="http://nhamy.com.br/11-lousa-magnetica">Lousa Magnética</a></li>
																		<li><a href="http://nhamy.com.br/28-luminarias">Luminárias</a></li>
																		<li><a href="http://nhamy.com.br/12-placas-divertidas">Placas Divertidas</a></li>
																		<li><a href="http://nhamy.com.br/13-porta-copos">Porta Copos</a></li>
																		<li><a href="http://nhamy.com.br/15-porta-retrato">Porta Retrato</a></li>
																		<li><a href="http://nhamy.com.br/55-pufes-e-bancos">Puffes e Bancos</a></li>
																		<li><a href="http://nhamy.com.br/59-quadros">Quadros</a></li>
																		<li><a href="http://nhamy.com.br/38-quarto-fofo">Quarto Fofo</a></li>
																		<li><a href="http://nhamy.com.br/27-relogio">Relógio</a></li>
																		<li><a href="http://nhamy.com.br/37-trava-porta">Trava Porta</a></li>
																	</ul>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-12 hidden-xs banner">
																	<div class="col-sm-4">
																		<a href="http://nhamy.com.br/55-pufes-e-bancos">
																			<img src="{$img_dir}banners/casa-e-decoracao-hot.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-4">
																		<a href="http://nhamy.com.br/24-cozinha-divertida">
																			<img src="{$img_dir}banners/casa-e-decoracao-sohot.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-4">
																		<a href="http://nhamy.com.br/10-almofadas">
																			<img src="{$img_dir}banners/casa-e-decoracao-veryhot.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																</div>


															</div>
														</div>
													</li>
												</ul>
											</li>

											<!-- Uso Pessoal -->
											<li class="dropdown yamm-fw">
												<a href="#" data-toggle="dropdown" class="menu-item dropdown-toggle">Uso Pessoal <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<!-- Content container to add padding -->
														<div class="yamm-content">
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-12 section">
																	<h2><a href="http://nhamy.com.br/16-uso-pessoal">Uso Pessoal</a></h2>
																	<ul class="col-sm-6 list-content">
																		<li><a href="http://nhamy.com.br/17-canecas">Canecas</a></li>
																		<li><a href="http://nhamy.com.br/39-capas">Capas</a></li>
																		<li><a href="http://nhamy.com.br/19-chaves-e-afins">Chaves e Afins</a></li>
																		<li><a href="http://nhamy.com.br/35-gadgets">Gadgets</a></li>
																		<li><a href="http://nhamy.com.br/18-mascaras-de-dormir">Máscara de Dormir</a></li>
																		<li><a href="http://nhamy.com.br/21-porta-bijoux">Porta Bijoux</a></li>
																		<li><a href="http://nhamy.com.br/60-porta-cartao-">Porta Cartão</a></li>
																	</ul>
																	<ul class="col-sm-6 list-content">
																		<li><a href="http://nhamy.com.br/30-porta-documentos">Porta Documentos</a></li>
																		<li><a href="http://nhamy.com.br/36-porta-trecos">Porta Trecos</a></li>
																		<li><a href="http://nhamy.com.br/32-suporte-para-celular-e-tablets">Suporte para Celulares e Tablets</a></li>
																		<li><a href="http://nhamy.com.br/31-utilidades">Utilidades</a></li>
																	</ul>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-12 hidden-xs banner">
																	<ul>
																		<li>
																			<a href="http://nhamy.com.br/18-mascaras-de-dormir">
																				<img src="{$img_dir}banners/uso-pessoal-mascaras.jpg" alt="" class="img-responsive">
																			</a>	
																		</li>
																		<li>
																			<a href="http://nhamy.com.br/19-chaves-e-afins">
																				<img src="{$img_dir}banners/uso-pessoal-chaveiros.jpg" alt="" class="img-responsive">
																			</a>	
																		</li>
																	</ul>
																	
																	
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>

											<!-- Para Elas -->
											<li class="dropdown yamm-fw">
												<a href="#" data-toggle="dropdown" class="menu-item dropdown-toggle">Para Elas <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<!-- Content container to add padding -->
														<div class="yamm-content">
															<div class="row">
																<div class="col-lg-4 section">
																	<h2><a href="http://nhamy.com.br/22-para-elas">Para Elas</a></h2>
																	<ul class="col-lg-6 list-content">
																		<li><a href="http://nhamy.com.br/48-bolsas-e-necessaire">Bolsas e Necessaire</a></li>
																		<li><a href="http://nhamy.com.br/49-espelhos">Espelhos</a></li>
																		<li><a href="http://nhamy.com.br/51-kit-manicure">Kit Manicure</a></li>
																		<li><a href="http://nhamy.com.br/52-outros">Outros</a></li>
																		<li><a href="http://nhamy.com.br/46-porta-absorvente">Porta Absorvente</a></li>
																		<li><a href="http://nhamy.com.br/50-porta-bijoux">Porta Bijoux</a></li>
																		<li><a href="http://nhamy.com.br/47-porta-chapinha">Porta Chapinha</a></li>
																	</ul>
																</div>
																<div class="col-lg-8 col-md-6 col-sm-12 hidden-xs banner">
																	<a href="http://nhamy.com.br/47-porta-chapinha">
																		<img src="{$img_dir}banners/para-elas-chapinhas.jpg" alt="" class="img-responsive">
																	</a>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>




											<!-- Jogos -->
											<li>
												<a href="http://nhamy.com.br/34-jogos" class="menu-item">Jogos</a>
											</li>

											<!-- Lixeiras -->
											<li class="dropdown yamm-fw">
												<a href="http://nhamy.com.br/41-lixeiras" class="menu-item">Lixeiras</a>
											</li>


											<!-- Especiais -->
											<li class="dropdown yamm-fw">
												<a href="#" data-toggle="dropdown" class="menu-item dropdown-toggle">Especiais <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<!-- Content container to add padding -->
														<div class="yamm-content">
															<div class="row">
																<div class="col-lg-4 section">
																	<h2><a href="http://nhamy.com.br/53-especiais">Especiais</a></h2>
																	<ul class="col-lg-6 list-content">
																		<li><a href="http://nhamy.com.br/54-colecao-animais">Coleção Animais</a></li>
																		<li><a href="http://nhamy.com.br/57-corujas">Corujas</a></li>
																		<li><a href="http://nhamy.com.br/58-dc-comics">DC Comics</a></li>
																		<li><a href="http://nhamy.com.br/66-dia-dos-pais">Dia dos Pais</a></li>
																		<li><a href="http://nhamy.com.br/25-love-love">Love Love</a></li>
																	</ul>
																</div>
																<div class="col-lg-8 banner">
																	<div class="col-sm-6">
																		<a href="http://nhamy.com.br/66-dia-dos-pais">
																			<img src="{$img_dir}banners/especiais-dia-dos-pais.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-6">
																		<a href="http://nhamy.com.br/58-dc-comics">
																			<img src="{$img_dir}banners/especiais-dc-comics.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>


											<!-- Lixeiras -->
											<li class="dropdown yamm-fw">
												<a href="http://nhamy.com.br/62-kids" class="menu-item">Kids</a>
											</li>


											<!-- Lixeiras -->
											<li class="dropdown yamm-fw">
												<a href="http://nhamy.com.br/26-drink-store" class="menu-item">Drink Store</a>

											</li>






										</ul>


									</div><!-- /.navbar-collapse -->
								</div><!-- /.container-fluid -->
							</nav>
						</div>
					</div>
				</div>
			</header>
			<div class="container tarja-diferenciais">
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12"><img src="{$img_dir}diferenciais-frete-gratis.png" alt="Frete Grátis a partir de R$ 150 para capitais de RJ e SP." class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs hidden-sm"><img src="{$img_dir}diferenciais-novos-produtos.png" alt="Novos produtos todo mês" class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs hidden-sm"><img src="{$img_dir}diferenciais-primeira-troca.png" alt="A primeira troca é por nossa conta" class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs "><img src="{$img_dir}diferenciais-envio-rapido.png" alt="Envio em até 24h (exceto feriados)" class="img-responsive"></div>
			</div>
		</div>
		<div class="columns-container">
			<div id="columns" class="container">
				{if $page_name !='index' && $page_name !='pagenotfound'}
				{include file="$tpl_dir./breadcrumb.tpl"}
				{/if}
				<div id="slider_row" class="row">
					<div id="top_column" class="center_column col-xs-12 col-sm-12">{hook h="displayTopColumn"}</div>
				</div>
				<div class="row">
					{if isset($left_column_size) && !empty($left_column_size)}
					<div id="left_column" class="column col-xs-12 col-sm-{$left_column_size|intval}">{$HOOK_LEFT_COLUMN}</div>
					{/if}
					{if isset($left_column_size) && isset($right_column_size)}{assign var='cols' value=(12 - $left_column_size - $right_column_size)}{else}{assign var='cols' value=12}{/if}
					<div id="center_column" class="center_column col-xs-12 col-sm-{$cols|intval}">
						{/if}