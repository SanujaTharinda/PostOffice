<?php

require_once APPROOT .'/models/LeaveModel.php';
require_once APPROOT .'/helpers/url_helper.php';

class LeaveManagementController extends Controller{
	private $leaveModel;

	public function __construct(){
        //$this->leaveModel = new Leave();
        $this->leaveModel = $this->loadModel("LeaveModel");
    }
	
/*    load views
*/	public function adminLeaveManagementDashboard(){
		$this->view("leavemanagement/leave_approve_panel");
	}

    public function addLeaveType(){
        $this->view("leavemanagement/leave_type_add");
    }

    public function addLeave(){
        $this->view("leavemanagement/leave_form");
    }

    public function leaveTypePanel(){
        $this->view("leavemanagement/leave_type_panel");
    }

/*    data functions
*/
	public function leaveDetails(){
        /*$data = $this->leaveModel->getLeaveDetails();*/
        $this->view("leavemanagement/leave_approve_panel", $data);
    }

    public function leaveTypeDetails(){
        
        $this->view("leavemanagement/leave_type_panel", $data);
        
    }

    public function getLeaveApproveDetails(){
        $data = $this->leaveModel->getLeaveDetails();
        echo json_encode($data);

    }

    public function getLeaveTypeDetails(){
        $data = $this->leaveModel->getLeaveTypes();
        echo json_encode($data);
        
    }

    public function submitLeave(){
        $data=[
            'employee_name'=>$_POST['name'],
            'employee_type'=>$_POST['employee_type'],
            'leave_from'=>$_POST['leave_from'],
            'leave_to'=>$_POST['leave_to'],
            'leave_description'=>$_POST['leave_description'],
            'leave_status'=>1
           
        ];
        $this->leaveModel->addLeave($data);
        $this->view("leavemanagement/leave_approve_panel");
    }

    public function submitLeaveType(){
            $data=[
                'leave_type'=>$_POST['leave_type'],
                ];

                $this->leaveModel->addLeaveType($data);
                $this->view("leavemanagement/leave_type_panel");         
    }

    public function deleteLeaveForm($id){
        $this->leaveModel->deleteLeave($id);
        $this->view('leavemanagement/leave_approve_panel');
    }
    
    public function deleteLeave($id){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if($this->leaveModel->deleteLeaveType($id[0])){
                $this->view('leavemanagement/leave_type_panel');
            }
        }

        /*$this->leaveModel->deleteLeaveType($id);
        $this->view('leavemanagement/leave_type_panel');*/
    }

    public function updateLeaveForm(){
        $id = $_POST['identity'];
        $value = $_POST['val'];
        $this->leaveModel->updateLeaveStatus($id,$value); 
    }

    public function editLeavePage($id){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            
            $data=[ 'id'=>array_shift($id),
                'leave_type'=>trim($_POST['leave_type']) ];

            if($this->leaveModel->editLeave($data)){
                redirect('LeaveManagementController/leaveTypePanel');
            }
            
        }else{

            $row=$this->leaveModel->getLeaveTypeById(array_shift($id));

            $data=[ 'id'=>array_shift($id),
                'leave_type'=>$row->leave_type ];

            $this->view('leavemanagement/leave_type_edit',$data);

        }    
    }

}
