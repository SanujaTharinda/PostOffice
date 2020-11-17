<?php

require_once APPROOT .'/models/User.php'; 
require_once APPROOT .'/helpers/url_helper.php'; 

class LoginController extends Controller{
    private $userModel;


    public function __construct(){
        
        $this->userModel = new User();

    } 

    public function index(){
        $this->view("login/loginPage", []);
    
    }

    public function validate(){
        $username = $_POST['email'];
        $password = $_POST['password'];

        $isValid = $this->userModel->isUserValid($username, $password);
        $userType = strtolower($this->userModel->getUserType($username));
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