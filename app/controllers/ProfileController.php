<?php

require_once APPROOT .'/helpers/url_helper.php'; 

class ProfileController extends Controller{

    private $usersModel;


    public function __construct(){
        $this->usersModel = $this->loadModel("UsersModel");
    }

    public function profile(){
        $this->view('profile/profileDetails');
    }


    public function usernameExists(){
        echo json_encode($this->usersModel->userExists($_POST['newUsername']));
    }

    public function changeUsername(){
        session_start();
        $oldUsername = $_SESSION['username'];
        $newUsername = $_POST['newUsername'];
        if($this->usersModel->changeUsername($oldUsername, $newUsername)){
            $_SESSION['username'] = $newUsername;
        }


    }

    public function changePassword(){
        $username = $_POST['username'];
        $newPassword = $_POST['newPassword'];
        if($this->usersModel->changePassword($username, password_hash($newPassword, PASSWORD_DEFAULT))){
            echo "Successfully changed";
        }else{
            echo "Couldn't change password";
        }
        
    }

    public function isUserValid(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo json_encode($this->usersModel->isUserValid($username, $password));
    }

    
}