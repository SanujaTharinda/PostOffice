

<?php 

require_once APPROOT .'/helpers/url_helper.php'; 


class NavbarController extends Controller{

    
    public function home(){
        session_start();
        $userType = $_SESSION['usertype'];
        redirect("HomeController/homePage/$userType");
    }

    public function about(){
        $this->view("home/about");
    }

    public function logout(){
        redirect("LoginController");
    }





}