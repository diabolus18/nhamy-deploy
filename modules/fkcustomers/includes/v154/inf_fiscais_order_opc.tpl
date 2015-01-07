<h3>{l s='Informações Fiscais' mod='fkcustomers'}</h3>

<p class="radio required">
    <span>{l s='Tipo Pessoa' mod='fkcustomers'}</span>
    <label for="id_cpf">
        <input type="radio" name="tipo" id="id_cpf" value="pf" onclick="procRadio(this);" {if !isset($smarty.post.tipo) or isset($smarty.post.tipo) and $smarty.post.tipo == 'pf'} checked="checked"{/if}/>
        {l s='Física' mod='fkcustomers'}
    </label>
    <label for="id_cnpj">
        <input type="radio" name="tipo" id="id_cnpj" value="pj" onclick="procRadio(this);" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} checked="checked"{/if}/>
        {l s='Jurídica' mod='fkcustomers'}
    </label>

</p>

<div id="pf" {if !isset($smarty.post.tipo) or isset($smarty.post.tipo) and $smarty.post.tipo == 'pf'} style="display:block" {else} style="display:none"{/if}>
    <p class="required text">
        <label for="cpf">{l s='CPF' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cpf" id="cpf" value="{if isset($smarty.post.cpf)}{$smarty.post.cpf}{/if}" onBlur="validaCPF(this);"/>
        <span class="form_info" id="alertcpf" name="alertcpf"></span>
    </p>
    <p class="required text">
        <label for="rg">{l s='RG' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="rg" id="rg" value="{if isset($smarty.post.rg)}{$smarty.post.rg}{/if}" onBlur="validaRG(this);"/>
    </p>
</div>

<div id="pj" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} style="display:block" {else} style="display:none"{/if}>
    <p class="required text">
        <label for="cnpj">{l s='CNPJ' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cnpj" id="cnpj" value="{if isset($smarty.post.cnpj)}{$smarty.post.cnpj}{/if}" onBlur="validaCNPJ(this);"/>
        <span class="form_info" id="alertcnpj" name="alertcnpj"></span>
    </p>
    <p class="required text">
        <label for="ie">{l s='IE' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="ie" id="ie" placeholder="digite Isento, se for o caso" value="{if isset($smarty.post.ie)}{$smarty.post.ie}{/if}" onBlur="validaIE(this);"/>
    </p>
</div>

{**** Campos hidden ***}
<input type="hidden" class="text" name="cpf_cnpj" id="cpf_cnpj" value="{if isset($smarty.post.cpf_cnpj)}{$smarty.post.cpf_cnpj}{/if}"/>
<input type="hidden" class="text" name="rg_ie" id="rg_ie" value="{if isset($smarty.post.rg_ie)}{$smarty.post.rg_ie}{/if}"/>

<br>

<h3>{l s='Informações Pessoais' mod='fkcustomers'}</h3>



