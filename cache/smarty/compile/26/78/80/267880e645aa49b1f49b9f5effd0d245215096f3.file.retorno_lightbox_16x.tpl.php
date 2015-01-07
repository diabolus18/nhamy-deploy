<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 15:17:46
         compiled from "/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/hook/retorno_lightbox_16x.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123934205253d936ca9c1042-84546363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '267880e645aa49b1f49b9f5effd0d245215096f3' => 
    array (
      0 => '/home/justc739/public_html/nhamy.com.br/dev/modules/fkpagseguro/views/templates/hook/retorno_lightbox_16x.tpl',
      1 => 1402339386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123934205253d936ca9c1042-84546363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cod_pagto' => 0,
    'msg_1' => 0,
    'msg_2' => 0,
    'pedido' => 0,
    'referencia' => 0,
    'valor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d936ca9e8ca3_62690562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d936ca9e8ca3_62690562')) {function content_53d936ca9e8ca3_62690562($_smarty_tpl) {?>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script type="text/javascript">

    PagSeguroLightbox({
        code: '<?php echo $_smarty_tpl->tpl_vars['cod_pagto']->value;?>
'
        }, {
        success : function(transactionCode) {
            $("#fkpagseguro_msg").html("<?php echo $_smarty_tpl->tpl_vars['msg_1']->value;?>
");
            $("#fkpagseguro_pedido").css("display", "block");
        },
        abort : function() {
            $("#fkpagseguro_msg").html("<?php echo $_smarty_tpl->tpl_vars['msg_2']->value;?>
");
            $("#fkpagseguro_pedido").css("display", "block");
        }
    });

</script>

<div class="box">
    <p id="fkpagseguro_msg"><?php echo smartyTranslate(array('s'=>'Transação de pagamento em execução.','mod'=>'fkpagseguro'),$_smarty_tpl);?>
</p>

    <div id="fkpagseguro_pedido" style="display: none">
        <br><br>
        <p>
            <strong class="dark"><?php echo smartyTranslate(array('s'=>'Dados do seu pedido:','mod'=>'fkpagseguro'),$_smarty_tpl);?>
</strong>
        </p>
        <p style="margin-left: 5px;">
            <?php echo smartyTranslate(array('s'=>'Número do pedido:','mod'=>'fkpagseguro'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['pedido']->value;?>

            <br>
            <?php echo smartyTranslate(array('s'=>'Referência:','mod'=>'fkpagseguro'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['referencia']->value;?>

            <br>
            <?php echo smartyTranslate(array('s'=>'Valor total:','mod'=>'fkpagseguro'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['valor']->value;?>

        </p>
    </div>
</div>

<?php }} ?>