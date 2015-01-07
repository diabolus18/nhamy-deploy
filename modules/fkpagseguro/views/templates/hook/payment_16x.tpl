
<div class="row">
    <div class="col-xs-12 col-md-6">
        <p class="payment_module">
            <a class="fkpagseg" href="{$link->getModuleLink('fkpagseguro', 'payment', [], true)|escape:'html':'UTF-8'}" title="{l s='Pagamento através do PagSeguro.' mod='fkpagseguro'}">
                {l s='Pagamento através do PagSeguro' mod='fkpagseguro'} <span>{l s='(várias formas de pagamentos disponíveis)' mod='fkpagseguro'}</span>
            </a>
            {if $link_parc != ''}
                <br>
                <input style="float: right" class="btn btn-default button button-medium" type="button" value="{l s='Parcelamentos PagSeguro' mod='fkpagseguro'}" onClick="window.open('{$link_parc}','janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500,left=600,top=100')">
            {/if}
        </p>
    </div>
</div>
