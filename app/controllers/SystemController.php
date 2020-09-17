<?php
include_once("C:/xampp/htdocs/PostOffice/app/models/System.php");

class SystemController extends Controller{
    private $systemModel;

    public function __construct(){
        $this->systemModel = new System();
    }

    public function updateLog(){
        $date = $_POST['date'];
        $this->systemModel->logDate($date);

    }



}

?>