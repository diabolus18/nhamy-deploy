<input type="text" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{else}{if isset($address->postcode)}{$address->postcode}{/if}{/if}" onblur="processaCEP(this, false);"/>
<span class="form_info" name="alertpostcode" id="alertpostcode"</span>
<br>
