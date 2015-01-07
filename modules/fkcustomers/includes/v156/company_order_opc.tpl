<p class="text" {if $TipoPessoa == 'pf'} style="display: none" {else} style="display: block"{/if}>
    <label for="company">{l s='Razão social'}</label>
    <input type="text" id="company" name="company" data-validate="isName" value="{if isset($guestInformations) && $guestInformations.company}{$guestInformations.company}{/if}" />
</p>
