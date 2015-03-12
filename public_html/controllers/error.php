<?php

class Error extends Controller {

	function __construct() {
		parent::__construct('error');
	}
	
	function index() {
          
		$this->view->msg = 'Error: controller :This page doesnt exist';
		$this->view->render('error/index');
                  
	}

}