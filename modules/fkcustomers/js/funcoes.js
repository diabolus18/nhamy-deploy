
jQuery(function($) {
    $("#cnpj").mask('99.999.999/9999-99');
    $("#cpf").mask('999.999.999-99');
    $("#postcode").mask('99999-999');
    $("#phone").mask('(99) 9999-9999');
    
    $('#phone_mobile').focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');
});

function soNumeros(str){  
    var i;
    var tmp="";

    for (i=0; i < str.length; i++){  

        if (str.substr(i,1) >= "0" && str.substr(i,1) <= "9") {
            tmp = tmp + str.substr(i,1);
        }
    }

    return tmp;      
} 

function procRadio(id) {
    if (id.value == "pf") {
        $("#pf").css("display", "block");
        $("#pj").css("display", "none");
        $("#alertcnpj").html("");
        $("#cnpj").val('');
    }
    if (id.value == "pj") {
        $("#pf").css("display", "none");
        $("#pj").css("display", "block");
        $("#alertcpf").html("");
        $("#cpf").val('');
    }
}

function validaCPF(objcpf) {

    var cpf = objcpf.value;
    var soma;
    var resto;
    var i;

    $("#cpf_cnpj").val("");
    cpf = soNumeros(cpf); 

    if (cpf == "") {
        return false;
    }

    if ((cpf.length != 11) || (cpf == "00000000000") || (cpf == "11111111111") 
        || (cpf == "22222222222") || (cpf == "33333333333") 
        || (cpf == "44444444444") || (cpf == "55555555555") 
        || (cpf == "66666666666") || (cpf == "77777777777") 
        || (cpf == "88888888888") || (cpf == "99999999999")) {
        msgCPF("0");
        $("#cpf").fokus();
        return false;
    }

    soma = 0;

    for ( i = 1; i <= 9; i++) {
        soma += Math.floor(cpf.charAt(i - 1)) * (11 - i);
    }

    resto = 11 - (soma - (Math.floor(soma / 11) * 11));

    if ((resto == 10) || (resto == 11)) {
        resto = 0;
    }

    if (resto != Math.floor(cpf.charAt(9))) {
        msgCPF("0");
        $("#cpf").fokus();
        return false;
    }

    soma = 0;

    for ( i = 1; i <= 10; i++) {
        soma += cpf.charAt(i - 1) * (12 - i);
    }

    resto = 11 - (soma - (Math.floor(soma / 11) * 11));

    if ((resto == 10) || (resto == 11)) {
        resto = 0;
    }

    if (resto != Math.floor(cpf.charAt(10))) {
        msgCPF("0");
        $("#cpf").fokus();
        return false;
    }

    $.post(urlFuncoes, {func: '5', cpf_cnpj: cpf, email: email}, function(retorno) {
    	
        if (retorno == 1) {
            msgCPF("1");
            $("#cpf").fokus();
            return false;
        }else{
            msgCPF("ok");

            $("#cpf_cnpj").val(objcpf.value);
            return true;
        }

    });

}

function validaCNPJ(objcnpj) {

    var cnpj = objcnpj.value;
    var i = 0;
    var strMul = "6543298765432";
    var iLenMul = 0;
    var iSoma = 0;
    var strNum_base = 0;
    var iLenNum_base = 0;

    $("#cpf_cnpj").val("");
    cnpj = soNumeros(cnpj);

    if (cnpj == "") {
        return false;
    }

    if (cnpj.length != 14) {
        msgCNPJ("0");
        $("#cnpj").fokus();
        return false;
    }

    strNum_base = cnpj.substring(0, 12);
    iLenNum_base = strNum_base.length - 1;
    iLenMul = strMul.length - 1;

    for ( i = 0; i < 12; i++)
        iSoma = iSoma + parseInt(strNum_base.substring((iLenNum_base - i), (iLenNum_base - i) + 1), 10) * parseInt(strMul.substring((iLenMul - i), (iLenMul - i) + 1), 10);

    iSoma = 11 - (iSoma - Math.floor(iSoma / 11) * 11);

    if (iSoma == 11 || iSoma == 10)
        iSoma = 0;

    strNum_base = strNum_base + iSoma;
    iSoma = 0;
    iLenNum_base = strNum_base.length - 1;

    for ( i = 0; i < 13; i++)
        iSoma = iSoma + parseInt(strNum_base.substring((iLenNum_base - i), (iLenNum_base - i) + 1), 10) * parseInt(strMul.substring((iLenMul - i), (iLenMul - i) + 1), 10);

    iSoma = 11 - (iSoma - Math.floor(iSoma / 11) * 11);

    if (iSoma == 11 || iSoma == 10)
        iSoma = 0;

    strNum_base = strNum_base + iSoma;

    if (cnpj != strNum_base) {
        msgCNPJ("0");
        $("#cnpj").fokus();
        return false;
    }

    $.post(urlFuncoes, {func: '5', cpf_cnpj: cnpj, email: email}, function(retorno) {

        if (retorno == 1) {
            msgCNPJ("1");
            $("#cnpj").fokus();
            return false;
        }else{
            msgCNPJ("ok");
            $("#cpf_cnpj").val(objcnpj.value);
            return true;
        }

    });

}

