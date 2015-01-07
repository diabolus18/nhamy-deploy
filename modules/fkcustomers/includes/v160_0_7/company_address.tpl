<div class="form-group" {if $TipoPessoa == 'pf'} style="display: none" {else} style="display: block"{/if}>
    <label for="company">{l s='Razão social'}</label>
    <input class="form-control validate" data-validate="{$address_validation.$field_name.validate}" type="text" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{else}{if isset($address->company)}{$address->company|escape:'html':'UTF-8'}{/if}{/if}" />
</div>
