<?php

abstract class Controller{

    public function loadModel($model){
        require_once MODELS_LOCATION . $model . ".php";
        return new $model();
    }

    public function view($view, $data = []){
        $fileName = VIEWS_LOCATION.$view.".php";
        if(file_exists($fileName)){
            require_once $fileName;
        }else{
            die("View Does Not Exist");
        }
    }
}