function validaRG(objrg) {

    var rg = "";
    rg = soNumeros(objrg.value);

    if (rg == "") {
        $("#rg_ie").val("");
    }else {
        $("#rg_ie").val(objrg.value);
    }
}

function validaIE(objie) {

    var ie = "";
    ie = soNumeros(objie.value);

    if (ie == "") {
        $("#rg_ie").val("Isento");
    }else {
        $("#rg_ie").val(objie.value);
    }
}

function msgCPF(str) {

    switch (str) {

        case "0":
            $("#alertcpf").css("color", "red");
            $("#alertcpf").html("CPF inválido");
            $("#cpf").focus();
            break;

        case "1":
            $("#alertcpf").css("color", "red");
            $("#alertcpf").html("CPF já cadastrado");
            $("#cpf").focus();
            break;

        default:
            $("#alertcpf").css("color", "green");
            $("#alertcpf").html("CPF válido. Obrigado!");
            break;

    }
} 

function msgCNPJ(str) {

    switch (str) {

        case "0":
            $("#alertcnpj").css("color", "red");
            $("#alertcnpj").html("CNPJ inválido");
            $("#cnpj").focus();
            break;

        case "1":
            $("#alertcnpj").css("color", "red");
            $("#alertcnpj").html("CNPJ já cadastrado");
            $("#cnpj").focus();
            break;

        default:
            $("#alertcnpj").css("color", "green");
            $("#alertcnpj").html("CNPJ válido. Obrigado!");
            break;

    }  
}  

function processaCEP(objcep){

    if (wsCep == "IN") {
        return true;
    }

    var cep = objcep.value;
    cep = soNumeros(cep); 

    if (cep == "") {
        return false;
    }

    if (cep.length != 8) {
        msgCEP("0");
        return false;
    }

    switch (wsCep) {

        case "RV":
            procRV(cep);
            break;

        case "BY":
            procBY(cep);
            break;

        case "AC":
            procAC(cep);
            break;
    }

    return true;
}	

function procRV(cep) {

    msgCEP("1");
    
    $.post(urlFuncoes, {func: "1", cep: cep}, function(retorno) {
    	
    	if (retorno.length > 1) {

            var arRet = retorno.split(',');
            
            if (arRet[0] == '0') {
                msgCEP("2");
            }else {
                msgCEP("3");
                
                $("#address1").val($.trim(unescape(arRet[5])) + " " + $.trim(unescape(arRet[6])));
                $("#address2").val($.trim(unescape(arRet[4])));
                $("#city").val($.trim(unescape(arRet[3])));
                procUF($.trim(unescape(arRet[2])));
            }
        } else {
            msgCEP("2");
        }
    });
    
} 	

function procBY(cep) {

    msgCEP("1");

    $.post(urlFuncoes, {func: "2", cep: cep, usuario: usuarioBY, senha: senhaBY}, function(retorno) {

        if (retorno.length > 1) {

            var arRet = retorno.split('|');

            if (arRet[0] != "OK") {
                msgCEP("2");
            }else {
                var arRet_1 = arRet[1].split(',');

                if ($.isEmptyObject(arRet_1[1])) {
                    msgCEP("2");
                }else {
                    msgCEP("3");
                    $("#address1").val($.trim(unescape(arRet_1[0])));
                    $("#address2").val($.trim(unescape(arRet_1[1])));
                    $("#city").val($.trim(unescape(arRet_1[2])));
                    procUF($.trim(unescape(arRet_1[3])));
                }
            }
        } else {
            msgCEP("2");
        }
    });
                                      
}

function procAC(cep) {

    msgCEP("1");

    $.post(urlFuncoes, {func: "3", cep: cep, usuario: codigoAC, senha: chaveAC}, function(retorno) {

        if (retorno.length > 1) {

            var arRet = retorno.split('|');

            msgCEP("3");
            $("#address1").val($.trim(unescape(arRet[0])));
            $("#address2").val($.trim(unescape(arRet[1])));
            $("#city").val($.trim(unescape(arRet[2])));
            procUF($.trim(unescape(arRet[3])));

        } else {
            msgCEP("2");
        }

    });

}

function procUF(uf) {

    $.post(urlFuncoes, {func: "4", uf: uf}, function(retorno) {

        if (retorno.length > 1) {
            $("#id_state").val($.trim(unescape(retorno)));
        }

    });
}

function msgCEP(str) {

    switch (str) {

        case "0":
            $("#alertpostcode").css("color", "red");
            $("#alertpostcode").html("CEP inválido");
            $("#postcode").focus();
            break;

        case "1":
            $("#alertpostcode").css("color","orange");
            $("#alertpostcode").html("Aguarde. Validando...");
            break;

        case "2":
            $("#alertpostcode").css("color", "red");
            $("#alertpostcode").html("CEP não localizado, tente novamente ou preencha os dados manualmente");
            break;

        case "3":
            $("#alertpostcode").css("color", "green");
            $("#alertpostcode").html("CEP válido. Obrigado!");
            break;

    }

}  


