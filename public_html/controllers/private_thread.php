<?php

class Private_thread extends Controller {
    public $private_thread_model;
    function __construct() {
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('private_thread');
        $this->private_thread_model = $this->loadModel('private_thread');
     
        //them file js rieng cua forum
//        $this->view->js = array('class_forum/js/forum.js');
//        $this->view->ckeditor_js = 'ckeditor/ckeditor.js';
//        $this->view->css = array('class_forum/css/forum1.css');
    }
    
    public function index(){
        $this->dsp_all_message();
    }
    
    public function dsp_all_message(){
        $DATA = array();
        $DATA['arr_all_message'] = $this->private_thread_model->qry_all_thread();
        $this->view->render('private_thread/dsp_all_thread',$DATA);
    }
}