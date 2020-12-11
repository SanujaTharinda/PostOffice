<?php

//require_once APPROOT .'/models/Leave.php';
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
            'ename'=>$_POST['name'],
            'etype'=>$_POST['employee_type'],
            'leave_from'=>$_POST['leave_from'],
            'leave_to'=>$_POST['leave_to'],
            'description'=>$_POST['leave_description']
           
        ];
        $this->leaveModel->addLeave($data);
        $this->view("leavemanagement/leave_approve_panel");
    }

    public function submitLeaveType(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data=[
                'ltype'=>$_POST['leave_type'],
                ];
/*                $data = $_POST['leave_type'];
*/
                $this->leaveModel->addLeaveType($data);
                $this->view("leavemanagement/leave_type_panel");  
        }else{
            $this->view("leavemanagement/leave_type_add");
        }          
    }

    public function deleteLeaveForm($id){
        $this->leaveModel->deleteLeave($id);
        $this->view('leavemanagement/leave_approve_panel');
    }
    
    public function deleteLeave($id){
        $this->leaveModel->deleteLeaveType($id);
        $this->view('leavemanagement/leave_type_panel');
    }

    public function updateLeaveForm(){
        $id = $_POST['identity'];
        $value = $_POST['val'];
        $this->leaveModel->updateLeaveStatus($id,$value); 
    }

}