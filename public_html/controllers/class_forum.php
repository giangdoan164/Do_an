<?php

class Class_forum extends Controller {

    public $class_forum_model;

    function __construct() {
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('class_forum');
        $this->class_forum_model = $this->loadModel('class_forum');
        //them file js rieng cua forum
         $this->view->js = array('class_forum/js/forum.js');
    }

    function index() {
        $this->dsp_all_category();
    }
    
    public function dsp_all_category(){
        $this->view->render('class_forum/dsp_all_category');
    }

}
