<?php

class LeaveModel extends Model{
    private $leaveDetailsTable;
    private $leaveTypeTable;

    public function __construct($database){
        parent::__construct($database);
        $this->leaveDetailsTable = TB_LEAVE_DETAILS;
        $this->leaveTypeTable = TB_LEAVE_TYPE;
    }

    public function getLeaveDetails(){
        return $this->databaseMapper->get($this->leaveDetailsTable, []);
    }

    public function getLeaveTypes(){
        return $this->databaseMapper->get($this->leaveTypeTable, []);
    }

    public function addLeave($data){
        $addLeave= $this->databaseMapper->insert($this->leaveDetailsTable,[],$data);
        if ($addLeave) {
            return true;
        }else {
            return false;
        }
    }

    public function addLeaveType($data){
        $addLeaveType= $this->databaseMapper->insert($this->leaveTypeTable,[],$data);
        if ($addLeaveType) {
            return true;
        }else {
            return false;
        }
    }

    public function deleteLeave($id){
        $deleteLeave=$this->databaseMapper->delete($this->leaveDetailsTable, 'id', $id);
        if ($deleteLeave) {
            return true;
        }else {
            return false;
        }
    }

    public function deleteLeaveType($id){
        $deleteLeaveType=$this->databaseMapper->delete($this->leaveTypeTable,'id',$id);
        if ($deleteLeaveType) {
            return true;
        }else {
            return false;
        }
    }

    public function updateLeaveStatus($id,$value){
        return $this->databaseMapper->update($this->leaveDetailsTable,leave_status,'id',$value);

    }






}










































