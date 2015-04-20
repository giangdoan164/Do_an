<?php

class Help extends Controller {

	function __construct() {
                Session::check_login();
		parent::__construct('help');
	}
	
	function index() {
		$this->view->render('help/index');	
	}

	public function other($arg = false) {
		
		require 'models/help_model.php';
		$model = new Help_Model();
		$this->view->blah = $model->blah();
		
	}

}