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
        $dutyObject=array_shift($dutyArray);
        
        return $dutyObject;

    }

    public function addDuty($data){
            
            $insertToDutyTable=$this->databaseMapper->insert($this->dutyDetailsTable,[],$data);

            if($insertToDutyTable){
                return true;
            }else{
                return false;
            }
        
    }

    public function addOt($data){

        $insertToOtTable=$this->databaseMapper->insert($this->otDetailsTable,[],$data);

        if($insertToOtTable){
            return true;
        }else{
            return false;
        }

    }

    public function updateDuty($data){
        
        $updateDutyDetails=$this->databaseMapper->update($this->dutyDetailsTable,$data,'id',$data['id']);

        if($updateDutyDetails){
            return true;
        }else{
            return false;
        }
        
    }

    public function deleteDuty($id){
        
        $removeDuty=$this->databaseMapper->delete($this->dutyDetailsTable,'id',$id);

        if($removeDuty){
            return true;
        }else{
            return false;
        }

    }

}


?>