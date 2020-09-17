<?php

require_once APPROOT .'/helpers/url_helper.php';
require_once APPROOT .'/helpers/session_helper.php';

class Employees extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->employeeDetails = $this->loadModel('Employee');
        
    }

    public function index(){
        redirect('employees/searchEmployee');
    }

    public function convertNoTomonth($monthNum){
       	return date('F' , mktime(0,0,0,$monthNum,10));
    }

 
    public function addEmployee(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            if(isset($_REQUEST['gender'])){
                $gender=$_POST['gender'];
            }else{
                $gender="gender";
            }

            $data=[
                'name'=>$_POST['full_name'],
                'NIC'=>$_POST['nic'],
                'Address'=>$_POST['address'],
                'Telephone'=>$_POST['telephone'],
                'name_err'=>'',
                'NIC_err'=>'',
                'Address_err'=>'',
                'Telephone_err'=>'',

                'first_day'=>$_POST['year1']."-".$this->convertNoTomonth($_POST['month1'])."-".$_POST['day1'],
                'registered_day'=>$_POST['year2']."-".$this->convertNoTomonth($_POST['month2'])."-".$_POST['day2'],
                'permenent_day'=>$_POST['year3']."-".$this->convertNoTomonth($_POST['month3'])."-".$_POST['day3'],
                'carrier'=>$_POST['carrier'],
                'reg'=>$_POST['reg'],
                'gender'=>$gender

            ];

            if(empty($data['name'])){
                $data['name_err']='Please enter Full name';
            }else{

            }

            if(empty($data['NIC'])){
                $data['NIC_err']='Please enter National Identity Card Number';
            }else{

            }
         

            if(empty($data['Address'])){
                $data['Address_err']='Please enter Address';
            }else{

            }

            if(empty($data['Telephone'])){
                $data['Telephone_err']='Please enter Telephone Number';
            }else{

            }

            if(empty($data['name_err']) && empty($data['NIC_err']) && empty($data['Address_err']) && empty($data['Telephone_err'])){

                if($this->employeeDetails->findUserByNIC($data['NIC'])){
                	echo "<script>alert('Employee information already exists');
                        window.location.href='addEmployee';
                    </script>";
                    return;


                }else{
                   if($this->employeeDetails->addEmployee($data)){

                        $employee = $this->employeeDetails->getEmployee();
                        $data =[
                            'adding'=>'success',
                           'employee' => $employee
                        ];
                    
                
                        $this->view('pages/minorStaffDetails',$data);
                    }
                }
            }else{
                $this->view('employees/addEmployee',$data);
            }

        }else{
             $data=[
                 'name'=>'',
                 'NIC'=>'',
                 'Address'=>'',
                 'Telephone'=>'',
                 'name_err'=>'',
                 'NIC_err'=>'',
                 'Address_err'=>'',
                 'Telephone_err'=>''
             ];

             $this->view('employees/addEmployee',$data);
        }

    }

    public function searchEmployee(){

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



	    }else{
	    	$data =[
		    ];
	    }

    	$this->view('employees/searchEmployee',$data);
    }

    public function deleteEmployee($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data=[];

            if($this->employeeDetails->deleteEmployee($id[0])){
                redirect('pages/minorStaffDetails');
            }else{
                die('Something went wrong');
            }
        }
    }

    public function editEmployee($id){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'id'=>$id[0],
                'name'=>$_POST['full_name'],
                'NIC'=>$_POST['nic'],
                'Address'=>$_POST['address'],
                'Telephone'=>$_POST['telephone'],
                'gender'=>$_POST['gender'],
                'firstday'=>$_POST['first_day'],
                'registered_day'=>$_POST['registered_day'],
                'permenent_day'=>$_POST['permenent_day'],
                'carrier'=>$_POST['carrier'],
                'reg'=>$_POST['reg'],
                'name_err'=>'',
                'NIC_err'=>'',
                'Address_err'=>'',
                'Telephone_err'=>'',
                'gender_err'=>'',
                'first_day_err'=>'',
                'registered_day_err'=>'',
                'permenent_day_err'=>'',
                'carrier_err'=>'',
                'reg_err'=>''
            ];

            if(empty($data['name'])){
                $data['name_err']='Please enter Full name';
            }

            if(empty($data['NIC'])){
                $data['NIC_err']='Please enter National Identity Card Number';
            }

            if(empty($data['Address'])){
                $data['Address_err']='Please enter Address';
            }

            if(empty($data['Telephone'])){
                $data['Telephone_err']='Please enter Telephone Number';
            }

            if(empty($data['gender'])){
                $data['gender_err']='Please enter Gender';
            }

            if(empty($data['firstday'])){
                $data['first_day_err']='Please enter First day';
            }

            if(empty($data['permenent_day'])){
                $data['permenent_day_err']='Please enter Permenent day';
            }

            if(empty($data['registered_day'])){
                $data['registered_day_err']='Please enter Registered day';
            }

            if(empty($data ['carrier'])){
                $data['carrier_err']='Please enter Carrier';
            }

            if(empty($data['name_err']) && empty($data['NIC_err']) && empty($data['Address_err']) && empty($data['Telephone_err'])
                && empty($data['gender_err']) && empty($data['first_day_err']) && empty($data['permenent_day_err']) && empty($data['registered_day_err']) && empty($data['carrier_err'])){
    

                if($this->employeeDetails->editEmployee($data)){

                        $data=[];

                        redirect('pages/minorStaffDetails');
                }
            }else{

                $this->view('employees/editEmployee',$data);

            }


        }else{



            $result = $this->employeeDetails->findUserById($id[0]);
            $data =[
                'id'=>$result->id,
                'name'=>$result->full_name,
                'NIC'=>$result->nic,
                'Address'=>$result->address,
                'Telephone'=>$result->telephone,
                'gender'=>$result->gender,
                'firstday'=>$result->firstday,
                'registered_day'=>$result->registered_day,
                'permenent_day'=>$result->permenent_day,
                'carrier'=>$result->carrier,
                'reg'=>$result->reg,
                'name_err'=>'',
                'NIC_err'=>'',
                'Address_err'=>'',
                'Telephone_err'=>'',
                'gender_err'=>'',
                'first_day_err'=>'',
                'registered_day_err'=>'',
                'permenent_day_err'=>'',
                'carrier_err'=>'',
                'reg_err'=>''

            ];

             $this->view('employees/editEmployee',$data);

        }


    }
  

}


?>


