<?php

class Admin extends Controller {
    function __construct($controllerName) {
        parent::__construct($controllerName);
        
        require_login();//check layout
        $this->view->set_layout('default_layout');
    }
}