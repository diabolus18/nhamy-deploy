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

			{if !$content_only}
					</div><!-- /Center -->
			{if isset($settings)}
				{if $page_name != 'index'}
					{if (($settings->column == '2_column_right' || $settings->column == '3_column'))}
						<!-- Left -->
						<div id="right_column" class="{$settings->right_class} omega">
							{$HOOK_RIGHT_COLUMN}
						</div>
						{if $settings->column == '3_column'}
						<script type="text/javascript">
						if($("#right_column #layered_block_left").length>0)
						{
							$("#right_column #layered_block_left").css("display","none");
							$("#right_column #layered_block_left").remove();
						}
						</script>
						{/if}
					{/if}
				{/if}
			{/if}
				</div><!--/columns-->
			</div><!--/container_24-->
			</div>
<!-- Footer -->
			<div class="mode_footer" id="footer">
				<div class="melt-pink-footer">
					<div class="container_24">
						<div class="grid_12">
							<h3>Buscar</h3>
							
							<form method="get" action="{$link->getPageLink('search', true)}" id="searchbox" class="form-search">
								<label for="search_query_top"><!-- image on background -->Não encontrou o que queria? Tente novamente:</label>
								<div class="input-append">
									<input type="hidden" name="orderby" value="position" />
									<input type="hidden" name="controller" value="search" />
									<input type="hidden" name="orderway" value="desc" />
									<input class="span5 search-query" type="text" id="search_query_top" name="search_query" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|htmlentities:$ENT_QUOTES:'utf-8'|stripslashes}{/if}" placeholder="Ex.: Almofada Gamer" required/>
									<button type="submit" name="submit_search" value="{l s='Buscar' mod='blocksearch'}" class="btn" /><i class="icon-search"></i></button>
								</div>
							</form>



						</div>
						<div class="grid_12">
							<!-- Begin MailChimp Signup Form -->
							<h3 class="">Novidades por email</h3>
							<div id="mc_embed_signup">
							<form action="http://nhamy.us5.list-manage1.com/subscribe/post?u=14204cd2b7&amp;id=c2fed6d82b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-search" target="_blank" novalidate>
								<label for="mce-EMAIL">Cadastre-se para receber nossas novidades e promoções</label>
								<div class="input-append">
									
									
									<div class="input-prepend input-append">
										<span class="add-on"><i class="icon-envelope"></i></span>
										<input type="email" name="EMAIL" class="email span5" id="appendedPrependedInput" placeholder="Seu endereço de email" required/>	
										<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn">Assinar</button>
									</div>

									    
									<div class="clear"></div>
								</div>
							</form>
							</div>
							<!--End mc_embed_signup-->
						</div>

					</div>
				</div>
				<div class="container container_24">
					
					<div class="grid_6">
						<h2>Minhas Compras</h2>
						<ul>
							<li><a href="http://www.nhamy.com.br/minhaconta" title="Minha Conta">Minha conta</a></li>
							<li><a href="http://www.nhamy.com.br/meuspedidos" title="">Meus pedidos</a></li>
							<li><a href="#" title="">Lista de desejos</a></li>
						</ul>

						<h2>Sobre Nós</h2>
						<ul>
							<li><a href="http://www.nhamy.com.br/content/4-quem-somos" title="Quem somos">Quem somos</a></li>
							<li><a href="http://nhamy.com.br/blog/" title="">Nosso Blog</a></li>
							<!--<li><a href="#" title="">Afiliados</a></li>-->
							<li><a href="http://www.nhamy.com.br/content/6-politica-de-privacidade" title="Política de Privacidade">Política de privacidade</a></li>
							<li><a href="http://www.nhamy.com.br/content/3-termos-de-uso" title="Termos de Uso">Termos de uso</a></li>						
						</ul>
					</div><!-- /grid_6 -->
					<div class="grid_6">
						<h2>Eu quero</h2>
						<ul>
							<li><a href="http://www.nhamy.com.br/novos-produtos" title="Novos Produtos">Novos Produtos</a></li>
							<li><a href="http://www.nhamy.com.br/promocoes" title="Promoções">Promoções</a></li>
							<li><a href="#" title="">Programa de vantagens</a></li>
							<li><a href="#" title="">Programa de fidelidade</a></li>
							<li><a href="http://blog.nhamy.com.br/guia-de-presentes/" title="">Guia de presentes</a></li>
						</ul>
					</div><!-- /grid_6 -->
					<div class="grid_6">
						<h2>Precisa de Ajuda?</h2>
						<ul>
							<li><a href="http://www.nhamy.com.br/content/8-formas-de-pagamento" title="Formas de Pagamento">Formas de pagamento</a></li>
							<li><a href="http://www.nhamy.com.br/content/9-entrega-e-devolucao" title="Entrega e Devolução">Entrega e devolução</a></li>
							<li><a href="http://www.nhamy.com.br/content/10-perguntas-frequentes" title="">Perguntas frequentes</a></li>
							<li><a href="http://www.nhamy.com.br/contato" title="">Fale conosco</a></li>
							<li><a href="#" title="">Cuidados com o produto</a></li>
						</ul>
					</div><!-- /grid_3 -->
					<div class="grid_6">
						<h2>Atendimento</h2>
						<ul>
							<li class="mail"><a href="#" title="">sac@nhamy.com.br</a></li>
						
						</ul>

						<h2>Redes Sociais</h2>
						<ul>
							<li><a href="http://www.facebook.com/nhamy.com.br" title="" class="ico-social facebook" target="_blank">Curta no Facebook</a></li>
							<li><a href="http://www.twitter.com/siganhamy" title="Siga a Nhamy no facebook" class="ico-social twitter" target="_blank">Siga no twitter</a></li>
							<li><a href="http://www.pinterest.com/nhamy.com.br" title="" class="ico-social pinterest" target="_blank">Acompanhe no Pinterest</a></li>
						
						</ul>
					</div><!-- /grid_6 -->
				</div><!-- /container -->
							<div class="melt-white">
					<div class="bottom-footer">
						<div class="container container_24 ">
							<div class="grid_16">
								<img src="{$img_dir}selo-nhamy-segura.jpg" title="Selo Nhamy - Loja Segura" alt="Selo Nhamy - Loja Segura"/>
								<a href="http://www.ecommerceschool.com.br/Lojas-Certificadas/loja-virtual-nhamy" target="_blank"><img src="{$img_dir}selo-ecommerce.jpg" title="Selo Profissional E-commerce" alt="Selo Profissional E-commerce"/></a>

								<!--
TrustLogo Html Builder Code:
Shows the logo at URL http://nhamy.com.br/img/secure_site4.gif
Logo type is  ("SC5")
Not Floating
//-->
<script type="text/javascript">TrustLogo("http://nhamy.com.br/img/secure_site4.gif", "SC5", "none");</script>
								
								<h2>Formas de Pagamento</h2>
								<img class="bandeiras-pagamento" src="{$img_dir}img-formasdepagamento.jpg" title="Formas de pagamento" alt="discriminar bandeiras"/>

								<p>2012 Nhamy.com.br - Todos os direitos reservados - Brasil</p>
							</div><!-- /grid_16 -->
							<div class="grid_8">
								<h1>Facebook</h1>

								<div class="fb-like-box" data-href="https://www.facebook.com/nhamy.com.br" data-width="300" data-height="250" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>

							</div><!-- /grid_8 -->

						</div><!-- /container -->
					</div><!-- / bottom-footer -->
				</div><!-- /bottom-footer -->
			</div>
		</div><!--/page-->
	{/if}
	</body>
</html>
