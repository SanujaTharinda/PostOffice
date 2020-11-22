
<?php

class EmployeesModel extends Model{

    private $attendanceTable;
    private $logTable;
    private $dutyTable;
    private $employeeUserTable;
    private $mainUserTable;
    private $minorStaffTable;
    private $salaryTable;

    public function __construct($database){
        parent::__construct($database);
        $this->attendanceTable = TB_attendance;
        $this->logTable = TB_SYSTEM_LOG;
        $this->dutyTable = TB_duty;
        $this->employeeUserTable = TB_empUser;
        $this->mainUserTable = TB_mainUser;
        $this->minorStaffTable = TB_minor;
        $this->salaryTable = TB_salary;
    }

    public function getMinorStaffDetails(){
        return $this->databaseMapper->get($this->minorStaffTable, []);
    }

    private function getMaxId(){
        $idArray = $this->databaseMapper->get($this->logTable, ['MAX(id)']);
        return array_shift($idArray)->{'MAX(id)'};
    }

    private function getLoggedDay($dayId){
        $dateArray =  $this->databaseMapper->find($this->logTable, ['date'], 'id', $dayId);
        $date = array_shift($dateArray)->date;
        $loggedDay = null;
        if(isset($date)){
            $loggedDay = $date;
        }
        return $loggedDay;
    }


    public function getAttendance(){

        $lastLoggedDayId = $this->getMaxId();
        $lastLoggedDay = $this->getLoggedDay($lastLoggedDayId);
        $previousLoggedDay = $this->getLoggedDay($lastLoggedDayId - 1);
        $finalDayAttendance = $this->getAttendanceDay($lastLoggedDay);
        $previousDayAttendance = $this->getAttendanceDay($previousLoggedDay);
        $lastWeekAttendance = $this->getAttendanceLastWeek($lastLoggedDayId);

        return array($finalDayAttendance, $previousDayAttendance,$lastWeekAttendance );
    }

    public function deleteEmployee($id){
        return $this->databaseMapper->delete($this->minorStaffTable, 'id', $id);
    }

    
    public function getNameId(){
        return $this->databaseMapper->get($this->minorStaffTable, []);
    }
    
    public function searchDate($date){
        $this->databaseMapper->find($this->attendanceTable, [], 'date', $date);
    }
    
    public function getSalary($month){
        return $this->databaseMapper->get($this->salaryTable, []);
    }
    
    public function isMarked($date){
        $attendance = $this->searchDate($date);
        return count($attendance) > 0;
    }
    private function getAttendanceLastWeek($dayId){
        $present = 0;
        $absent = 0;
        for ($i = ($dayId - 7); $i <= $dayId; $i++) {
            $day =$this->getLoggedDay($i);
            $array = $this->getAttendanceDay($day);
            if(isset($array[$day]['present'])){
                $present = $present + $array[$day]['present'];
            }
            if(isset($array[$day]['absent'])){
                $absent = $absent + $array[$day]['absent'];
            }   
        }

        return array("last-week" => array("present" => $present, "absent" => $absent));
    }

    public function getAttendanceDay($day){
        $countArray = "Not-Marked";
        if(isset($day)){
            $data = $this->databaseMapper->find($this->attendanceTable, ['presence', 'date'], 'date', $day);
            $countArray = $this->getAttendanceCount($data);
        }
        return array($day => $countArray);

    }


    private function getAttendanceCount($data){
        $present = 0;
        $absent = 0;
        foreach($data as $row){
            $status = $row->presence;
            if($status == "Present"){
                $present = $present + 1;
            }elseif ($status == "Absent") {
                $absent = $absent + 1;
            }
        }

        $array = array("present" => $present, "absent" => $absent);
        return $array;
    }

    public function instantSearch($search){
        return $this->databaseMapper->findLike($this->minorStaffTable, [], 'full_name',$search);
    }

    // public function findUserByNIC($nic){

    //     $this->db->query("SELECT * FROM $this->minorStaff WHERE nic = :nic");
    //     $this->db->bind(':nic', $nic);
    //     $row = $this->db->single();
    //     return $this->db->rowCount() >  0;

       
    // }

    // public function addEmployee($data){
    //     $this->db->query("INSERT INTO $this->minorStaff(full_name,nic,address,telephone,gender,firstday,registered_day,permenent_day,carrier,reg) VALUES (:full_name,:nic,:address,:telephone,:gender,:firstday,:registered_day,:permenent_day,:carrier,:reg)");

    //     $this->db->bind(':full_name', $data['name']);
    //     $this->db->bind(':nic', $data['NIC']);
    //     $this->db->bind(':address', $data['Address']);
    //     $this->db->bind(':telephone', $data['Telephone']);
    //     $this->db->bind(':gender', $data['gender']);
    //     $this->db->bind(':firstday', $data['first_day']);
    //     $this->db->bind(':registered_day', $data['registered_day']);
    //     $this->db->bind(':permenent_day', $data['permenent_day']);
    //     $this->db->bind(':carrier', $data['carrier']);
    //     $this->db->bind(':reg', $data['reg']);

    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function searchEmployee($search){

    //     $this->db->query("SELECT * FROM $this->minorStaff WHERE nic LIKE '%$search%' OR full_name LIKE '%$search%'");

    //     $row = $this->db->resultSet();

    //     if($this->db->rowCount() >  0){

    //         return $row;
    //     }else{
    //         return false;
    //     }

    // }

    // public function findUserById($id){
    //     $this->db->query("SELECT * FROM $this->minorStaff WHERE id = :id");
    //     $this->db->bind(':id', $id);

    //     $row = $this->db->single();

    //     if($this->db->rowCount() >  0){
    //         return $row;
    //     }else{
    //         return false;
    //     }
    // }


    // public function editEmployee($data){
    //     $this->db->query("UPDATE $this->minorStaff SET full_name =:full_name,nic =:nic,address =:address,telephone =:telephone,gender =:gender,firstday =:firstday,registered_day =:registered_day,permenent_day =:permenent_day,carrier =:carrier,reg =:reg WHERE id =:id"); 

    //     $this->db->bind(':id', $data['id']);
    //     $this->db->bind(':full_name', $data['name']);
    //     $this->db->bind(':nic', $data['NIC']);
    //     $this->db->bind(':address', $data['Address']);
    //     $this->db->bind(':telephone', $data['Telephone']);
    //     $this->db->bind(':gender', $data['gender']);
    //     $this->db->bind(':firstday', $data['firstday']);
    //     $this->db->bind(':registered_day', $data['registered_day']);
    //     $this->db->bind(':permenent_day', $data['permenent_day']);
    //     $this->db->bind(':carrier', $data['carrier']);
    //     $this->db->bind(':reg', $data['reg']);

    //     return $this->db->execute();
    // }

    
    // public function markAttendance($list){
        
        
    //     for ($i=0; $i < sizeof($list[0]); $i++) { 
    //         $this->db->query("INSERT INTO $this->attendance(employee_id,full_name,presence,date) VALUES (:employee_id,:full_name,:presence,:date)");
            
    //         $this->db->bind(':employee_id', $list[0][$i]);
    //         $this->db->bind(':full_name', $list[1][$i]);
    //         $this->db->bind(':presence', $list[2][$i]);
    //         $this->db->bind(':date', date("Y.m.d"));
            
    //         if($this->db->execute()){
                
    //         }else{
    //             return false;
    //         }
    //     }
    //     return true;
        
    // }
}