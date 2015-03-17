<?php

class Class_grade extends Controller {

    public $class_grade_model;

    function __construct() {
        parent::__construct('class_grade');
        $this->class_grade_model = $this->loadModel('class_grade');
    }

    public function load_class(){
        header('Content-type:application/json');
        $DATA['arr_all_class'] = $this->class_grade_model->qry_all_class();
        echo json_encode($DATA['arr_all_class']);
        }
}
