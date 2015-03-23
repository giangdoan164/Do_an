<?php

class Parent_student extends Controller {

    function __construct() {
        parent::__construct('parent_student');
    }

    public function index(){
    // creates an object instance of the class, and read the excel file data
    $excel = new PhpExcelReader();
//    $excel->read(SERVER_ROOT.'contact_files/test_1.xls');
    $excel->read(EXCEL_PATH.'hehe.xls');
    echo __FILE__;
    echo "<pre>";
    print_r($excel);
    echo "</pre>";
    echo __LINE__;die();


}
}