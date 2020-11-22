<?php

class SystemModel extends Model{
    private $systemLogTable;

    public function __construct($database){
       parent::__construct($database);
       $this->systemLogTable = TB_SYSTEM_LOG; 
    }

    public function logDate($date){
        $data = $this->getLoggedDates($date);
        $dateExists = $this->dateExists($data);

        if(!$dateExists){
            $this->insertDateToTheLog($date);
        }
        
    }

    private function getLoggedDates($date){
        return 
            $this->databaseMapper->find($this->systemLogTable,['id'], 'date', $date);

    }



    private function dateExists($data){
        return count((array)$data) > 0;

    }

    private function insertDateToTheLog($date){
        return 
            $this->databaseMapper->insert($this->systemLogTable, ['date'], [$date]);
        
    }

}