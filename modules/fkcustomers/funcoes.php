<?php
include(dirname(__FILE__).'/../../config/config.inc.php');

	$func = $_REQUEST['func'];

	switch ($func) {
		
		case '1':
			$retorno = procRV();
			echo $retorno;
			break;

		case '2':
			$retorno = procBY();
			echo $retorno;
			break;
				
		case '3':
			$retorno = procAC();
			echo $retorno;
			break;
            
        case '4':
            $retorno = procUF();
            echo $retorno;
            break;
            
        case '5':
          	$retorno = duplicidadeCPF_CNPJ();
           	echo $retorno;
           	break;
	}

	//func=1
	function procRV() {
		
		$url = "http://cep.republicavirtual.com.br/web_cep.php?formato=query_string";
		$url .=	"&cep=" . $_REQUEST["cep"];
		$resp = file_get_contents($url);
		
		$retorno = '';
		$resp_tmp = explode('&', $resp);
		
		foreach ($resp_tmp as $tmp) {
			
			if (strlen($tmp) > 0) {
				$tmp_1 = explode('=', $tmp);
				$retorno .= str_replace('+', ' ', $tmp_1[1]).',';
			}
			
		}
		
        return utf8_encode(urldecode($retorno));
	}
	

	//func=2
	function procBY() {
		
		$url = "http://www.byjg.com.br/site/webservice.php/ws/cep?httpmethod=obterlogradouroauth";
		$url .=	"&cep=" . $_REQUEST["cep"];
		$url .=	"&usuario=" . $_REQUEST["usuario"];
		$url .=	"&senha=" . $_REQUEST["senha"];
	
		$resp = file_get_contents($url);
		
		return $resp;
	}
	
	//func=3
	function procAC() {
		
		$url = "http://www.autocep.com.br/webcep/wsEndereco.asmx?WSDL";
		$soap = new SoapClient($url);
		$aut = $soap->AutenticaClienteXml(array(
				'idCliente' => $_REQUEST["usuario"],
				'chave'     => $_REQUEST["senha"],
				'CEP'       => $_REQUEST["cep"],));
		
		$resp = (array)$aut->AutenticaClienteXmlResult;
		$xml =  new SimpleXMLElement($resp['any']);
		 		
		if (strcmp((string)$xml->EnderecoCEP->IDRESULTADO,'002') == 0) {
			
			$resp = ucwords(strtolower((string)$xml->EnderecoCEP->TIPO)) . " " . ucwords(strtolower((string)$xml->EnderecoCEP->NOME)) . "|" .
					ucwords(strtolower((string)$xml->EnderecoCEP->BAIRRO1)) . "|" . ucwords(strtolower((string)$xml->EnderecoCEP->CIDADE)) . "|" .
					(string)$xml->EnderecoCEP->UF;
		
			return $resp;
		}else {
			return "";
		}
	}
    
    //func=4
    function procUF() {
        
        $uf_iso = $_REQUEST['uf'];
        
        if (Configuration::get('FKCUSTOMERS_UFAUTO') != 'on') {
            return '';
        }
        
        // Recupera id_country do Brasil
        $dados = Db::getInstance()->getRow('SELECT id_country FROM `'._DB_PREFIX_.'country` WHERE `iso_code` = "br" Or `iso_code` = "BR"');
        $id_country = $dados['id_country'];
        
        // Recupera id_state da UF do cliente
        $dados = Db::getInstance()->getRow('SELECT id_state FROM `'._DB_PREFIX_.'state` WHERE `id_country` = '.$id_country.' And `iso_code` = "'.$uf_iso.'"');
        
        if ($dados) {
            return $dados['id_state'];
        }else {
            return '';
        }
    }
    
    //func=5
    function duplicidadeCPF_CNPJ() {
    	
    	if (Configuration::get('FKCUSTOMERS_DUPL_CPF_CNPJ') <> 'on') {
    		return 0;
    	}
    	
    	$cpf_cnpj = $_REQUEST['cpf_cnpj'];
    	
    	if (strlen($cpf_cnpj) == 11) {
    		$cpf_cnpj = mask($cpf_cnpj,'###.###.###-##');
    	}else {
    		$cpf_cnpj = mask($cpf_cnpj,'##.###.###/####-##');
    	}
    	
    	$email = $_REQUEST['email'];
    	
    	$dados = Db::getInstance()->executeS('SELECT `email`, `cpf_cnpj` FROM `'._DB_PREFIX_.'customer` WHERE `cpf_cnpj` = "'.$cpf_cnpj.'"');
    	
    	if (!$dados) {
    		return 0;
    	}else {
    		if (!$email) {
    			return 1;
    		}
    		
    		foreach ($dados as $cliente) {
    			if ($cliente['email'] == $email) {
    				return 0;
    			}
    		}
    		
    		return 1;
    	}
    	
    }
    
    function mask($val, $mask) {
    	
    	$maskared = '';
    	$k = 0;
    	
    	for($i = 0; $i<=strlen($mask)-1; $i++) {
    		
    		if($mask[$i] == '#') {
    			if(isset($val[$k]))
    				$maskared .= $val[$k++];
    		}else {
    			if(isset($mask[$i]))
    				$maskared .= $mask[$i];
    		}
    	}
    	
    	return $maskared;
    }
    
?>