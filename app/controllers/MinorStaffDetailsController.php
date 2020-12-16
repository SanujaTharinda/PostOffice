<?php

require_once APPROOT .'/helpers/url_helper.php';

class MinorStaffDetailsController extends Controller {
    private $employeeModel;
    private $userModel;

    public function __construct(){
        $this->employeeModel = $this->loadModel("EmployeesModel");
        $this->userModel = $this->loadModel("UsersModel");
    }

    public function minorStaffDetails(){
        $this->view('minorstaffdetails/minorStaffDetails');
    }

    public function viewDetails(){
        $data = $this->employeeModel->getMinorStaffDetails();
        echo json_encode($data);
    }

    public function search(){
        $data =  $this->employeeModel->instantSearch($_POST['search']);
        echo json_encode($data);
    }

    public function getEditEmployeeDetails(){
        $data = $this->employeeModel->findEmployeeById($_POST['id']);
        echo json_encode($data);
    }

    public function editEmployeeDetails(){ 
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'id'=>$_POST['id'],
                'full_name'=>$_POST['full_name'],
                'nic'=>$_POST['nic'],
                'address'=>$_POST['address'],
                'telephone'=>$_POST['telephone'],
                'gender'=>$_POST['gender'],
                'firstday'=>$_POST['date_1'],
                'registered_day'=>$_POST['date_2'],
                'permenent_day'=>$_POST['date_3'],
                'carrier'=>$_POST['carrier'],
                'reg'=>$_POST['reg'],
                'user'=>$_POST['user']
            ];

            if($data['full_name']!="" && $data['nic']!="" && ($data['address'])!="" && ($data['telephone'])!=""
                && ($data['gender'])!="" && ($data['firstday'])!="" && ($data['permenent_day'])!="" && ($data['registered_day'])!="" && ($data['carrier'])!=""){
    

                if($this->employeeModel->editEmployee($data, $data['id'])){
                    redirect('MinorStaffDetailsController/minorStaffDetails');
                }
            }else{
                $this->view('minorstaffdetails/editEmployee');

            }

        }else{
            $this->view('minorstaffdetails/editEmployee');
        }
    }

    public function deleteEmployeeDetails($id){
        $this->employeeModel->deleteEmployee($id[0]);
        redirect('MinorStaffDetailsController/minorStaffDetails');
    }

    public function addEmployeePage(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $gender = $this->selectGender();

            $details = $this->userModel->findMainUserById('id',$_POST['user'],[]);
            $userDetails = $this->updateUserTable($details,$_POST['full_name']);

            $data = $this->createArray($gender,$userDetails['username']);

            if(!empty($data['full_name']) && !empty($data['nic']) && !empty($data['address']) && !empty($data['telephone'])){
                if($this->employeeModel->findUserByNIC($data['nic'])){
                	echo "<script>alert('Employee information already exists');
                        window.location.href='addEmployeePage';
                    </script>";
                    return;

                }else{
                   if($this->employeeModel->addEmployee($data)){
                        $this->userModel->editMainUser($userDetails,$userDetails['id']);
                        redirect('MinorStaffDetailsController/minorStaffDetails');
                    }
                }
            }else{
                $this->view('minorstaffdetails/addEmployee');
            }

        }else{
            $this->view("minorstaffdetails/addEmployee");
        }
    }

    public function updateUserTable($data, $name){
        $newarray = array_shift($data);
        $array = json_decode(json_encode($newarray), true);
        $Employeenames = array_pop($array);
        $newString = $Employeenames.','.$name;
        $array['employees'] = $newString;
        return $array;
    }

    public function selectGender(){
        if(isset($_REQUEST['gender'])){
            $gender=$_POST['gender'];
        }else{
            $gender="gender";
        }
        return $gender;
    }

    public function createArray($gender,$user){
        $data=[
            'full_name'=>trim($_POST['full_name']),
            'nic'=>trim($_POST['nic']),
            'address'=>trim($_POST['address']),
            'telephone'=>trim($_POST['telephone']),
            'gender'=>$gender,
            'firstday'=>$_POST['date_1'],
            'registered_day'=>$_POST['date_2'],
            'permenent_day'=>$_POST['date_3'],
            'carrier'=>$_POST['carrier'],
            'reg'=>$_POST['reg'],
            'user'=>$user
        ];

        return $data;

    }

    public function getUserDetails(){
        $data = $this->userModel->getMainUsersDetails();
        echo json_encode($data);
    }

}