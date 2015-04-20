<?php

class Index extends Controller {

	function __construct() {
                Session::check_login();
		parent::__construct('index');
	}
	
	function index() {
		$this->view->render('index/index');
	}
	
	function details() {
		$this->view->render('index/index');
	}
	
}