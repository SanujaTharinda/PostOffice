<?php require_once APPROOT .'/config/config.php'; ?>
<?php 
     class Employee{
         private $db;
         private $sth;
         private $attendance;
         private $log;
         private $duty;
         private $empUser;
         private $mainUser;
         private $minorStaff;
         private $salary;

         public function __construct(){
            $this->db = new Database;
            $this->attendance = TB_attendance;
            $this->log = TB_SYSTEM_LOG;
            $this->duty = TB_duty;
            $this->empUser = TB_empUser;
            $this->mainUser = TB_mainUser;
            $this->minorStaff = TB_minor;
            $this->salary = TB_salary;
         }

         public function getMinorStaffDetails(){
            $this->db->query("SELECT * FROM $this->minorStaff");
            $row = $this->db->resultSet();
            return $row;
         }

         private function getMaxId(){
            $this->db->query("SELECT MAX(id) FROM $this->log");
            $lastLogged = (array)$this->db->single();
            return (int)(array_shift($lastLogged));
         }

         private function getLoggedDay($dayId){
            $this->db->query("SELECT date FROM $this->log WHERE id=:dayid");
            $this->db->bind(":dayid", $dayId);
            $this->db->execute();
            $loggedDay = null;
            if(isset($this->db->single()->date)){
                $loggedDay = $this->db->single()->date;
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

         private function getAttendanceLastWeek($dayId){
            $present = 0;
            $absent = 0;
            for ($i = ($dayId - 7); $i <= $dayId; $i++) {
                $this->db->query("SELECT date FROM $this->log WHERE id=:lastid");
                $this->db->bind(":lastid", $i);
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
                $this->db->query("SELECT presence,date FROM $this->attendance WHERE date = :thisday");
                $this->db->bind(":thisday", $day);
                $this->db->execute();
                $data = $this->db->resultSet();
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
            $this->db->query("SELECT * FROM miner_staff WHERE nic LIKE '%$search%' OR full_name LIKE '%$search%'");
            $this->db->execute();
            $row = $this->db->resultSet();
            return $row;

        }

        public function findUserByNIC($nic){

            $this->db->query("SELECT * FROM $this->minorStaff WHERE nic = :nic");
            $this->db->bind(':nic', $nic);
            $row = $this->db->single();
            if($this->db->rowCount() >  0){
                return true;
            }else{
                return false;
            }
        }

        public function addEmployee($data){
            $this->db->query("INSERT INTO $this->minorStaff(full_name,nic,address,telephone,gender,firstday,registered_day,permenent_day,carrier,reg) VALUES (:full_name,:nic,:address,:telephone,:gender,:firstday,:registered_day,:permenent_day,:carrier,:reg)");

            $this->db->bind(':full_name', $data['name']);
            $this->db->bind(':nic', $data['NIC']);
            $this->db->bind(':address', $data['Address']);
            $this->db->bind(':telephone', $data['Telephone']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':firstday', $data['first_day']);
            $this->db->bind(':registered_day', $data['registered_day']);
            $this->db->bind(':permenent_day', $data['permenent_day']);
            $this->db->bind(':carrier', $data['carrier']);
            $this->db->bind(':reg', $data['reg']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function searchEmployee($search){

            $this->db->query("SELECT * FROM $this->minorStaff WHERE nic LIKE '%$search%' OR full_name LIKE '%$search%'");

            $row = $this->db->resultSet();

            if($this->db->rowCount() >  0){
  
                return $row;
            }else{
                return false;
            }

        }

        public function findUserById($id){
            $this->db->query("SELECT * FROM $this->minorStaff WHERE id = :id");
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            if($this->db->rowCount() >  0){
                return $row;
            }else{
                return false;
            }
        }


        public function editEmployee($data){
            $this->db->query("UPDATE $this->minorStaff SET full_name =:full_name,nic =:nic,address =:address,telephone =:telephone,gender =:gender,firstday =:firstday,registered_day =:registered_day,permenent_day =:permenent_day,carrier =:carrier,reg =:reg WHERE id =:id"); 

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':full_name', $data['name']);
            $this->db->bind(':nic', $data['NIC']);
            $this->db->bind(':address', $data['Address']);
            $this->db->bind(':telephone', $data['Telephone']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':firstday', $data['firstday']);
            $this->db->bind(':registered_day', $data['registered_day']);
            $this->db->bind(':permenent_day', $data['permenent_day']);
            $this->db->bind(':carrier', $data['carrier']);
            $this->db->bind(':reg', $data['reg']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteEmployee($id){
            $this->db->query("DELETE FROM $this->minorStaff WHERE id = :id");

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        
        public function getNameId(){

            $this->db->query("SELECT * FROM $this->minorStaff");

           $row = $this->db->resultSet();

           if($this->db->rowCount() >  0){
 
               return $row;
           }else{
               return false;
           }
            
        }

        public function isMarked($date){
            $this->db->query("SELECT * FROM $this->attendance WHERE date = :date");

            $this->db->bind(':date', $date);

            $row = $this->db->resultSet();

            if($this->db->rowCount() >  0){
  
                return true;
            }else{
                return false;
            }
        }

        public function markAttendance($list){


            for ($i=0; $i < sizeof($list[0]); $i++) { 
                $this->db->query("INSERT INTO $this->attendance(employee_id,full_name,presence,date) VALUES (:employee_id,:full_name,:presence,:date)");

                $this->db->bind(':employee_id', $list[0][$i]);
                $this->db->bind(':full_name', $list[1][$i]);
                $this->db->bind(':presence', $list[2][$i]);
                $this->db->bind(':date', date("Y.m.d"));

                if($this->db->execute()){
                    
                }else{
                    return false;
                }
            }
            return true;

        }

        public function searchDate($date){
            $this->db->query("SELECT * FROM $this->attendance WHERE date = :date");

            $this->db->bind(':date', $date);

            $row = $this->db->resultSet();

            if($this->db->rowCount() >  0){
  
                return $row;
            }else{
                return false;
            }
        }

        public function getSalary($month){

            $this->db->query("SELECT * FROM $this->salary");

            $row = $this->db->resultSet();

            if($this->db->rowCount() >  0){
  
                return $row;
            }else{
                return false;
            }
        }

     }