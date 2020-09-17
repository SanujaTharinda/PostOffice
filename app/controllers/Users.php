<?php 

 require_once APPROOT .'/helpers/url_helper.php';
 require_once APPROOT .'/helpers/session_helper.php';

 class Users extends Controller{
     public function __construct(){
        $this->userModel = $this->loadModel('User');
     }

     public function index(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


            $data=[
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password'])
            ];

            $userEmail=$_POST['email'];
            $userPassword=$_POST['password'];

            if($userEmail == null || $userPassword == null) {
                echo "<script>alert('Please Enter Both Username and Password');
                window.location.href='index.php';
                </script>";
                return;
            }

            else{

                if($this->userModel->findUserByEmail($data['email'])){

                }else{
                    echo "<script>alert('User not found');
                        window.location.href='index.php';
                    </script>";
                    return;
                }


                $loggedInUser = $this->userModel ->login($data['email'],$data['password']);

                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                    $location;

                    switch (strtoupper($loggedInUser->usertype)){
                        case "ADMIN":
                            $location = "adminUserLogin";
                            break;
                        case "MAIN":
                            $location = "mainUserLogin";
                            break;
                        case "EMPLOYEE":
                            $location = "minorStaffLogin";
                            break;

                    }

                    redirect('pages/'.$location);

                }else{
                    echo "<script>alert('Username or Password Incorrect');
                        window.location.href='index.php';
                    </script>";
                    return;
                }
            }

        }else{
            $data=[
                 'email'=>'',
                 'password'=>'',
             ];

             $this->view('users/index',$data);
        }
     }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


            $data=[
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password'])
            ];

            $userEmail=$_POST['email'];
            $userPassword=$_POST['password'];

            if($userEmail == null || $userPassword == null) {
                echo "<script>alert('Please Enter Both Username and Password');
                window.location.href='login.php';
                </script>";
                return;
            }

            else{

                if($this->userModel->findUserByEmail($data['email'])){

                }else{
                    echo "<script>alert('User not found');
                        window.location.href='login.php';
                    </script>";
                    return;
                }


                $loggedInUser = $this->userModel ->login($data['email'],$data['password']);

                if($loggedInUser){
                   /* session_start();
                    $_SESSION = array();
                    $_SESSION["user_id"] = $userEmail;
                    $_SESSION["username"] = $userEmail;
                    $_SESSION["password"] = $userPassword;*/
                    $this->createUserSession($loggedInUser);
                    $location;

                    switch (strtoupper($loggedInUser->usertype)){
                        case "ADMIN":
                            $location = "adminUserLogin";
                            break;
                        case "MAIN":
                            $location = "mainUserLogin";
                            break;
                        case "EMPLOYEE":
                            $location = "minorStaffLogin";
                            break;

                    }

                   // $this->view('pages/'.$location,$data);
                    redirect('pages/'.$location);

                }else{
                    echo "<script>alert('Username or Password Incorrect');
                        window.location.href='login.php';
                    </script>";
                    return;
                }
            }

        }else{
            $data=[
                 'email'=>'',
                 'password'=>'',
             ];

             $this->view('users/login',$data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        //$_SESSION['user_name'] = $user->name;
       // redirect('pages');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        //unset($_SESSION['user_name']);
        unset($_SESSION['id']);
        session_destroy();
        redirect('users/index');
    }

 }