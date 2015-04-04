<?php

class Class_forum extends Controller {

    public $class_forum_model;

    function __construct() {
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('class_forum');
        $this->class_forum_model = $this->loadModel('class_forum');
        //them file js rieng cua forum
         $this->view->js = array('class_forum/js/forum.js');
         $this->view->css = array('class_forum/css/forum1.css');
    }

    function index() {
        $this->dsp_all_category();
    }
    
    public function dsp_all_category(){
        $DATA['arr_result'] = $this->class_forum_model->qry_all_category();
        $DATA['arr_count_topic'] = $this->class_forum_model->do_count_topic();
        if( $DATA['arr_result']  == FALSE){
            echo "Lỗi Hệ Thống" ;
            exit();
        }
        $this->view->render('class_forum/dsp_all_category',$DATA);
    }

    
}
