<br>
<h1 class="page-subheading">{l s='Informações Fiscais' mod='fkcustomers'}</h1>

<div class="clearfix">

    {**** Campos hidden ***}
    <input type="hidden" class="text" name="cpf_cnpj" id="cpf_cnpj" value="{$smarty.post.cpf_cnpj}"/>
    <input type="hidden" class="text" name="rg_ie" id="rg_ie" value="{$smarty.post.rg_ie}"/>

    <label>{l s='Tipo Pessoa' mod='fkcustomers'}</label>
    <br>
    <div class="radio-inline">
        <label for="id_cpf">
            <input type="radio" name="tipo" id="id_cpf" value="pf" onclick="procRadio(this);" {if !isset($smarty.post.tipo) or isset($smarty.post.tipo) and $smarty.post.tipo == 'pf'} checked="checked"{/if}/>
            {l s='Física' mod='fkcustomers'}
        </label>

    </div>
    <div class="radio-inline">
        <label for="id_cnpj">
            <input type="radio" name="tipo" id="id_cnpj" value="pj" onclick="procRadio(this);" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} checked="checked"{/if}/>
            {l s='Jurídica' mod='fkcustomers'}
        </label>
    </div>

    <div class="required form-group" id="pf" {if !isset($smarty.post.tipo) or isset($smarty.post.tipo) and $smarty.post.tipo == 'pf'} style="display:block" {else} style="display:none"{/if}>
        <label for="cpf">{l s='CPF' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cpf" id="cpf" value="{$smarty.post.cpf_cnpj}" onBlur="validaCPF(this);"/>
        <span class="form_info" id="alertcpf" name="alertcpf"></span>
        <br>
        <label for="rg">{l s='RG' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="rg" id="rg" value="{$smarty.post.rg_ie}" onBlur="validaRG(this);"/>
    </div>
    <div class="required form-group" id="pj" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} style="display:block" {else} style="display:none"{/if}>
        <label for="cnpj">{l s='CNPJ' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cnpj" id="cnpj" value="{$smarty.post.cpf_cnpj}" onBlur="validaCNPJ(this);"/>
        <span class="form_info" id="alertcnpj" name="alertcnpj"></span>
        <br>
        <label for="ie">{l s='IE' mod='fkcustomers'} <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="ie" id="ie" placeholder="digite Isento, se for o caso" value="{$smarty.post.rg_ie}" onBlur="validaIE(this);"/>
    </div>

</div>

<br>
<h1 class="page-subheading">{l s='Informações pessoais' mod='fkcustomers'}</h1>




