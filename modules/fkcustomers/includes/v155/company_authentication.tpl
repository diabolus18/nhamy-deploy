<p class="text" id="fkcustomers_company" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} style="display: block" {else} style="display: none"{/if}>
    <label for="company">{l s='Razão social'}</label>
    <input type="text" class="text" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
</p>