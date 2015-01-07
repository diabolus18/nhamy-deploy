<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 13:56:23
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/inf_fiscais_authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86143741753d923b7b0eac3-99791457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c4a9d47b188b97fc87bc9d802d63af61b6b1ce4' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkcustomers/includes/v160_0_7/inf_fiscais_authentication.tpl',
      1 => 1404840860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86143741753d923b7b0eac3-99791457',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d923b7c349c9_51543602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d923b7c349c9_51543602')) {function content_53d923b7c349c9_51543602($_smarty_tpl) {?><h3 class="page-subheading"><?php echo smartyTranslate(array('s'=>'Informações Fiscais','mod'=>'fkcustomers'),$_smarty_tpl);?>
</h3>

<div class="clearfix">
    <label><?php echo smartyTranslate(array('s'=>'Tipo Pessoa','mod'=>'fkcustomers'),$_smarty_tpl);?>
</label>
    <br>
    <div class="radio-inline">
        <label for="id_cpf">
            <input type="radio" name="tipo" id="id_cpf" value="pf" onclick="procRadio(this);" <?php if (!isset($_POST['tipo'])||isset($_POST['tipo'])&&$_POST['tipo']=='pf'){?> checked="checked"<?php }?>/>
            <?php echo smartyTranslate(array('s'=>'Física','mod'=>'fkcustomers'),$_smarty_tpl);?>

        </label>

    </div>
    <div class="radio-inline">
        <label for="id_cnpj">
            <input type="radio" name="tipo" id="id_cnpj" value="pj" onclick="procRadio(this);" <?php if (isset($_POST['tipo'])&&$_POST['tipo']=='pj'){?> checked="checked"<?php }?>/>
            <?php echo smartyTranslate(array('s'=>'Jurídica','mod'=>'fkcustomers'),$_smarty_tpl);?>

        </label>
    </div>

    <div class="required form-group" id="pf" <?php if (!isset($_POST['tipo'])||isset($_POST['tipo'])&&$_POST['tipo']=='pf'){?> style="display:block" <?php }else{ ?> style="display:none"<?php }?>>
        <label for="cpf"><?php echo smartyTranslate(array('s'=>'CPF','mod'=>'fkcustomers'),$_smarty_tpl);?>
 <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cpf" id="cpf" value="<?php if (isset($_POST['cpf'])){?><?php echo $_POST['cpf'];?>
<?php }?>" onBlur="validaCPF(this);"/>
        <span class="form_info" id="alertcpf" name="alertcpf"></span>
        <br>
        <label for="rg"><?php echo smartyTranslate(array('s'=>'RG','mod'=>'fkcustomers'),$_smarty_tpl);?>
 <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="rg" id="rg" value="<?php if (isset($_POST['rg'])){?><?php echo $_POST['rg'];?>
<?php }?>" onBlur="validaRG(this);"/>
    </div>
    <div class="required form-group" id="pj" <?php if (isset($_POST['tipo'])&&$_POST['tipo']=='pj'){?> style="display:block" <?php }else{ ?> style="display:none"<?php }?>>
        <label for="cnpj"><?php echo smartyTranslate(array('s'=>'CNPJ','mod'=>'fkcustomers'),$_smarty_tpl);?>
 <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="cnpj" id="cnpj" value="<?php if (isset($_POST['cnpj'])){?><?php echo $_POST['cnpj'];?>
<?php }?>" onBlur="validaCNPJ(this);"/>
        <span class="form_info" id="alertcnpj" name="alertcnpj"></span>
        <br>
        <label for="ie"><?php echo smartyTranslate(array('s'=>'IE','mod'=>'fkcustomers'),$_smarty_tpl);?>
 <sup>*</sup></label>
        <input type="text" class="is_required form-control" name="ie" id="ie" placeholder="digite Isento, se for o caso" value="<?php if (isset($_POST['ie'])){?><?php echo $_POST['ie'];?>
<?php }?>" onBlur="validaIE(this);"/>
    </div>

    
    <input type="hidden" class="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php if (isset($_POST['cpf_cnpj'])){?><?php echo $_POST['cpf_cnpj'];?>
<?php }?>"/>
    <input type="hidden" class="text" name="rg_ie" id="rg_ie" value="<?php if (isset($_POST['rg_ie'])){?><?php echo $_POST['rg_ie'];?>
<?php }?>"/>

</div>

<br>



<?php }} ?>