{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{*
************************************************************************************************
* Inicio das definicoes javascript
************************************************************************************************
*}
<script type="text/javascript" src="{$path_fkcustomers}js/maskedinput.js"></script>
<script type="text/javascript" src="{$path_fkcustomers}js/funcoes.js"></script>

<script type="text/javascript">
    var urlFuncoes = '{$path_fkcustomers}Funcoes.php';
    var wsCep = '{$WebService}';
    var usuarioBY = '{$UsuarioBY}';
    var senhaBY = '{$SenhaBY}';
    var codigoAC = '{$CodigoAC}';
    var chaveAC = '{$ChaveAC}';
    var email = '{$Email}';
    var erro;
</script>
{*
************************************************************************************************
* Final das definicoes javascript
************************************************************************************************
*}

{capture name=path}<a href="{$link->getPageLink('my-account', true)}">{l s='My account'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Your personal information'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<h1>{l s='Your personal information'}</h1>

{include file="$tpl_dir./errors.tpl"}

{if isset($confirmation) && $confirmation}
	<p class="success">
		{l s='Your personal information has been successfully updated.'}
		{if isset($pwd_changed)}<br />{l s='Your password has been sent to your email:'} {$email}{/if}
	</p>
{else}
	<h3>{l s='Please be sure to update your personal information if it has changed.'}</h3>
	<p class="required"><sup>*</sup>{l s='Required field'}</p>
	<form action="{$link->getPageLink('identity', true)}" method="post" class="std">
		<fieldset>
		    {*
            ************************************************************************************************
            * Inicio dos campos hiden cpf_cnpj e rg_ie que serao gravados no banco de dados
            ************************************************************************************************
            *}
            <div style="display:none">
                <p class="required text">
                    <input type="text" class="text" name="cpf_cnpj" id="cpf_cnpj" value="{$smarty.post.cpf_cnpj|escape:'htmlall':'UTF-8'}"/>
                </p>
                <p class="text">
                    <input type="text" class="text" name="rg_ie" id="rg_ie" value="{$smarty.post.rg_ie|escape:'htmlall':'UTF-8'}"/>
                </p>
            </div>
            {*
            ************************************************************************************************
            * Final dos campos hiden cpf_cnpj e rg_ie que serao gravados no banco de dados
            ************************************************************************************************
            *}
            {*
            ************************************************************************************************
            * Inicio dos campos radio PF/PJ
            ************************************************************************************************
            *}
            <p class="radio">
                <span>{l s='Tipo de Pessoa'}</span>
                <input type="radio" name="tipo" id="id_cpf" value="pf" onclick="procRadio(this);" {if isset($smarty.post.tipo) && $smarty.post.tipo == 'pf'} checked="checked"{/if}/>
                <label for="id_cpf" align="left">{l s='Física'}</label>
                <input type="radio" name="tipo" id="id_cnpj" value="pj" onclick="procRadio(this);" {if isset($smarty.post.tipo) && $smarty.post.tipo == 'pj'} checked="checked"{/if}/>
                <label for="id_cnpj">{l s='Jurídica'}</label>
            </p>
            {*
            ************************************************************************************************
            * Final dos campos radio PF/PJ
            ************************************************************************************************
            *}
            {*
            ************************************************************************************************
            * Inicio dos campos cpf/rg e cnpj/ie
            ************************************************************************************************
            *}
            <div id="pf" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pf'} style="display:block" {else} style="display:none"{/if}>
                <p class="required text">
                    <label for="cpf">{l s='CPF'} <sup>*</sup></label>
                    <input type="text" class="text" name="cpf" id="cpf" value="{$smarty.post.cpf_cnpj|escape:'htmlall':'UTF-8'}" onBlur="validaCPF(this);"/>
                    <span class="form_info" id="alertcpf" name="alertcpf"></span>
                </p>
                <p class="required text">
                    <label for="rg">{l s='RG'} <sup>*</sup></label></label>
                    <input type="text" class="text" name="rg" id="rg" value="{$smarty.post.rg_ie|escape:'htmlall':'UTF-8'}" onBlur="validaRG(this);"/>
                </p>
            </div>

            <div id="pj" {if isset($smarty.post.tipo) and $smarty.post.tipo == 'pj'} style="display:block" {else} style="display:none"{/if}>
                <p class="required text">
                    <label for="cnpj">{l s='CNPJ'} <sup>*</sup></label>
                    <input type="text" class="text" name="cnpj" id="cnpj" value="{$smarty.post.cpf_cnpj|escape:'htmlall':'UTF-8'}" onBlur="validaCNPJ(this);"/>
                    <span class="form_info" id="alertcnpj" name="alertcnpj"></span>
                </p>
                <p class="text">
                    <label for="ie">{l s='IE'} <sup>*</sup></label></label>
                    <input type="text" class="text" name="ie" id="ie" placeholder="digite Isento, se for o caso" value="{$smarty.post.rg_ie|escape:'htmlall':'UTF-8'}" onBlur="validaIE(this);"/>
                </p>
            </div>
            <br><br>
            {*
            ************************************************************************************************
            * Final dos campos cpf/rg e cnpj/ie
            ************************************************************************************************
            *}
			<p class="radio">
				<span>{l s='Title'}</span>
				{foreach from=$genders key=k item=gender}
					<input type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />
					<label for="id_gender{$gender->id}" class="top">{$gender->name}</label>
				{/foreach}
			</p>
			<p class="required text">
				<label for="firstname">{l s='First name'} <sup>*</sup></label>
				<input type="text" id="firstname" name="firstname" value="{$smarty.post.firstname}" />
			</p>
			<p class="required text">
				<label for="lastname">{l s='Last name'} <sup>*</sup></label>
				<input type="text" name="lastname" id="lastname" value="{$smarty.post.lastname}" />
			</p>
			<p class="required text">
				<label for="email">{l s='Email'} <sup>*</sup></label>
				<input type="text" name="email" id="email" value="{$smarty.post.email}" />
			</p>
			<p class="required text">
				<label for="old_passwd">{l s='Current Password'} <sup>*</sup></label>
				<input type="password" name="old_passwd" id="old_passwd" />
			</p>
			<p class="password">
				<label for="passwd">{l s='New Password'}</label>
				<input type="password" name="passwd" id="passwd" />
			</p>
			<p class="password">
				<label for="confirmation">{l s='Confirmation'}</label>
				<input type="password" name="confirmation" id="confirmation" />
			</p>
			<p class="select">
				<label>{l s='Date of Birth'}</label>
				<select name="days" id="days">
					<option value="">-</option>
					{foreach from=$days item=v}
						<option value="{$v}" {if ($sl_day == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
					{/foreach}
				</select>
				{*
					{l s='January'}
					{l s='February'}
					{l s='March'}
					{l s='April'}
					{l s='May'}
					{l s='June'}
					{l s='July'}
					{l s='August'}
					{l s='September'}
					{l s='October'}
					{l s='November'}
					{l s='December'}
				*}
				<select id="months" name="months">
					<option value="">-</option>
					{foreach from=$months key=k item=v}
						<option value="{$k}" {if ($sl_month == $k)}selected="selected"{/if}>{l s=$v}&nbsp;</option>
					{/foreach}
				</select>
				<select id="years" name="years">
					<option value="">-</option>
					{foreach from=$years item=v}
						<option value="{$v}" {if ($sl_year == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
					{/foreach}
				</select>
			</p>
			{if $newsletter}
			<p class="checkbox">
				<input type="checkbox" id="newsletter" name="newsletter" value="1" {if isset($smarty.post.newsletter) && $smarty.post.newsletter == 1} checked="checked"{/if} />
				<label for="newsletter">{l s='Sign up for our newsletter!'}</label>
			</p>
			<p class="checkbox">
				<input type="checkbox" name="optin" id="optin" value="1" {if isset($smarty.post.optin) && $smarty.post.optin == 1} checked="checked"{/if} />
				<label for="optin">{l s='Receive special offers from our partners!'}</label>
			</p>
			{/if}
			<p class="submit">
				<input type="submit" class="button" name="submitIdentity" value="{l s='Save'}" />
			</p>
			<p id="security_informations">
				{l s='[Insert customer data privacy clause here, if applicable]'}
			</p>
		</fieldset>
	</form>
{/if}

<ul class="footer_links">
	<li><a href="{$link->getPageLink('my-account', true)}"><img src="{$img_dir}icon/my-account.gif" alt="" class="icon" /></a><a href="{$link->getPageLink('my-account', true)}">{l s='Back to your account'}</a></li>
	<li class="f_right"><a href="{$base_dir}"><img src="{$img_dir}icon/home.gif" alt="" class="icon" /> {l s='Home'}</a></li>
</ul>
