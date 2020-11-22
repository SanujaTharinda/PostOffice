<?php


require_once MODELS_LOCATION."helpers/DatabaseMapper.php";


abstract class Model{
    protected $databaseMapper;

    public function __construct($database){
        $this->databaseMapper = new DatabaseMapper($database);
    }
}