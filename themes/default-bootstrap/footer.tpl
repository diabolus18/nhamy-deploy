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
{if !isset($content_only) || !$content_only}
					</div><!-- #center_column -->
					{if isset($right_column_size) && !empty($right_column_size)}
						<div id="right_column" class="col-xs-12 col-sm-{$right_column_size|intval} column">{$HOOK_RIGHT_COLUMN}</div>
					{/if}
					</div><!-- .row -->
				</div><!-- #columns -->
			</div><!-- .columns-container -->
			{if isset($HOOK_FOOTER)}
				<!-- Footer -->
				<div class="footer-container">
					<footer id="footer"  class="container">
						<div class="row">{$HOOK_FOOTER}</div>
					</footer>
				</div><!-- #footer -->

				<div class="footer">
					<div class="container">
						<div class="row">

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Minhas Compras</h2>
								<ul>
									<li><a href="{$link->getPageLink('my-account')}" title="Minha Conta">Minha conta</a></li>
									<li><a href="{$link->getPageLink('history')}" title="Meus Pedidos">Meus pedidos</a></li>
									<li><a href="http://nhamy.com.br/module/favoriteproducts/account" title="Lista de desejos">Lista de desejos</a></li>
								</ul>

								<h2>Sobre Nós</h2>
								<ul>
									<li><a href="{$link->getCMSLink('4', 'quem-somos')}" title="Quem somos">Quem somos</a></li>
									<!-- <li><a href="http://blog.nhamy.com.br/" title="">Nosso Blog</a></li> -->
									<!--<li><a href="#" title="">Afiliados</a></li>-->
									<li><a href="{$link->getCMSLink('6', 'politica-de-privacidade')}" title="Política de Privacidade">Política de privacidade</a></li>
									<li><a href="{$link->getCMSLink('3', 'termos-de-uso')}" title="Termos de Uso">Termos de uso</a></li>						
								</ul>
							</div><!-- /col-3 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Eu quero</h2>
								<ul>
									<li><a href="{$link->getPageLink('new-products')}" title="Novos Produtos">Novos Produtos</a></li>
									<li><a href="{$link->getPageLink('prices-drop')}" title="Promoções">Promoções</a></li>
									<!-- <li><a href="http://blog.nhamy.com.br/guia-de-presentes/" title="">Guia de presentes</a></li> -->
								</ul>
							</div><!-- /col-6 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Precisa de Ajuda?</h2>
								<ul>
									<li><a href="{$link->getCMSLink('8', 'formas-de-pagamento')}" title="Formas de Pagamento">Formas de pagamento</a></li>
									<li><a href="{$link->getCMSLink('9', 'politica-de-entrega')}" title="Política de Entrega">Política de Entrega</a></li>
									<li><a href="{$link->getCMSLink('11', 'politica-de-trocas')}" title="Política de Trocas">Política de Trocas</a></li>
									<li><a href="{$link->getCMSLink('10', 'perguntas-frequentes')}" title="">Perguntas frequentes</a></li>
									<li><a href="{$link->getPageLink('contact')}" title="Fale Conosco">Fale conosco</a></li>
								</ul>
							</div><!-- /col-3 -->

							<div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
								<h2>Atendimento</h2>
								<ul>
									<li class="mail"><a href="{$link->getPageLink('contact')}" title="">sac@nhamy.com.br</a></li>
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

							
							

								<img src="{$img_dir}selo-nhamy-segura.jpg" title="Selo Nhamy - Loja Segura" alt="Selo Nhamy - Loja Segura"/>
								<a href="http://www.ecommerceschool.com.br/Lojas-Certificadas/loja-virtual-nhamy" target="_blank">
									<img src="{$img_dir}selo-ecommerce.jpg" title="Selo Profissional E-commerce" alt="Selo Profissional E-commerce"/>
								</a>
								

								<div class="legal">
									<p><strong>NHAMY COMERCIO ELETRONICO LTDA - ME - CNPJ: 16.983.155/0001-25</strong><br/>
								Com sede na Rua Otávio Tarquino, 410, sl 408 – Centro – Nova iguaçu – RJ. CEP: 26.215-342 ‎</p>
								</div>

							</div><!-- /col-8 -->

							<div class="col-lg-4 col-md-4">
								<h2>Formas de Pagamento</h2>
								<img class="bandeiras-pagamento img-responsive" src="{$img_dir}img-formasdepagamento.jpg" title="Formas de pagamento" alt="discriminar bandeiras"/>

								<p>2014 Nhamy.com.br - Todos os direitos reservados - Brasil</p>
							</div><!-- /grid_8 -->
						</div><!--/row-->

					</div><!-- /contaier -->
				</div>

			{/if}
		</div><!-- #page -->


{/if}
{include file="$tpl_dir./global.tpl"}
	</body>
</html>