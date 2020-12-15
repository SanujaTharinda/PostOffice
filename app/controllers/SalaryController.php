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
        $columns = ['id','full_name'];
        $data = $this->employeeModel->getNameId($columns);
        echo json_encode ($data);
    }

    public function searchSalary(){
        $month=$_POST['search'];
        $month_array = (explode("/",$month));
        $month_new = $month_array[1].".".$month_array[0];
        $new_data = $this->employeeModel->getSalaryDetails($month_new);
        echo json_encode ($new_data);
    }

}



?>