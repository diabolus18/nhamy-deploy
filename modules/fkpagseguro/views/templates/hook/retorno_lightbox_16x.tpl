
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script type="text/javascript">

    PagSeguroLightbox({
        code: '{$cod_pagto}'
        }, {
        success : function(transactionCode) {
            $("#fkpagseguro_msg").html("{$msg_1}");
            $("#fkpagseguro_pedido").css("display", "block");
        },
        abort : function() {
            $("#fkpagseguro_msg").html("{$msg_2}");
            $("#fkpagseguro_pedido").css("display", "block");
        }
    });

</script>

<div class="box">
    <p id="fkpagseguro_msg">{l s='Transação de pagamento em execução.' mod='fkpagseguro'}</p>

    <div id="fkpagseguro_pedido" style="display: none">
        <br><br>
        <p>
            <strong class="dark">{l s='Dados do seu pedido:' mod='fkpagseguro'}</strong>
        </p>
        <p style="margin-left: 5px;">
            {l s='Número do pedido:' mod='fkpagseguro'} {$pedido}
            <br>
            {l s='Referência:' mod='fkpagseguro'} {$referencia}
            <br>
            {l s='Valor total:' mod='fkpagseguro'} {$valor}
        </p>
    </div>
</div>

