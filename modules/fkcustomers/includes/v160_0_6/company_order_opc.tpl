<div class="text form-group" {if $TipoPessoa == 'pf'} style="display: none" {else} style="display: block"{/if}>
    <label for="company">{l s='Razão social'}</label>
    <input type="text" class="text form-control validate" id="company" name="company" data-validate="isName" value="{if isset($guestInformations) && isset($guestInformations.company) && $guestInformations.company}{$guestInformations.company}{/if}" />
</div>
