<?php

//http://stackoverflow.com/questions/6541302/thread-messaging-system-database-schema-design
class Class_forum extends Controller {

    public $class_forum_model;
    public $category_model;

    function __construct() {
        Session::check_login();
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('class_forum');
        $this->class_forum_model = $this->loadModel('class_forum');
        $this->category_model = $this->loadModel('category');
        //them file js rieng cua forum
        $this->view->js = array('class_forum/js/forum.js');
        $this->view->ckeditor_js = 'ckeditor/ckeditor.js';
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
        $DATA['arr_new_topic'] = $this->class_forum_model->qry_new_topic($DATA['arr_all_category']);
        $DATA['arr_count_topic'] = $this->class_forum_model->do_count_topic();
        $DATA['arr_count_post'] = $this->class_forum_model->do_count_total_post();
        $this->view->render('class_forum/dsp_forum_index', $DATA);
    }

    public function dsp_all_topic($category_id = 0) {
        $category_id = intval($category_id);
        $controller = get_post_var('controller');
        $dsp_forum_index = get_post_var('hdn_dsp_forum_index');
        $this->view->goback_url = $controller . $dsp_forum_index;
        if ($category_id > 0) {
            $DATA['sel_time'] = get_post_var('sel_time', 1);
            $DATA['sel_category'] = get_post_var('sel_category', 1);
            $DATA['sel_type'] = get_post_var('sel_type', 1);
            $DATA['category_id'] = $category_id;
            $DATA['category_name'] = $this->category_model->qry_category_name($category_id);
            $DATA['arr_all_topic'] = $this->class_forum_model->qry_all_topic($category_id);
            $DATA['arr_user_class'] = $this->class_forum_model->qry_all_user_class();
            $this->view->render('class_forum/dsp_all_topic', $DATA);
        } else {
            exit("Không truy cập được");
        }
    }

    public function dsp_single_topic($topic_id = 0) {

        $topic_id = intval($topic_id);
        $controller = get_post_var('controller', '');
        $dsp_all_topic = get_post_var('hdn_dsp_all_topic', '');
        if ($topic_id > 0) {
            $DATA['arr_user_post'] = $this->class_forum_model->qry_post_list_user($topic_id);
            $DATA['category_id'] = get_post_var('category_id');
            $DATA['category_name'] = $this->category_model->qry_category_name($DATA['category_id']);
            $DATA['topic_id'] = $topic_id;
            $DATA['topic_name'] = $this->class_forum_model->qry_topic_title($topic_id);
            $this->class_forum_model->update_view_number($topic_id);
            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
            $this->view->render('class_forum/dsp_single_topic', $DATA);
        } else {
            exit();
        }
    }

    public function dsp_create_new_topic() {
        $DATA['cate_id'] = get_post_var('category_id');
        $DATA['arr_all_category'] = $this->category_model->qry_all_category();
        $this->view->render('class_forum/dsp_create_new_topic', $DATA);
    }

    public function do_create_new_topic() {
        $cate_id = get_post_var('category_id');
        $result = $this->class_forum_model->do_create_new_topic($cate_id);
        $controller = get_post_var('controller');
        $this->view->goback_url = $controller . 'dsp_all_topic/' . $cate_id;
        if ($result) {
            $this->class_forum_model->exec_done($this->view->goback_url, array());
        } else {
            die("Thêm chủ đề lỗi");
        }
    }

//    
//    public function reply_topic($user_id){
//            $arr['topic_id'] = $topic_id = get_post_var('hdn_topic_id');
//            $arr['user_id']  = $user_id;
//            $arr['content']   = get_post_var('txta_reply_content');
//            $DATA['category_id'] = get_post_var('category_id');
//            $DATA['topic_id'] = get_post_var('hdn_topic_id');
//            $result =  $this->class_forum_model->reply_topic($arr);
//         if($result){
//            
//            $DATA['category_name'] = $this->category_model->qry_category_name($DATA['category_id']);
//            $DATA['topic_id'] = $topic_id;
//            $DATA['topic_name'] = $this->class_forum_model->qry_topic_title($topic_id);
//            $this->class_forum_model->update_view_number($topic_id);
//            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
//            $this->go_back_url = $this->view->get_controller_url().'dsp_single_topic/'.$DATA['topic_id'];
//             $this->class_forum_model->exec_done( $this->go_back_url,array());
////            $this->view->render('class_forum/dsp_single_topic',$DATA);
//            
//    }
//    }

