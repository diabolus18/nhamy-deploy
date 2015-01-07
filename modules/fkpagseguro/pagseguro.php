<?php

    require_once('PagSeguroLibrary/PagSeguroLibrary.php');

    class PagSeguro {

        private $_url = '';
        private $_url_retorno = '';
        private $_url_notificacao = '';
        private $_cod_pagto = '';
        private $_cod_transacao = '';
        private $_referencia = '';
        private $_status = '';
        private $_desc_status = '';
        private $_pagto = '';
        private $_desc_pagto = '';
        private $_valor_ped = 0;
        private $_msgErro = '';

        // Recupera a url de pagamento do cliente
        public function getUrl() {
            return $this->_url;
        }

        // Recupera a url da pagina de retorno ao site
        public function getUrlRetorno() {
            return $this->_url_retorno;
        }

        // Recupera a url para recebimento de notificacao
        public function getUrlNotificacao() {
            return $this->_url_notificacao;
        }

        // Recupera o codigo do pagamento
        public function getCodPagto() {
            return $this->_cod_pagto;
        }

        // Recupera o código da transação
        public function getCodTransacao() {
            return $this->_cod_transacao;
        }

        // Recupera a referencia do pedido informado no processo de pagamento
        public function getReferencia() {
            return $this->_referencia;
        }

        // Recupera o status do pagamento
        public function getStatus() {
            return $this->_status;
        }

        // Recupera a descricao do status do pagamento
        public function getDescStatus() {
            return $this->_desc_status;
        }

        // Recupera o codigo da forma de pagamento
        public function getPagto() {
            return $this->_pagto;
        }

        // Recupera a descricao da forma de pagamento
        public function getDescPagto() {
            return $this->_desc_pagto;
        }

        // Recupera o valor do pedido
        public function getValorPed() {
            return $this->_valor_ped;
        }

        // Recupera a msg de erro
        public function getMsgErro() {
            return $this->_msgErro;
        }

        public function requisitaPagamento($params) {

            try {

                // Configura o charset
                PagSeguroConfig::setApplicationCharset(Configuration::get('FKPAGSEGURO_CHARSET'));

                // Instancia requisicao de pagamento do PagSeguro
                $paymentRequest = new PagSeguroPaymentRequest();

                // Informa a moeda
                $paymentRequest->setCurrency("BRL");

                // Validade da url de pagamento
                $paymentRequest->setMaxAge((int)Configuration::get('FKPAGSEGURO_VALIDADE'));

                // Pagina a ser redirecionada ao termino do pagamento
                $this->_url_retorno = Configuration::get('FKPAGSEGURO_URL_RETORNO');
                $paymentRequest->setRedirectURL($this->_url_retorno);

                // Pagina para recebimento de notificacoes
                $this->_url_notificacao = Configuration::get('FKPAGSEGURO_URL_NOTIFICACAO');
                $paymentRequest->setNotificationURL($this->_url_notificacao);

                // Verifica se o módulo FKcustomers está instalado
                $fkcustomers = Db::getInstance()->getValue('SELECT `id_module` FROM `'._DB_PREFIX_.'module` WHERE `name` = "'.pSQL('fkcustomers').'"');
                
                // Dados do cliente
                $cliente = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'customer` WHERE `id_customer` = '.(int)$params['objOrder']->id_customer);
                $endereco = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'address` WHERE `id_address` = '.(int)$params['objOrder']->id_address_delivery);
                $uf = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'state` WHERE `id_state` = '.(int)$endereco['id_state']);

                // Trata telefone
                $telefone = array(
                    'cod_area' => '',
                    'telefone' => ''
                );
                
                if ($endereco['phone']) {
                    $tel_tmp =  $this->trataTelefone($endereco['phone']);
                    
                    $telefone['cod_area'] = $tel_tmp['cod_area'];
                    $telefone['telefone'] = $tel_tmp['telefone'];
                }else {
                    if ($endereco['phone_mobile']) {
                        $tel_tmp =  $this->trataTelefone($endereco['phone_mobile']);
                        
                        $telefone['cod_area'] = $tel_tmp['cod_area'];
                        $telefone['telefone'] = $tel_tmp['telefone'];
                    }
                }

                // Trata nome
                $nome = $this->trataNome($cliente['firstname'], $cliente['lastname']);
                
                if (strlen($nome) > 50) {
                	$nome = substr($nome, 0, 50);
                }
                
                //Trata email
                $email = $cliente['email'];
                
                if (strlen($email) > 60) {
                	$email = substr($email, 0, 60);
                }
                
                // Envia dados do cliente
                $paymentRequest->setSender(
                    Array(
                        'name'      => $nome,
                        'email'     => $email,
                        'areaCode'  => $telefone['cod_area'],
                        'number'    => $telefone['telefone']
                    )
                );
                
                // Envia CPF se FKcustomers estiver instalado
                $cpf = '';
                
                if ($fkcustomers) {
                    if ($cliente['tipo'] == 'pf') {
                        $cpf = $this->soNumeros($cliente['cpf_cnpj']);
                        
                        $paymentRequest->addParameter('senderCPF', $cpf);
                    }
                }

                // Endereço de envio (só grava se FKcustomers estiver instalado)
                if ($fkcustomers) {
                    $paymentRequest->setShippingAddress(
                        Array(
                            'postalCode' => $this->soNumeros($endereco['postcode']),
                            'street' => $endereco['address1'],
                            'number' => $endereco['numend'],
                            'complement' => $endereco['compl'],
                            'district' => $endereco['address2'],
                            'city' => $endereco['city'],
                            'state' => $uf['iso_code'],
                            'country' => 'BRA'
                        )
                    );
                }

                // Frete
                $codigo_frete = PagSeguroShippingType::getCodeByType('NOT_SPECIFIED');
                $paymentRequest->setShippingType($codigo_frete);
                $paymentRequest->setShippingCost($params['objOrder']->total_shipping);

                // Informa os produtos
                $cart = new Cart($params['objOrder']->id_cart);
                $produtos = $cart->getProducts();

                foreach($produtos as $produto){
                	
                	//Trata descricao do produto
                	$desc_prod = $produto['name'];
                	
                	if (strlen($desc_prod) > 100) {
                		$desc_prod = substr($desc_prod, 0, 100);
                	}

                    $paymentRequest->addItem(
                        Array(
                            'id' => $produto['id_product'],
                            'description' => $desc_prod,
                            'quantity' => (int)$produto['cart_quantity'],
                            'amount' => $produto['price_wt']
                        )
                    );
                }
                
                // Recupera acrescimo (Embalagem Presente)
                $acrescimo = $params['objOrder']->total_wrapping; 

                // Recupera desconto
                $desconto = $params['objOrder']->total_discounts_tax_incl;

                if ($desconto > 0) {
                    $desconto *= -1;
                }
                
                // Informa Valor Extra (Embalagem Presente - Desconto)
                $valor_extra = $acrescimo + $desconto;
                
                if ($valor_extra != 0) {
                    $paymentRequest->setExtraAmount($valor_extra);  
                }

                // Código de referência
                if (isset($params['objOrder']->id) And !empty($params['objOrder']->id)) {
                    $codigo_referencia = $params['objOrder']->id;
                }else {
                    $codigo_referencia = $params['objOrder']->reference;
                }

                $paymentRequest->setReference($codigo_referencia);

                // Credenciais
                $credentials = new PagSeguroAccountCredentials(
                    Configuration::get('FKPAGSEGURO_EMAIL'),
                    Configuration::get('FKPAGSEGURO_TOKEN')
                );

                // Requisicao do codigo de pagamento
                $this->_cod_pagto = $paymentRequest->register($credentials, true);

                // Requisicao da url para redirecionamento do cliente
                $this->_url = $paymentRequest->register($credentials);

            } catch (PagSeguroServiceException $e) {
                $this->_msgErro = $e->getMessage();
                return false;
            }

            return true;
        }

        public function consultaTransacao($id_transacao) {

            try {
                // Credenciais
                $credentials = new PagSeguroAccountCredentials(
                    Configuration::get('FKPAGSEGURO_EMAIL'),
                    Configuration::get('FKPAGSEGURO_TOKEN')
                );

                // Realiza a consulta
                $transaction = PagSeguroTransactionSearchService::searchByCode(
                    $credentials,
                    $id_transacao
                );

                $this->_cod_transacao = &$id_transacao;
                $this->_valor_ped = $transaction->getGrossAmount();
                $this->_referencia = $transaction->getReference();
                $this->_status = $transaction->getStatus()->getValue();
                $this->_desc_status = $this->descricaoStatus($this->_status);

                $pagto = $transaction->getPaymentMethod()->getType()->getValue();

                if ($pagto) {
                    $this->_pagto = $pagto;
                    $this->_desc_pagto = $this->descricaoPagto($pagto);
                }else {
                    return false;
                }

            } catch (PagSeguroServiceException $e) {
                $this->_msgErro = $e->getMessage();
                return false;
            }

            return true;
        }

        public function consultaNotificacao($id_type, $id_code) {

            try {
                // Verifica o tipo de notificação recebida
                if (!$id_type === 'transaction') {
                    return true;
                }

                // Credenciais
                $credentials = new PagSeguroAccountCredentials(
                    Configuration::get('FKPAGSEGURO_EMAIL'),
                    Configuration::get('FKPAGSEGURO_TOKEN')
                );

                // Efetua a consulta ao PagSeguro
                $transaction = PagSeguroNotificationService::checkTransaction(
                    $credentials,
                    $id_code
                );

                $this->_cod_transacao = $transaction->getCode();
                $this->_referencia = $transaction->getReference();
                $this->_status = $transaction->getStatus()->getValue();
                $this->_desc_status = $this->descricaoStatus($this->_status);

                $pagto = $transaction->getPaymentMethod()->getType()->getValue();

                if ($pagto) {
                    $this->_pagto = $pagto;
                    $this->_desc_pagto = $this->descricaoPagto($pagto);
                }else {
                    return false;
                }

            } catch (PagSeguroServiceException $e) {
                $this->_msgErro = $e->getMessage();
                return false;
            }

            return true;
        }

        public function consultaPorData($data_inicial) {

            try {
                // Credenciais
                $credentials = new PagSeguroAccountCredentials(
                    Configuration::get('FKPAGSEGURO_EMAIL'),
                    Configuration::get('FKPAGSEGURO_TOKEN')
                );

                // Formata data inicial
                $data = explode(' ', $data_inicial);
                $dataInicio = $data[0].'T00:00';

                // Definindo o número máximo de resultados por página
                $resultadoPorPagina = 20;

                // Definindo o número da página
                $numeroPagina = 1;

                /* Realizando a consulta */
                $retorno = PagSeguroTransactionSearchService::searchByDate(
                    $credentials,
                    $numeroPagina,
                    $resultadoPorPagina,
                    $dataInicio
                );

                // Retorna array com as transacoes
                return $retorno->getTransactions();

            } catch (PagSeguroServiceException $e) {
                $this->_msgErro = $e->getMessage();
                return false;
            }

        }

        public function atlStatusPed($numPed, $statusPS) {

            // Verifica se a constante está definida
            if (!defined('_PS_BASE_URL_')) {
                define('_PS_BASE_URL_', Tools::getShopDomain(true)); 
            }

            // Recupera o último id_order_state
            $stateAtual = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'order_history` WHERE `id_order` = ' .(int)$numPed.' ORDER BY id_order_history DESC');

            // Verifica:
            //***Se o status do PagSeguro é Pagamento Confirmado e o status atual do pedido é Aguardando Confirmação do PagSeguro
            //***Se o status do PagSeguro é Pagamento Confirmado e o status atual do pedido é Cancelado
            //***Se o status do PagSeguro é Cancelado e o status atual do pedido é Aguardando Confirmação do PagSeguro
            if ($statusPS == '3' And $stateAtual['id_order_state'] == Configuration::get('FKPAGSEGURO_STATE_ORDER') Or
                $statusPS == '3' And $stateAtual['id_order_state'] == 6 Or
                $statusPS == '7' And $stateAtual['id_order_state'] == Configuration::get('FKPAGSEGURO_STATE_ORDER')) {

                // Instancia Order
                $order = new Order((int)$numPed);

                // Cria nova entrada em order_history
                $history = new OrderHistory();
                $history->id_order = $stateAtual['id_order'];
                $history->id_employee = 0;  // FKpagseguro

                $usarPagtoExistente = false;
                if (!$order->hasInvoice()) {
                    $usarPagtoExistente = true;
                }

                if ($statusPS == '3') {
                    $novoState = 2; // State de Pagamento Aceito
                }else {
                    $novoState = 6; // State de Pagamento Cancelado
                }

                $history->changeIdOrderState((int)$novoState, $order, $usarPagtoExistente);

                $carrier = new Carrier($order->id_carrier, $order->id_lang);
                $templateVars = array();
                if ($history->id_order_state == Configuration::get('PS_OS_SHIPPING') && $order->shipping_number) {
                    $templateVars = array('{followup}' => str_replace('@', $order->shipping_number, $carrier->url));
                }

                // Salva as alterações
                if ($history->addWithemail(true, $templateVars)) {

                    // Sincroniza quantidades, se necessário
                    if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {

                        foreach ($order->getProducts() as $product) {
                            if (StockAvailable::dependsOnStock($product['product_id'])) {
                                StockAvailable::synchronize($product['product_id'], (int)$product['id_shop']);
                            }
                        }
                    }
                }
            }

            return true;
        }

        public function descricaoStatus($status) {

            $descricao = array(
                '1' => 'Aguardando pagamento',
                '2' => 'Em análise',
                '3' => 'Pagamento confirmado',
                '4' => 'Valor disponível',
                '5' => 'Em disputa',
                '6' => 'Valor pago devolvido ao comprador',
                '7' => 'Transação cancelada'
            );

            if (!array_key_exists($status, $descricao)) {
                return 'Não definido';
            }

            return $descricao[$status];
        }

        public  function descricaoPagto($pagto) {

            $descricao = array(
                '1' => 'Cartão de crédito',
                '2' => 'Boleto',
                '3' => 'Débito online (TEF)',
                '4' => 'Saldo PagSeguro',
                '5' => 'Oi Paggo',
                '7' => 'Depósito em conta'
            );

            if (!array_key_exists($pagto, $descricao)) {
                return 'Não definido';
            }

            return $descricao[$pagto];
        }

        private function trataTelefone($telefone) {

            $codArea = '';
            $tel = '';

            $telefone = $this->soNumeros($telefone);
            $len = strlen($telefone);

            if ($len == 10) {
                $codArea = substr($telefone, 0, 2);
                $tel = substr($telefone, 2, 8);
            }else {
                if ($len == 11) {
                    $codArea = substr($telefone, 0, 2);
                    $tel = substr($telefone, 2, 9);
                }else {
                    $codArea = '';
                    $tel = '';
                }
            }

            return array('cod_area' => $codArea, 'telefone' => $tel);
        }

        private function trataNome($nome, $sobrenome) {

            // Remove numeros do nome
            $nome = preg_replace('/\d/', '', $nome);

            // Separa o nome utilizando o delimitador 'espaço'
            $arrayNome = explode(' ', $nome);

            // Monta novamente o nome
            $nomeTmp = '';
            foreach ($arrayNome as $tmp) {
                if ($tmp != '') {
                    $nomeTmp .= trim($tmp).' ';
                }
            }

            $nomeCompleto = trim($nomeTmp);

            // Remove numeros do sobrenome
            $sobrenome = preg_replace('/\d/', '', $sobrenome);

            // Separa o sobrenome utilizando o delimitador 'espaço'
            $arraySobreNome = explode(' ', $sobrenome);

            // Monta novamente o sobrenome
            $sobrenomeTmp = '';
            foreach ($arraySobreNome as $tmp) {
                if ($tmp != '') {
                    $sobrenomeTmp .= trim($tmp).' ';
                }
            }

            $nomeCompleto .= ' '.trim($sobrenomeTmp);

            return $nomeCompleto;
        }


        private function soNumeros($str){

            $tmp = '';

            for ($i=0; $i < strlen($str); $i++){

                if (substr($str, $i, 1) >= '0' And substr($str, $i, 1) <= '9') {
                    $tmp .= substr($str, $i, 1);
                }
            }

            return $tmp;
        }

    }
