<?php

class AuthController extends AuthControllerCore {

    public function initContent() {
        include_once(_PS_MODULE_DIR_.'fkcustomers/includes/variaveis_smarty.php');
        parent::initContent();
    }

}