    public function reply_topic($user_id) {
        $arr['user_id'] = $user_id;
        $arr['topic_id'] = $topic_id = get_post_var('hdn_topic_id');
        $arr['content'] = get_post_var('txta_reply_content');
        $result = $this->class_forum_model->reply_topic($arr);
        if ($result) {
            $DATA['category_id'] = get_post_var('category_id');
            $DATA['category_name'] = $this->category_model->qry_category_name($DATA['category_id']);
            $DATA['topic_id'] = $topic_id;
            $DATA['topic_name'] = $this->class_forum_model->qry_topic_title($topic_id);
            $this->class_forum_model->update_view_number($topic_id);
            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
//            $this->view->render('class_forum/dsp_single_topic',$DATA);
            $this->goback_url = $this->view->get_controller_url() . 'dsp_single_topic/' . $topic_id;
//            $this->view->render('class_forum/dsp_single_topic',$DATA);
            $this->class_forum_model->exec_done($this->goback_url, $DATA);
        }
    }

    public function update_post() {
        $result = $this->class_forum_model->update_post();
        $arr['topic_id'] = $topic_id = get_post_var('hdn_topic_id');
        if ($result) {
            $DATA['category_id'] = get_post_var('category_id');
            $DATA['category_name'] = $this->category_model->qry_category_name($DATA['category_id']);
            $DATA['topic_id'] = $topic_id;
            $DATA['topic_name'] = $this->class_forum_model->qry_topic_title($topic_id);
            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
//            $this->view->render('class_forum/dsp_single_topic',$DATA);
            $this->goback_url = $this->view->get_controller_url() . 'dsp_single_topic/' . $topic_id;
//            $this->view->render('class_forum/dsp_single_topic',$DATA);
            $this->class_forum_model->exec_done($this->goback_url, $DATA);
        }
    }

    public function delele_post() {
        $result = $this->class_forum_model->delele_post();
        $arr['topic_id'] = $topic_id = get_post_var('hdn_topic_id');
        if ($result) {
            $DATA['category_id'] = get_post_var('category_id');
            $DATA['category_name'] = $this->category_model->qry_category_name($DATA['category_id']);
            $DATA['topic_id'] = $topic_id;
            $DATA['topic_name'] = $this->class_forum_model->qry_topic_title($topic_id);
            $DATA['arr_all_post'] = $this->class_forum_model->dsp_single_topic($topic_id);
            $this->goback_url = $this->view->get_controller_url() . 'dsp_single_topic/' . $topic_id;
//            $this->view->render('class_forum/dsp_single_topic',$DATA);
            $this->class_forum_model->exec_done($this->goback_url, $DATA);
        }
    }

    public function dsp_admin_forum_dasboard() {
        $category_id = get_post_var('category_id');
        $controller = get_post_var('controller');
        $dsp_forum_index = get_post_var('hdn_dsp_forum_index');
        $this->view->goback_url = $controller . $dsp_forum_index;
        if ($category_id > 0) {
            $DATA['sel_time'] = get_post_var('sel_time', 1);
            $DATA['sel_category'] = get_post_var('sel_category', 1);
            $DATA['sel_type'] = get_post_var('sel_type', 1);
            $DATA['category_id'] = $category_id;
            $DATA['category_name'] = $this->category_model->qry_category_name($category_id);
            $DATA['arr_all_topic'] = $this->class_forum_model->qry_all_topic($category_id);
            $DATA['arr_user_class'] = $this->class_forum_model->qry_all_user_class();
            $DATA['arr_category'] = $this->category_model->qry_all_category();
            $this->view->render('class_forum/dsp_admin_forum_dasboard', $DATA);
        } else {
            exit("Không truy cập được");
        }
    }
//    sel_category_topic
    public function admin_delete_post(){
        $result = $this->class_forum_model->admin_delete_post();
        if($result){
            $this->dsp_admin_forum_dasboard();
        }
    }
    
    public function admin_update_category(){
        $result = $this->class_forum_model->admin_update_category();
        if($result){
            $this->dsp_admin_forum_dasboard();
        }
    }
    
    public function delete_topic_user(){
         $result = $this->class_forum_model->delete_topic_user();
        if($result){
            $this->dsp_admin_forum_dasboard();
        }
    }

}
