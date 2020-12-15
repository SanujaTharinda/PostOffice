<?php

require_once APPROOT .'/helpers/url_helper.php';

class AttendanceController extends Controller{
    private $employeeModel;


    public function __construct(){
        $this->employeeModel = $this->loadModel("EmployeesModel");
    }


    public function attendanceDashboard(){
        $this->view("attendance/attendanceDashboard");

    }

    public function getAttendance(){
        $columns = ['id','full_name'];
        $data = $this->employeeModel->getNameId($columns);
        echo json_encode($data);
    }

    public function getAttendanceDashboard(){
        $data = $this->employeeModel->getAttendance();
        echo json_encode ($data);
    }

    

    public function showAttendance(){   
        $this->view('attendance/showAttendance');
    }

    public function searchAttendance(){
        $date=$_POST['search'];
        $new_date=str_replace("-",".",$date,$new_date);
        $data = $this->employeeModel->searchDate($new_date);
        echo json_encode ($data);
        
    }

    public function markAttendance(){

        if($_SERVER['REQUEST_METHOD']=='POST'){    
            $columns = ['id','full_name'];
            $employee = $this->employeeModel->getNameId($columns);
            $newarray = json_decode(json_encode($employee), true);
         
            $newData = [];
            date_default_timezone_set('Asia/Colombo'); 
            $date=date("Y.m.d");

            for ($i=0; $i < sizeof($newarray); $i++) { 

                if(isset($_POST["status"."{$newarray[$i]['id']}"])){
                   $data = ['employee_id' => $newarray[$i]['id'],
                            'full_name' => $newarray[$i]['full_name'],
                            'presence' => $_POST["status"."{$newarray[$i]['id']}"],
                            'date' => $date
                           ];
                }
                else{
                   $data =['employee_id' => $newarray[$i]['id'],
                           'full_name' => $newarray[$i]['full_name'],
                           'presence' => 'Not Marked',
                           'date'=>$date
                          ];
                }
                array_push($newData, $data);
            }
            $this->employeeModel->markAttendance($newData);
            $isMarked ="";
            $this->markAttendanceView($isMarked);

        }else{
            $isMarked ="";
            $this->markAttendanceView($isMarked);

        }
    
    }

    public function markAttendanceView($isMarked){
        $data =[
            'data' =>$isMarked
        ];
        $this->view('attendance/markAttendance',$data);

    }

    public function markAttendanceDetails(){
        date_default_timezone_set('Asia/Colombo'); 
        $date=date("Y.m.d");
        if(!$this->employeeModel->isMarked($date)){
            $columns = ['id','full_name'];
            $data = $this->employeeModel->getNameId($columns);
            echo json_encode ($data);
        }
        else{
            $data=[];
            echo json_encode ($data);
        }

    }

    public function lateComesPage(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $columns = ['id','full_name','presence'];
            $newData = [];
            date_default_timezone_set('Asia/Colombo'); 
            $date=date("Y.m.d");

            $employee = $this->employeeModel->getLateComes($columns,$date);
            $newarray = json_decode(json_encode($employee), true);

            for ($i=0; $i < sizeof($newarray); $i++) { 
                if($newarray[$i]['presence'] == 'Not Marked'){
                   $data = ['id' => $newarray[$i]['id'],
                            'full_name' => $newarray[$i]['full_name'],
                            'presence' => $_POST["status"."{$newarray[$i]['id']}"],
                            'special_note' => $_POST['special_note'."{$newarray[$i]['id']}"]
                           ];
                }
                else {
                   $data =['id' => $newarray[$i]['id'],
                           'full_name' => $newarray[$i]['full_name'],
                           'special_note' => $_POST['special_note'."{$newarray[$i]['id']}"]
                          ];
                }
                array_push($newData, $data);
            }

            if($this->employeeModel->reMarkAttendance($newData)){
               $this->view('attendance/lateComes');
            }

        }
        else{
            $this->view('attendance/lateComes');
        }
       
    }

    public function lateComesDetails(){
        date_default_timezone_set('Asia/Colombo'); 
        $date=date("Y.m.d");
        $new_date=str_replace("-",".",$date,$new_date);
        $data = $this->employeeModel->searchDate($new_date);
        echo json_encode($data);

    }


}