
{capture name=path}
    {l s='Pagamento através do PagSeguro.' mod='fkpagseguro'}
{/capture}

<h1 class="page-heading">
    {l s='Resumo do pedido' mod='fkpagseguro'}
</h1>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $nbProducts <= 0}
    <p class="alert alert-warning">
        {l s='Seu carrinho está vazio.' mod='fkpagseguro'}
    </p>
{else}
    <form action="{$link->getModuleLink('fkpagseguro', 'validation', [], true)|escape:'html':'UTF-8'}" method="post">
        <div class="box cheque-box">
            <h3 class="page-subheading">
                {l s='Pagamento através do PagSeguro.' mod='fkpagseguro'}
            </h3>
            <p>
                <strong class="dark">
                    {l s='Você selecionou pagamento através do PagSeguro.' mod='fkpagseguro'}
                </strong>
            </p>
            <p>
                {l s='O valor total do seu pedido é de' mod='fkpagseguro'}
                <span id="amount" class="price">{displayPrice price=$total}</span>
            </p>
            <br>
            <p>
                <img style="margin: 0px 10px 5px 0px;" src="{$this_path}img/pagamentos.jpg" alt="{l s='PagSeguro' mod='fkpagseguro'}" width="500" height="91"/>
            </p>
            <br>
            <p>
                {l s='Após clicar "Eu confirmo meu pedido" você será redirecionado ao ambiente seguro do PagSeguro, onde poderá escolher entre as várias formas de pagamentos disponíveis, a que melhor lhe atender.' mod='fkpagseguro'}
                <br><br>
                <b>{l s='Por favor, confirme seu pedido clicando em "Eu confirmo meu pedido"' mod='fkpagseguro'}.</b>
            </p>
            <p class="cart_navigation clearfix" id="cart_navigation" style="margin-top: 30px;">
                <a class="button-exclusive btn btn-default" href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'html':'UTF-8'}">
                    <i class="icon-chevron-left"></i>{l s='Outras formas de pagamento' mod='fkpagseguro'}
                </a>
                <button class="button btn btn-default button-medium" type="submit">
                    <span>{l s='Eu confirmo meu pedido' mod='fkpagseguro'}<i class="icon-chevron-right right"></i></span>
                </button>
            </p>
        </div>

    </form>
{/if}
