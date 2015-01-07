<?php /* Smarty version Smarty-3.1.14, created on 2015-01-06 21:26:45
         compiled from "/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63305324254ac7d454a2169-35844027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89dbefbcd6a0fe94e9ee1479ca1c9bfc4cc0e97f' => 
    array (
      0 => '/Applications/MAMP/htdocs/nhamy-deploy/themes/default-bootstrap/footer.tpl',
      1 => 1406997681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63305324254ac7d454a2169-35844027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'right_column_size' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
    'link' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ac7d45567f04_06755028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac7d45567f04_06755028')) {function content_54ac7d45567f04_06755028($_smarty_tpl) {?>
<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value){?>
					</div><!-- #center_column -->
					<?php if (isset($_smarty_tpl->tpl_vars['right_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['right_column_size']->value)){?>
						<div id="right_column" class="col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['right_column_size']->value);?>
 column"><?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>
</div>
					<?php }?>
					</div><!-- .row -->
				</div><!-- #columns -->
			</div><!-- .columns-container -->
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER']->value)){?>
				<!-- Footer -->
				<div class="footer-container">
					<footer id="footer"  class="container">
						<div class="row"><?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>
</div>
					</footer>
				</div><!-- #footer -->

				<div class="footer">
					<div class="container">
						<div class="row">

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Minhas Compras</h2>
								<ul>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account');?>
" title="Minha Conta">Minha conta</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('history');?>
" title="Meus Pedidos">Meus pedidos</a></li>
									<li><a href="http://nhamy.com.br/module/favoriteproducts/account" title="Lista de desejos">Lista de desejos</a></li>
								</ul>

								<h2>Sobre Nós</h2>
								<ul>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('4','quem-somos');?>
" title="Quem somos">Quem somos</a></li>
									<!-- <li><a href="http://blog.nhamy.com.br/" title="">Nosso Blog</a></li> -->
									<!--<li><a href="#" title="">Afiliados</a></li>-->
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('6','politica-de-privacidade');?>
" title="Política de Privacidade">Política de privacidade</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('3','termos-de-uso');?>
" title="Termos de Uso">Termos de uso</a></li>						
								</ul>
							</div><!-- /col-3 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Eu quero</h2>
								<ul>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('new-products');?>
" title="Novos Produtos">Novos Produtos</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop');?>
" title="Promoções">Promoções</a></li>
									<!-- <li><a href="http://blog.nhamy.com.br/guia-de-presentes/" title="">Guia de presentes</a></li> -->
								</ul>
							</div><!-- /col-6 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Precisa de Ajuda?</h2>
								<ul>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('8','formas-de-pagamento');?>
" title="Formas de Pagamento">Formas de pagamento</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('9','politica-de-entrega');?>
" title="Política de Entrega">Política de Entrega</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('11','politica-de-trocas');?>
" title="Política de Trocas">Política de Trocas</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('10','perguntas-frequentes');?>
" title="">Perguntas frequentes</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact');?>
" title="Fale Conosco">Fale conosco</a></li>
								</ul>
							</div><!-- /col-3 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Atendimento</h2>
								<ul>
									<li class="mail"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact');?>
" title="">sac@nhamy.com.br</a></li>
									<li class="phone"><a>(21) 3582-8186</a></li>
								
								</ul>

								<h2>Redes Sociais</h2>
								<ul>
									<li><a href="http://www.facebook.com/nhamy.com.br" title="" class="ico-social facebook" target="_blank">Curta no Facebook</a></li>
									<li><a href="http://www.twitter.com/siganhamy" title="Siga a Nhamy no facebook" class="ico-social twitter" target="_blank">Siga no twitter</a></li>
									<li><a href="http://www.pinterest.com/nhamy" title="" class="ico-social pinterest" target="_blank">Acompanhe no Pinterest</a></li>
									<li><a href="http://www.instagram.com/lojanhamy" title="" class="ico-social instagram" target="_blank">Siga no Instagram</a></li>
									<li><a href="https://google.com/+NhamyBr" rel="publisher" target="_blank">Acompanhar no Google+</a></li>
									

								
								</ul>
							</div><!-- /col-3 -->


							
						</div>
					</div>
				</div><!--/footer-->

				<div class="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-8">

							
							

								<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
selo-nhamy-segura.jpg" title="Selo Nhamy - Loja Segura" alt="Selo Nhamy - Loja Segura"/>
								<a href="http://www.ecommerceschool.com.br/Lojas-Certificadas/loja-virtual-nhamy" target="_blank">
									<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
selo-ecommerce.jpg" title="Selo Profissional E-commerce" alt="Selo Profissional E-commerce"/>
								</a>
								

								<div class="legal">
									<p><strong>NHAMY COMERCIO ELETRONICO LTDA - ME - CNPJ: 16.983.155/0001-25</strong><br/>
								Com sede na Rua Otávio Tarquino, 410, sl 408 – Centro – Nova iguaçu – RJ. CEP: 26.215-342 ‎</p>
								</div>

							</div><!-- /col-8 -->

							<div class="col-lg-4 col-md-4">
								<h2>Formas de Pagamento</h2>
								<img class="bandeiras-pagamento img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
img-formasdepagamento.jpg" title="Formas de pagamento" alt="discriminar bandeiras"/>

								<p>2014 Nhamy.com.br - Todos os direitos reservados - Brasil</p>
							</div><!-- /grid_8 -->
						</div><!--/row-->

					</div><!-- /contaier -->
				</div>

			<?php }?>
		</div><!-- #page -->


<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>