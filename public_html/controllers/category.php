<?php
class Category extends Controller
{

    public $category;
    function __construct()
    {
        parent::__construct('category');
        $this->category = $this->loadModel('category');
//        $role = Session::get('level');
//        if($role!=1){$this->access_denied();}
     }
    
    public function index(){
        $this->dsp_all_category();
    }
    
    public function dsp_all_category(){
        $DATA['arr_all_category'] = $this->category->qry_all_category();
        $this->view->render('category/dsp_all_category',$DATA);
    }
    
    public function add_new_category(){
        $result = $this->category->add_new_category();
        $this->goback_url = $this->view->get_controller_url().'dsp_all_category';
        if($result){
              $this->category->exec_fail($this->goback_url,"Thêm thành công");
//                $this->dsp_all_category();
        }else{
            $this->category->exec_fail($this->goback_url,"Thêm thất bại");
        }
        }
        
    public function delete_category(){
        $result = $this->category->delete_category();
        $this->goback_url = $this->view->get_controller_url().'dsp_all_category';
        if($result){
              $this->category->exec_fail($this->goback_url,"Xóa thành công");
                $this->dsp_all_category();
        }else{
            $this->category->exec_fail($this->goback_url,"Xóa thất bại");
        }
    }
}
