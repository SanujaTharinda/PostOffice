<?php 

class SalaryController extends Controller{
    private $employeeModel;

    public function __construct(){
        $this->employeeModel = $this->loadModel("EmployeesModel");
    }

    public function salaryDetails(){
        $this->view('salary/salary');
    }

    public function getSalary(){
        $data = $this->employeeModel->getNameId();
        echo json_encode ($data);
    }

    public function searchSalary(){
        $month=$_POST['search'];
        $data = $this->employeeModel->getSalary($month);
        echo json_encode ($data);
    }
}



?>