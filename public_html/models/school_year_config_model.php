<?php

class School_year_config_Model extends model {

    function __construct($db) {
        parent::__construct($db);
    }
    
    public function qry_current_system_info(){
        $result = array();
        $sql ="SELECT * FROM t_current_time";
        $result = $this->db->GetRow($sql);
        return $result;
    }
    
    public function update_system_config(){
        $semester = get_post_var('sel_semester');
        $school_year = get_post_var('sel_year');
        $active_school_record = get_post_var('active_record');
        if($active_school_record == 'on'){ $active = 1;}
        else{$active = 0;}
        $sql ="UPDATE t_current_time SET  C_SEMESTER = '$semester' ,C_SCHOOL_YEAR = '$school_year' ,C_ACTIVE = '$active'";
        $this->db->Execute($sql);
        if($this->db->ErrorNo()==0){
            return true;
        }else{
            return false;
        }
    }
}