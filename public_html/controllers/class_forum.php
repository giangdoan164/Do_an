<?php

class Class_forum extends Controller {

    public $class_forum_model;
    public $category_model;
    function __construct() {
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('class_forum');
        $this->class_forum_model = $this->loadModel('class_forum');
        $this->category_model = $this->loadModel('category');
        //them file js rieng cua forum
         $this->view->js = array('class_forum/js/forum.js');
         $this->view->css = array('class_forum/css/forum1.css');
    }

    function index() {
        $this->dsp_forum_index();
    }
    
    public function dsp_forum_index(){
        $DATA['arr_all_category'] = $this->category_model->qry_all_category();
        $DATA['arr_new_topic'] = $this->class_forum_model->qry_new_topic();
        $DATA['arr_count_topic'] = $this->class_forum_model->do_count_topic();
       
        if( $DATA['arr_new_topic']  == FALSE){
            echo "Lỗi Hệ Thống" ;
            exit();
        }
        $this->view->render('class_forum/dsp_forum_index',$DATA);
    }
    
    public function dsp_all_category(){
       
    }

    
}
