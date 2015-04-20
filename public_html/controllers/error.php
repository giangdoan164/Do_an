<?php

class Error extends Controller {

	function __construct() {
            Session::check_login();
	    parent::__construct('error');
	}
	
	function index() {
          
		$this->view->msg = 'Error: controller :This page doesnt exist';
                
		$this->view->set_layout(null)
                           ->render('error/index');
                        
	}

}