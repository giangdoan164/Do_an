<?php

class Subject_grade extends Controller
{
    public $subject_grade_model;
    function __construct()
    { 
        parent::__construct('subject_grade');
        $this->subject_grade_model = $this->loadModel('subject_grade');
       
     }
     
     public function index(){
         $this->dsp_all_subject_grade();
     }
     
     public function dsp_all_subject_grade(){
         $this->view->render('subject_grade/dsp_all_subject_grade');
     }

}