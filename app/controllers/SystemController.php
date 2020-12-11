<?php
class SystemController extends Controller{
    private $systemModel;

    public function __construct(){
        $this->systemModel = $this->loadModel('SystemModel');
    }

    public function updateLog(){
        $date = $_POST['date'];
        $this->systemModel->logDate($date);
    }

}

?>