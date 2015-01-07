<div class="form-group" id="fkcustomers_company" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} style="display: block" {else} style="display: none"{/if}>
    <label for="company">{l s='Razão social'}</label>
    <input type="text" class="form-control" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
</div>