{if $field_name eq "compl"}
<p class="text">
    <label for="compl">{l s='Complemento'}</label>
    <input type="text" class="form-control" name="compl" id="compl" value="{if isset($smarty.post.compl)}{$smarty.post.compl}{else}{if isset($address->compl)}{$address->compl|escape:'html':'UTF-8'}{/if}{/if}"/>
</p>
{/if}
