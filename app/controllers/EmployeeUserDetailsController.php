<?php 

require_once APPROOT .'/helpers/url_helper.php';

class EmployeeUserDetailsController extends Controller {

    private $userModel;

    public function __construct(){
        $this->userModel = $this->loadModel("UsersModel");
    }

    public function employeeUserDetails(){
        $this->view('employeeuserdetails/employeeUserDetails');
    }

    public function viewDetails(){
        $data = $this->userModel->getEmployeeUserDetails();
        echo json_encode($data);
    }

    public function getEditEmployeeUserDetails(){
        $data = $this->userModel->findEmployeeUserById('id',$_POST['id'],[]);
        echo json_encode($data);
    }

    public function editEmployeeUserDetails($id){ 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $loginTableID = $this->userModel->getEmailFromEUTable('id', $_POST['id'], []);
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'id'=>$_POST['id'],
                'email'=>$_POST['email'],
                'username'=>$_POST['username']
            ];

            $onlyEmail = ['email'=>$data['email']];

            if($data['email']!="" && $data['username']!=""){
                $this->userModel->editUser($onlyEmail, $loginTableID);
                $this->userModel->editEmployeeUser($data, $data['id']);
                
                redirect('EmployeeUserDetailsController/employeeUserDetails');
                
            }else{
                $this->view('employeeuserdetails/editEmployeeUser');

            }

        }
        
        else{
            $this->view('employeeuserdetails/editEmployeeUser');
        }
    }

    public function addEmployeeUser(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = $this->createArray();
            $values= ['email'=>$data['email'], 'usertype'=>"Employee", 'password'=>trim($_POST['username'])];

            if(!empty($data['email']) && !empty($data['username']) && !empty($values['password'])){
                $this->userModel->addUser($values);
                $this->userModel->addEmployeeUser($data);

                redirect('EmployeeUserDetailsController/employeeUserDetails');

            }else{
                $this->view('employeeuserdetails/addEmployeeUser');
            }

        }else{
            $this->view("employeeuserdetails/addEmployeeUser");
        }
    }

    public function createArray(){

        date_default_timezone_set('Asia/Colombo'); 
        $date=date("Y.m.d");

        $data=[
            'email'=>trim($_POST['email']),
            'username'=>trim($_POST['username']),
            'created_date'=>$date
        ];

        return $data;

    }

    public function deleteEmployeeUserDetails($email){
        $this->userModel->deleteUser($email[0]);
        $this->userModel->deleteEmployeeUser($email[0]);
        redirect('EmployeeUserDetailsController/employeeUserDetails');
    }
}

?>