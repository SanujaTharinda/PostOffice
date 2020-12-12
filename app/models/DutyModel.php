<?php

class DutyModel extends Model{

    private $dutyDetailsTable;
    private $otDetailsTable;

    public function __construct($database){
        parent::__construct($database);
        $this->dutyDetailsTable="duties";
        $this->otDetailsTable="ot";

    }

    public function getDutyDetails(){

        return $this->databaseMapper->get($this->dutyDetailsTable, []);

    }

    public function getOtDetails(){

        return $this->databaseMapper->get($this->otDetailsTable, []);

    }

    public function getDutyById($id){
        $dutyArray=$this->databaseMapper->find($this->dutyDetailsTable,[],'id',$id);
        return array_shift($dutyArray);
        
        

    }

    public function addDuty($data){
            return $this->databaseMapper->insert($this->dutyDetailsTable,$data); 
    }

    public function addOt($data){
        return $this->databaseMapper->insert($this->otDetailsTable,$data);
    }

    public function updateDuty($data){
        return $this->databaseMapper->update($this->dutyDetailsTable,$data,'id',$data['id']);
    }

    public function deleteDuty($id){
        return $this->databaseMapper->delete($this->dutyDetailsTable,'id',$id);
    }

}


?>