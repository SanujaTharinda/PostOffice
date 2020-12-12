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
            'leave_description'=>$_POST['leave_description']
           
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
            if($this->leaveModel->deleteLeaveType($id)){
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

}