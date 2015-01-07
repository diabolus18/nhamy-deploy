<p class="text" {if $TipoPessoa == 'pf'} style="display: none" {else} style="display: block"{/if}>
    <input type="hidden" name="token" value="{$token}" />
    <label for="company">{l s='Razão social'}</label>
    <input type="text" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{else}{if isset($address->company)}{$address->company}{/if}{/if}" />
</p>
