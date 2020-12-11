<?php


require_once APPROOT .'/helpers/url_helper.php';

class OtManagementController extends Controller{
      
    private $dutyModel;

    public function __construct(){
        $this->dutyModel = $this->loadModel('DutyModel');
    }

    public function otManagement(){
        //$results=$this->dutyModel->getOtDetails();
       // $data=['results'=>$results];
        $this->view('dutyArrangement/otManagement');

    }

    public function viewOtDetails(){
        $data=$this->dutyModel->getOtDetails();
        echo json_encode ($data);
    }
    

    public function addOtPage(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[ 'name'=>trim($_POST['name']),
                'start_time'=>trim($_POST['start_time']),
                'end_time'=>trim($_POST['end_time'])
                ];

            if($this->dutyModel->addOt($data)){
                redirect('OtManagementController/otManagement');
            }
            
        }else{
            $data=[ 'name'=>'',
                'start_time'=>'',
                'end_time'=>'',
                 ];

            $this->view('dutyArrangement/addOt',$data);

        }

        
        
    }
    
    
}


?> 