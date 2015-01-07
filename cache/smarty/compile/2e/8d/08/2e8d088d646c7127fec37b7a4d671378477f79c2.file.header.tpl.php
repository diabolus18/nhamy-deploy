<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:26:45
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46164478854ac7d4507fb64-07174772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8d088d646c7127fec37b7a4d671378477f79c2' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/header.tpl',
      1 => 1407210424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46164478854ac7d4507fb64-07174772',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_defer' => 0,
    'js_files' => 0,
    'js_def' => 0,
    'js_uri' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'body_classes' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'img_ps_dir' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_TOP' => 0,
    'img_dir' => 0,
    'left_column_size' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'right_column_size' => 0,
    'cols' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7d4530eeb9_46098712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d4530eeb9_46098712')) {function content_54ac7d4530eeb9_46098712($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include '/Applications/MAMP/htdocs/nhamy-deploy/tools/smarty/plugins/function.implode.php';
?>
	<!DOCTYPE HTML>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
	<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
	<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
	<!--[if gt IE 8]> <html class="no-js ie9" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
	<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<meta charset="utf-8" />
		<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
		<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value){?>
		<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value){?>
		<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
		<?php }?>
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value){?>no<?php }?>follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['css_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['media']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
		<?php } ?>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['js_defer']->value)&&!$_smarty_tpl->tpl_vars['js_defer']->value&&isset($_smarty_tpl->tpl_vars['js_files']->value)&&isset($_smarty_tpl->tpl_vars['js_def']->value)){?>
		<?php echo $_smarty_tpl->tpl_vars['js_def']->value;?>

		<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
		<script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
"></script>
		<?php } ?>
		<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>

		



		
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
	<body<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)){?> id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['body_classes']->value)&&count($_smarty_tpl->tpl_vars['body_classes']->value)){?> <?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['body_classes']->value,'separator'=>' '),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value){?> hide-left-column<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value){?> hide-right-column<?php }?><?php if (isset($_smarty_tpl->tpl_vars['content_only']->value)&&$_smarty_tpl->tpl_vars['content_only']->value){?> content_only<?php }?> lang_<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value){?>
	<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value){?>
	<div id="restricted-country">
		<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['geolocation_country']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></p>
	</div>
	<?php }?>
	<div id="page">
		<div class="header-container">
			<header id="header">
				<div class="banner">
					<div class="container">
						<div class="row">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBanner"),$_smarty_tpl);?>

						</div>
					</div>
				</div>
				<div class="nav-top">
					<div class="container">
						<div class="row">
							<nav><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav"),$_smarty_tpl);?>
</nav>
						</div>
					</div>
				</div>
				<div>
					<div class="container">
						<div class="row">
							<div id="header_logo">
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
									<img class="logo img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['img_ps_dir']->value;?>
logo.png" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value){?> width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value){?> height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?>/>
								</a>
							</div>
							<?php if (isset($_smarty_tpl->tpl_vars['HOOK_TOP']->value)){?><?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>
<?php }?>

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
																		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/papelaria.jpg" alt="" class="img-responsive">
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
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/casa-e-decoracao-hot.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-4">
																		<a href="http://nhamy.com.br/24-cozinha-divertida">
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/casa-e-decoracao-sohot.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-4">
																		<a href="http://nhamy.com.br/10-almofadas">
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/casa-e-decoracao-veryhot.jpg" alt="" class="img-responsive">
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
																				<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/uso-pessoal-mascaras.jpg" alt="" class="img-responsive">
																			</a>	
																		</li>
																		<li>
																			<a href="http://nhamy.com.br/19-chaves-e-afins">
																				<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/uso-pessoal-chaveiros.jpg" alt="" class="img-responsive">
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
																		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/para-elas-chapinhas.jpg" alt="" class="img-responsive">
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
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/especiais-dia-dos-pais.jpg" alt="" class="img-responsive">
																		</a>	
																	</div>
																	<div class="col-sm-6">
																		<a href="http://nhamy.com.br/58-dc-comics">
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
banners/especiais-dc-comics.jpg" alt="" class="img-responsive">
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
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
diferenciais-frete-gratis.png" alt="Frete Grátis a partir de R$ 150 para capitais de RJ e SP." class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs hidden-sm"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
diferenciais-novos-produtos.png" alt="Novos produtos todo mês" class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs hidden-sm"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
diferenciais-primeira-troca.png" alt="A primeira troca é por nossa conta" class="img-responsive"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12 hidden-xs "><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
diferenciais-envio-rapido.png" alt="Envio em até 24h (exceto feriados)" class="img-responsive"></div>
			</div>
		</div>
		<div class="columns-container">
			<div id="columns" class="container">
				<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='pagenotfound'){?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
				<div id="slider_row" class="row">
					<div id="top_column" class="center_column col-xs-12 col-sm-12"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopColumn"),$_smarty_tpl);?>
</div>
				</div>
				<div class="row">
					<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['left_column_size']->value)){?>
					<div id="left_column" class="column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['left_column_size']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>
</div>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&isset($_smarty_tpl->tpl_vars['right_column_size']->value)){?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable((12-$_smarty_tpl->tpl_vars['left_column_size']->value-$_smarty_tpl->tpl_vars['right_column_size']->value), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable(12, null, 0);?><?php }?>
					<div id="center_column" class="center_column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['cols']->value);?>
">
						<?php }?><?php }} ?>