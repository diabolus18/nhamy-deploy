
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script type="text/javascript">

    PagSeguroLightbox({
        code: '{$cod_pagto}'
        }, {
        success : function(transactionCode) {
            $("#fkpagseguro_msg").html("{$msg_1}").addClass('alert-success');
            $("#fkpagseguro_pedido").css("display", "block");
            
        },
        abort : function() {
            $("#fkpagseguro_msg").html("{$msg_2}").addClass('alert-danger');
            $("#fkpagseguro_pedido").css("display", "block");
        }
    });

</script>

<p class="alert" id="fkpagseguro_msg">{l s='Transação de pagamento em execução.' mod='fkpagseguro'}</p>

<div id="fkpagseguro_pedido" style="display: none">
    
    <h3>
        {l s='Dados do seu pedido:' mod='fkpagseguro'}
    </h3>
    
    <table class="table table-striped">
        <thead>
            <th>{l s='Número do pedido:' mod='fkpagseguro'}</th>
            <th>{l s='Referência:' mod='fkpagseguro'}</th>
            <th>{l s='Valor total:' mod='fkpagseguro'}</th>
        </thead>
        <tbody>
            <td>{$pedido}</td>
            <td>{$referencia}</td>
            <td>{$valor}</td>
        </tbody>
    </table>
    
</div>


<!-- Google Code for Compra Finalizada Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 968042189;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "OxbhCOPXpgwQzc3MzQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/968042189/?label=OxbhCOPXpgwQzc3MzQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>