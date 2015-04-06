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

    public function dsp_forum_index() {
        $DATA['arr_all_category'] = $this->category_model->qry_all_category();
         if ($DATA['arr_all_category'] == FALSE) {
            echo "Diễn đàn chưa có chuyên mục để trao đổi !";
            exit();
        }
        $DATA['arr_new_topic']    = $this->class_forum_model->qry_new_topic($DATA['arr_all_category']);
        $DATA['arr_count_topic']  = $this->class_forum_model->do_count_topic();
        $this->view->render('class_forum/dsp_forum_index', $DATA);
    }

    public function dsp_all_topic($category_id =0) {
        $category_id = intval($category_id);
        $controller = get_post_var('controller');
        $dsp_forum_index = get_post_var('hdn_dsp_forum_index');
       
        $this->view->goback_url = $controller . $dsp_forum_index;
        if ($category_id > 0) {
            $DATA['cate_id'] = $category_id;
            $DATA['arr_all_topic'] = $this->class_forum_model->qry_all_topic($category_id);
 
            $this->view->render('class_forum/dsp_all_topic', $DATA);
        } else {
            $this->class_forum_model->exec_fail($this->view->goback_url, "Mời chọn chủ đề !");
            exit();
        }
    }
    
    public function dsp_single_topic($topic_id =0){
        $topic_id = intval($topic_id);
        $controller = get_post_var('controller','');
        $dsp_all_topic = get_post_var('hdn_dsp_all_topic','');
        if($topic_id >0){
            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
            $this->view->render('class_forum/dsp_single_topic',$DATA);
        }else{
            exit();
        }
        
    }
    
    

}