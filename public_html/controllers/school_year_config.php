<?php

class School_year_config extends Controller
{

    public $school_year_model;
    function __construct()
    {
        Session::check_login();
        parent::__construct('school_year_config');
        $this->school_year_model = $this->loadModel('school_year_config');
//        $role = Session::get('level');
//        if($role!=1){$this->access_denied();}
        
    }

    public function index()
    {
        $this->dsp_system_config();
    }

    public function dsp_system_config()
    {
        $DATA['arr_system_info'] = $this->school_year_model->qry_current_system_info();
        $this->view->render('school_year_config/dsp_system_config',$DATA);
    }
    
    public function update_system_config(){
  
        $this->school_year_model->update_system_config();
        $this->goback_url = $this->view->get_controller_url().'dsp_system_config';
        $this->school_year_model->exec_fail( $this->goback_url,"Cập nhật thành công");
    }
    
    public function reset_system(){
        $result = $this->school_year_model->reset_system();
        $this->goback_url = $this->view->get_controller_url().'dsp_system_config';
        if($result){
            $this->school_year_model->exec_fail($this->goback_url,"Reset hệ thống thành công");
        }else{
             $this->school_year_model->exec_fail($this->goback_url,"Reset hệ thống thất bại");
        }
    }
    

}
