
{capture name=path}<a href="https://nhamy.com.br/carrinho" title="Carrinho">Carrinho </a><span class="navigation-pipe">/</span> {l s='Pagamento através do PagSeguro' mod='fkpagseguro'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<div class="title_cats"><h1>Modo de Pagamento</h1></div>
{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $nbProducts <= 0}
    <p class="warning">{l s='Seu carrinho está vazio.' mod='fkpagseguro'}</p>
{else}

    
    
    <form action="{$link->getModuleLink('fkpagseguro', 'validation')}" method="post">
        
        <h3 style="margin-bottom: 30px;">{l s='Você selecionou pagamento através do PagSeguro' mod='fkpagseguro'}</h3>
        

        <p style="margin-bottom: 30px;"> <img src="{$this_path}img/logo_pagseguro_180x41.gif" alt="{l s='PagSeguro' mod='fkpagseguro'}" width="180" height="41" /></p>

        <div class="alert alert-success alert-block">
            
            <h4 style="font-family: 'GothamBook', sans-serif; font-size: 26px;">{l s='O valor total do seu pedido é de' mod='fkpagseguro'} <span style="color: #ed1f79; font-family: 'GothamBold', sans-serif;">{displayPrice price=$total}</span></h4>
            
        </div>

        

        

        <p style="font-size: 16px; margin: 30px 0;">
            {l s='Clique em <strong>"Eu confirmo meu pedido"</strong> para ser redirecionado ao ambiente seguro do PagSeguro, onde poderá escolher entre as várias formas de pagamentos disponíveis, a que melhor lhe atender.' mod='fkpagseguro'}
            
            
        </p>

        
        <h3>{l s='Por favor, confirme seu pedido clicando em "Eu confirmo meu pedido"' mod='fkpagseguro'}.</h3>

        <div class="form-actions">
            
            
            <input type="submit" name="submit" value="{l s='Eu confirmo meu pedido' mod='fkpagseguro'}" class="btn btn-success btn-large" />
            <a href="{$link->getPageLink('order', true, NULL, "step=3")}" class="btn btn-small">{l s='Outras formas de pagamentos' mod='fkpagseguro'}</a>
            
    </div>
        <p class="cart_navigation">
            
        </p>
    </form>
{/if}
