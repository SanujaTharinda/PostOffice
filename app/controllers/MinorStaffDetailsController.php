<?php

require_once APPROOT .'/models/Employee.php';

class MinorStaffDetailsController extends Controller {
    private $employeeModel;

    public function __construct(){
        $this->employeeModel = new Employee();
    }



    public function minorStaffDetails(){
        $data = $this->employeeModel->getMinorStaffDetails();
        $this->view("minorstaffdetails/minorStaffDetails", $data);
    }

    public function search(){
        $data =  $this->employeeModel->instantSearch($_POST['search']);
        echo json_encode($data);
    }

    public function addEmployeePage(){
        $this->view("minorstaffdetails/addEmployee");


    }





}