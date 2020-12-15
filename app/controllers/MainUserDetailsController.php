<?php 

require_once APPROOT .'/helpers/url_helper.php';

class MainUserDetailsController extends Controller {

    private $userModel;
    private $employeeModel;

    public function __construct(){
        $this->userModel = $this->loadModel("UsersModel");
        $this->employeeModel = $this->loadModel("EmployeesModel");
    }

    public function mainUserDetails(){
        $this->view('mainuserdetails/mainUserDetails');
    }

    public function viewDetails(){
        $data = $this->userModel->getMainUsersDetails();
        echo json_encode($data);
    }

    public function getEditMainUserDetails(){
        $data = $this->userModel->findMainUserById('id',$_POST['id'],[]);
        echo json_encode($data);
    }

    public function editMainUserDetails(){ 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $loginTableID = $this->userModel->getEmailFromMUTable('id', $_POST['id'], []);
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'id'=>$_POST['id'],
                'email'=>$_POST['email'],
                'username'=>$_POST['username'],
            ];

            $onlyEmail = ['email'=>$data['email']];

            if($data['email']!="" && $data['username']!=""){
                $newarray = $this->userModel->findMainUserById('id',$_POST['id'],['username']);
                $array = array_shift($newarray);
                $array = json_decode(json_encode($array), true);
                $mainUserName = ['user'=>$data['username']];
                $this->employeeModel->editEmployeeByName($mainUserName, $array['username']);
                $this->userModel->editUser($onlyEmail, $loginTableID);
                $this->userModel->editMainUser($data, $data['id']);
                redirect('MainUserDetailsController/mainUserDetails');

            }else{
                $this->view('mainuserDetails/editMainUser');

            }

        }else{
            $this->view('mainuserdetails/editMainUser');
        }
    }

    public function addMainUser(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = $this->createArray();
            $values = ['email'=>$data['username'], 'password'=>trim(password_hash($_POST['username'], PASSWORD_DEFAULT)), 'usertype'=>'Main'];

            if(!empty($data['email']) && !empty($data['username']) && !empty($values['password'])){
                $this->userModel->addUser($values);
                $this->userModel->addMainUser($data);

                redirect('MainUserDetailsController/mainUserDetails');

            }else{
                $this->view('mainuserdetails/addMainUser');
            }

        }else{
            $this->view("mainuserdetails/addMainUser");
        }
    }

    public function createArray(){

        date_default_timezone_set('Asia/Colombo'); 
        $date=date("Y.m.d");

        $data=[
            'email'=>trim($_POST['email']),
            'username'=>trim($_POST['username']),
            'created_date'=>$date,
            'employees'=>''

        ];

        return $data;

    }

    public function deleteMainUserDetails($email){
        $this->userModel->deleteUser($email[0]);
        $this->userModel->deleteMainUser($email[0]);
        redirect('MainUserDetailsController/mainUserDetails');
    }

    public function minorStaffDetails(){
        $this->view('mainuserdetails/minorStaff');
    }

    public function showMinorStaffDetails(){
        $names = $this->userModel->findMainUserById('id',$_POST['id'],[]);
        $newarray = array_shift($names);
        $string = json_decode(json_encode($newarray), true);
        $array = explode(",", $string['employees']);
        $details = $this->employeeModel->getDetailsByNames($array);
        echo json_encode($details);
    }
}

?>