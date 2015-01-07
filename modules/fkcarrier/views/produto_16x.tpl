
<div class="fkcarrier_calculo_cep">

    <div class="opc-main-block">
        <div class="order_carrier_content box">
            <div class="delivery_options_address">
                <h3>
                    {l s='Informe o CEP para cálculo do frete do produto' mod='fkcarrier'}
                </h3>
                <div id="fkcarrier_cep_msg">
                    {$fkcarrier_cep_msg['msg']}
                </div>

                <div class="delivery_options">
                    <div id="fkcarrier_cep_form">
                        <form action="#" method="post">
                            <input type="text" class="fkcarrier_text_cep" size="10" name="fkcarrier_cep_prod" value="{$fkcarrier_cep}"/>
                            <input type="submit" class="btn btn-default button button-medium" value="{l s='Calcular frete' mod='fkcarrier'}" name="submitProd"/>
                        </form>
                    </div>

                    {if isset($fkcarrier_cep_frete)}
                        <table>
                            {foreach $fkcarrier_cep_frete as $key => $opcoes}
                                {foreach $opcoes as $frete}
                                    <tr>
                                        <td id="fkcarrier_cep_img">
                                            <img src="{$frete['url_imagem']}" alt="{$frete['nome_carrier']}"/>
                                        </td>
                                        <td id="fkcarrier_cep_nome">
                                            <b>{$frete['nome_carrier']}</b>
                                            <br>
                                            {l s='Prazo de entrega:' mod='fkcarrier'} {$frete['prazo_entrega']}
                                        </td>
                                        <td id="fkcarrier_cep_valor">
                                            {convertPrice price=$frete['valor_frete']}
                                        </td>
                                    </tr>
                                {/foreach}
                            {/foreach}
                        </table>
                    {/if}
                </div>
            </div>
        </div>
    </div>

</div>