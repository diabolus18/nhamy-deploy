{if $field_name eq "numend"}
<div class="required form-group">
    <label for="numend">{l s='Número'} <sup>*</sup></label>
    <input type="text" class="form-control" name="numend" id="numend" value="{if isset($smarty.post.numend)}{$smarty.post.numend}{else}{if isset($address->numend)}{$address->numend}{/if}{/if}"/>
</div>
{/if}
