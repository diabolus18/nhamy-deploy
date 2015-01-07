<input class="form-control" type="hidden" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{else}{if isset($address->postcode)}{$address->postcode}{/if}{/if}"/>
<input class="form-control" type="text" name="postcode_fk" id="postcode_fk" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{else}{if isset($address->postcode)}{$address->postcode}{/if}{/if}" onblur="processaCEP(this, true);"/>
<span class="form_info" name="alertpostcode" id="alertpostcode"</span>
<br>
