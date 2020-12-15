<?php 

require_once APPROOT .'/helpers/url_helper.php';
require_once APPROOT .'/helpers/session_helper.php';

class Pages extends Controller{

    
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/index');
        }
        $this->employeeDetails = $this->loadModel('Employee');
        
    }

    public function adminUserLogin(){ 
 
        $data =[
        ];

        $this->view('pages/adminUserLogin', $data);
    } 

    public function mainUserLogin(){ 
 
        $data =[
        ];

        $this->view('pages/mainUserLogin', $data);
    }

    public function minorStaffLogin(){ 
 
        $data =[
        ];

        $this->view('pages/minorStaffLogin', $data);
    }

    public function minorStaffDetails(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 
             $search = $_POST['find'];

             if(!empty($search)){
                  $result = $this->employeeDetails->searchEmployee($search);
                 if($result){
 
                     $data =[
                         'employee' => $result
                     ];

                 }else{
                     $data =[
                     ];
                 }
 
             }else{
                 $data=[
                 ];
             }

             $this->view('pages/minorStaffDetails',$data);
 
 
 
        }else{

            $employee = $this->employeeDetails->getEmployee();
            $data =[
               'employee' => $employee
            ];
            $this->view('pages/minorStaffDetails',$data);
        }
 

    }

    public function salary(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $month=$_POST['cmonth'];

            $data = $this->employeeDetails->getSalary($month);
    
            $this->view('pages/salaryView',$data);
        }else{
            $data=[];
            $this->view('pages/salary',$data);
        }

    }

    public function salaryView(){
        $this->view('pages/salaryView',$result);
    }

    public function attendance(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $list = array();
            $id =array();
            $name =array();
            $attendance = array();

            $employee = $this->employeeDetails->getNameId();
            $data =[
               'employee' => $employee
            ];

            for ($i=0; $i < sizeof($data['employee']); $i++) { 
                $id[$i] =$data['employee'][$i]->id;
                $name[$i] =$data['employee'][$i]->full_name;
                $attendance[$i] =$_POST["attendance_status".$data['employee'][$i]->id];
            }

            $list[0] =$id;
            $list[1] =$name;
            $list[2] =$attendance;

            date_default_timezone_set('Asia/Colombo'); 

            $date=date("Y.m.d");

            if(!$this->employeeDetails->isMarked($date)){
                $employee = $this->employeeDetails->markAttendance($list);
                unset($list);
                if($employee){
                    $employee = $this->employeeDetails->getNameId();
                    $data =[
                        'employee' => $employee,
                        'data'=> 'marked'
                     ];
                     $this->view('pages/attendance',$data);
                }else{
                    die('error');
                }
            }
            else{
                unset($list);
                $employee = $this->employeeDetails->getNameId();
                $data =[
                    'employee' => $employee,
                    'data'=> 'empty'
                 ];
                 $this->view('pages/attendance',$data);
            }
            
            
        }
        $employee = $this->employeeDetails->getNameId();
        $data =[
           'employee' => $employee,
           'data' =>$employee
        ];
        $this->view('pages/attendance',$data);
    }

    public function showAttendance(){ 

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $date=$_POST['start_date'];
            $new_date=str_replace("-",".",$date,$new_date);

            $result = $this->employeeDetails->searchDate($new_date);

            if($result){
                $data=[
                    'data'=>$result
                ];
                $this->view('pages/showAttendance',$data);
            }else{
                $data=[
                    'empty'=>'No attendance record'
                ];
                $this->view('pages/showAttendance',$data);
            }
        }else{
            $data=[];
            $this->view('pages/showAttendance',$data);
        }

     

    }

    /*public function show(){
        $connect = mysqli_connect("localhost", "root", "", "post_office");  
        $record_per_page = 5;  
        $page = '';  
        $output = '';  
        if(isset($_POST["page"]))  
        {  
            die('edafae');
            $page = $_POST["page"];  
        }  
        else  
        {  
            $page = 1;  
        }  
        $start_from = ($page - 1)*$record_per_page;  
        $query = "SELECT * FROM attendance ORDER BY employee_id
         DESC LIMIT $start_from, $record_per_page"; 

        $result = mysqli_query($connect, $query);  
        $output .= "  
            <table class='table table-bordered'>  
                <tr>  
                        <th width='50%'>Employee Id</th>  
                        <th width='50%'>Presence</th>  
                        <th width='50%'>Date</th> 
                </tr>  
        ";  
        while($row = mysqli_fetch_array($result))  
        {  
            $output .= '  
                <tr>  
                        <td>'.$row["employee_id"].'</td>  
                        <td>'.$row["presence"].'</td>  
                        <td>'.$row["date"].'</td> 
                </tr>  
            ';  
        }  
        $output .= '</table><br /><div align="center">';  
        $page_query = "SELECT * FROM attendance ORDER BY employee_id DESC";  
        $page_result = mysqli_query($connect, $page_query);  
        $total_records = mysqli_num_rows($page_result);  
        $total_pages = ceil($total_records/$record_per_page);  
        for($i=1; $i<=$total_pages; $i++)  
        {  
             $output .= "<span class='pagination_link' style='cursor:pointer;
             padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
        }  
        $output .= '</div><br /><br />';  

        $data=['data'=>$output];
        $this->view('pages/show',$data);
    }*/

}

