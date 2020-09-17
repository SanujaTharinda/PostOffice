<?php
require_once APPROOT .'/models/System.php'; 

class System{
    private $database;
    private $systemLogTableName;
    

    public function __construct(){
       $this->database = new Database();
       $this->systemLogTableName = TB_SYSTEM_LOG; 
    }

    public function logDate($date){
        $data = $this->getLoggedDates($date);
        $dateExists = $this->dateExists($data);

        if(!$dateExists){
            $this->insertDateToTheLog($date);
        }
        
    }

    private function getLoggedDates($date){
        $this->database->query("SELECT id FROM $this->systemLogTableName WHERE date=:date");
        $this->database->bind(":date", $date);
        $this->database->execute();
        return $this->database->resultSet();
    }



    private function dateExists($data){
        return count((array)$data) > 0;

    }

    private function insertDateToTheLog($date){
        $this->database->query("INSERT INTO $this->systemLogTableName (date)
        VALUES (:date)");
        $this->database->bind(":date", $date);
        $this->database->execute();
    }








}