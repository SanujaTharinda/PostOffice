<?php

require_once APPROOT .'/models/Employee.php'; 

class AttendanceController extends Controller{
    private $employeeModel;


    public function __construct(){
        $this->employeeModel = new Employee();
    }


    public function attendanceDashboard(){
        $this->view("attendance/attendanceDashboard");

    }




    public function getAttendance(){
        $data = $this->employeeModel->getAttendance();
        echo json_encode ($data);



    }










}