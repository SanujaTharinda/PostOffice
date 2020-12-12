<?php


require_once APPROOT .'/helpers/url_helper.php';

class DutyArrangementController extends Controller{
      
    private $dutyModel;

    public function __construct(){
        $this->dutyModel = $this->loadModel('DutyModel');
    }

    public function dutyArrangement(){

        //$results=$this->dutyModel->getDutyDetails();
        //$data=['results'=>$results];
        $this->view('dutyArrangement/dutyDetails');
    }

    public function viewDutyDetails(){
        $data=$this->dutyModel->getDutyDetails();
        echo json_encode ($data);
    }

    
    public function addDutyPage(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            
            $data=[ 'name'=>trim($_POST['name']),
                'start_time'=>trim($_POST['start_time']),
                'end_time'=>trim($_POST['end_time']),
                'duty'=>trim($_POST['duty']) ];

            if($this->dutyModel->addDuty($data)){
                redirect('DutyArrangementController/dutyArrangement');
            }
            
        }else{
            $data=[ 'name'=>'',
                'start_time'=>'',
                'end_time'=>'',
                'duty'=>'' ];

            $this->view('dutyArrangement/addDuty',$data);

        }
    
    }

    public function editDutyPage($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            
            $data=[ 'id'=>array_shift($id),
                'name'=>trim($_POST['name']),
                'start_time'=>trim($_POST['start_time']),
                'end_time'=>trim($_POST['end_time']),
                'duty'=>trim($_POST['duty']) ];

            if($this->dutyModel->updateDuty($data)){
                redirect('DutyArrangementController/dutyArrangement');
            }
            
        }else{

            $row=$this->dutyModel->getDutyById(array_shift($id));

            $data=[ 'id'=>array_shift($id),
                'name'=>$row->name,
                'start_time'=>$row->start_time,
                'end_time'=>$row->end_time,
                'duty'=>$row->duty ];
            $this->view('dutyArrangement/editDuty',$data);

        }
    
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if($this->dutyModel->deleteDuty($id[0])){
                redirect('DutyArrangementController/dutyArrangement');
            }
        }else{
            redirect('DutyArrangementController/dutyArrangement');
        }
    }
    
    
}


?> 