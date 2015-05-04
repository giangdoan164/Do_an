<?php

class Index extends Controller {

	function __construct() {
              
		parent::__construct('index');
	}
	
	function index() {
		$this->view->render('index/dsp_dasboard_index');
	}

	
}