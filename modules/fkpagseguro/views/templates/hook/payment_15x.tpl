
<p class="payment_module">
	<a href="{$link->getModuleLink('fkpagseguro', 'payment')}" title="{l s='Pagamento através do PagSeguro' mod='fkpagseguro'}">
		<img src="{$this_path}img/pagseguro.jpg" alt="{l s='Pagamento através do PagSeguro' mod='fkpagseguro'}" width="150" height="42"/>
		{l s='Pagamento através do PagSeguro (várias formas de pagamentos disponíveis)' mod='fkpagseguro'}
	</a>
    {if $link_parc != ''}
        <br>
        <input style="float: right" class="button" type="button" value="{l s='Opções de parcelamento' mod='fkpagseguro'}" onClick="window.open('{$link_parc}','janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500,left=600,top=100')">
    {/if}
</p>