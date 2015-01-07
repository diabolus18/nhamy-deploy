
<p id="fkpagseguro_msg">{$msg_1}</p>

{if $pedido > 0}
    <div id="fkpagseguro_pedido">
        <br><br>
        <p>
            <strong>{l s='Dados do seu pedido:' mod='fkpagseguro'}</strong>
        </p>
        <p style="margin-left: 5px;">
            {l s='Número do pedido:' mod='fkpagseguro'} {$pedido}
            <br>
            {l s='Referência:' mod='fkpagseguro'} {$referencia}
            <br>
            {l s='Valor total:' mod='fkpagseguro'} {$valor}
        </p>
    </div>
{/if}