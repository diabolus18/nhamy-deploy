<?php

class IdentityController extends IdentityControllerCore {

    public function initContent() {
        include_once(_PS_MODULE_DIR_.'fkcustomers/includes/variaveis_smarty.php');
        parent::initContent();
    }

}
