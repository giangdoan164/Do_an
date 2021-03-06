<?php

class Private_thread extends Controller {
    public $private_thread_model;
    function __construct() {
           Session::check_login();
        //khoi tao 2 doi tuong view model de su dung
        parent::__construct('private_thread');
        $this->private_thread_model = $this->loadModel('private_thread');
        //them file js rieng cua forum
//        $this->view->js = array('class_forum/ckeditor/ckeditor.js');
        $this->view->ckeditor_js = array('ckeditor/ckeditor.js');
        $this->view->css = array('class_forum/css/forum1.css');
 
//        $role = Session::get('level');
//        if($role!=3 || $role !=4){$this->access_denied();}
    }
    
    public function index(){
        $this->dsp_all_thread();
    }
    
    public function dsp_all_thread(){
        $DATA = array();
        $DATA['arr_all_unread_mess'] = $this->private_thread_model->qry_new_unread_message_thread();
        $DATA['arr_all_message'] = $this->private_thread_model->qry_all_thread();
        $DATA['created_time'] = get_post_var('sel_time',1);
        $DATA['private_thread_type'] = get_post_var('sel_type',1);
        $this->view->render('private_thread/dsp_all_thread',$DATA);
    }
    public function dsp_single_thread($thread_id){
        $DATA['thread_id'] = $thread_id;
        $DATA['is_close'] = $this->private_thread_model->qry_count_user_in_thread($thread_id);
        $DATA['arr_all_message'] = $this->private_thread_model->qry_single_thread($thread_id);
        $this->view->render('private_thread/dsp_single_thread',$DATA);
    }
    
    public function create_reply_to_thread(){
            $arr['thread_id'] = get_post_var('thread_id');
            $arr['user_id']  = Session::get('user_id');
            $arr['content']   = get_post_var('txta_reply_content');
            $result =  $this->private_thread_model->create_reply_to_thread($arr);
         if($result){
            $this->dsp_single_thread( $arr['thread_id']);
         }else{
             echo "Lỗi hệ thống";
         }
    }
    
    public function dsp_create_new_thread(){
      
         $DATA = array();
         $DATA['arr_all_contact'] = $this->private_thread_model->qry_all_contact();
         $this->view->render('private_thread/dsp_create_new_thread',$DATA);
    }
    
    public function do_create_new_thread(){
           $result =  $this->private_thread_model->do_create_new_thread();
           if($result){
               $this->private_thread_model->exec_done($this->view->get_controller_url().'dsp_all_thread');
           }
    }
    
    public function dsp_all_thread_has_unread_message(){
        $DATA['sel_type'] = 2;
        $this->private_thread_model->exec_done($this->view->get_controller_url().'dsp_all_thread',$DATA);
        
//        $DATA =array();
//        $DATA['arr_all_unread_mess'] = $this->private_thread_model->qry_new_unread_message_thread();
//        $DATA['arr_all_message'] = $this->private_thread_model->qry_all_thread_has_unread_message();
//        $this->view->render('private_thread/dsp_thread_has_unread_message',$DATA);
    }
    
//    public function count_unread_message(){
//       $arr= $this->private_thread_model->qry_new_unread_message_thread();
//       $arr_unread_thread = array_values($arr);
//       $total  = array_sum($arr_unread_thread);
//       echo $total;
//    }
    
    public function count_unread_message(){
       $arr= $this->private_thread_model->qry_new_unread_message_thread();
       echo sizeof($arr);
    }
    
    public function delete_thread(){
        
        $result = $this->private_thread_model->del_thread();
        if($result){
            $this->private_thread_model->exec_done($this->view->get_controller_url().'dsp_all_thread');
             exit();
        }else{
            $DATA['error'] = " Xảy ra lỗi không xóa được";
            $this->private_thread_model->exec_fail($this->goback_url, $VIEW_DATA['error']);
            exit();
        }
    }
     
   
}