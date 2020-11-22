<?php

require_once APPROOT .'/models/UsersModel.php'; 
require_once APPROOT .'/helpers/url_helper.php'; 

class LoginController extends Controller{
    private $usersModel;


    public function __construct(){
        $this->usersModel = $this->loadModel("UsersModel");
    } 

    public function index(){
        $this->view("login/loginPage", []);
    
    }

    public function validate(){
        $username = $_POST['email'];
        $password = $_POST['password'];

        $isValid = $this->usersModel->isUserValid($username, $password);

      



        $userType = strtolower($this->usersModel->getUserType($username));
        session_start();

        

        if(isset($_SESSION['username'])){
            redirect("LoginController");
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $userType;
            if(!$isValid or !isset($userType)){
                redirect("LoginController");
            }else{
                redirect("HomeController/homePage/$userType");
            }
    
            
        }

    }

}