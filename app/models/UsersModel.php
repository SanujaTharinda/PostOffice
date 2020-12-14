<?php 
class UsersModel extends Model{
    private $usersTable;
    private $mainUserTable;
    private $employeeUserTable;

    public function __construct($database){
        parent::__construct($database);
        $this->usersTable = TB_USERLOG;
        $this->mainUserTable=TB_mainUser;
        $this->employeeUserTable=TB_empUser;
    }

    public function isUserValid($email,$password){
        $isValid = false;
        $user = $this->findUser('email', $email, ['password']);
        if(isset($user) and isset($user->password)){
            if($password == $user->password)
            $isValid = true;
        }
        return $isValid;   
    }
    
    public function findUser($key, $value, $columns){
        $user = $this->databaseMapper->find($this->usersTable, $columns, $key, $value);
        return array_shift($user);
    }

    public function getUsersLikeEmailList($email){
       return $this->databaseMapper->findLike($this->usersTable,['email'],'email', $email);
    }

    public function userExists($email){
        $user =  $this->findUser('email', $email, ['email']);
        return isset($user);
    }

    public function changeUsername($oldUsername, $newUsername){
        return $this->databaseMapper->update($this->usersTable,['email'=>$newUsername ], 'email',$oldUsername);
        

    }

    public function changePassword($username, $newPassword){
        return $this->databaseMapper->update($this->usersTable,['password'=>$newPassword ], 'email',$username);
        

    }

    public function getUserType($email){
       return $this->findUser('email', $email, ['usertype'])->usertype; 
    }

    
    public function findMainUserById($key, $value, $columns){
        return ($this->databaseMapper->find($this->mainUserTable,$columns, $key, $value));
    }
    
    public function deleteUser($email){
        return $this->databaseMapper->delete($this->usersTable, 'email', $email);
    }
    
    public function editMainUser($data, $id){
        return ($this->databaseMapper->update($this->mainUserTable,$data, 'id', $id));
    }
    
    public function addUser($data){
        return $this->databaseMapper->insert($this->usersTable, $data);
    }
    
    public function addMainUser($data){
        return $this->databaseMapper->insert($this->mainUserTable, $data);
    }
    
    public function deleteMainUser($email){
        return $this->databaseMapper->delete($this->mainUserTable, 'email', $email);
    }
    
    public function getMainUsersDetails(){
        return $this->databaseMapper->get($this->mainUserTable,[]);
    }
    public function getEmployeeUserDetails(){
        return $this->databaseMapper->get($this->employeeUserTable,[]);
    }
    
    public function findEmployeeUserById($key, $value, $columns){
        return ($this->databaseMapper->find($this->employeeUserTable,$columns, $key, $value));
    }

    public function addEmployeeUser($data){
        return $this->databaseMapper->insert($this->employeeUserTable,$data);
    }

    public function editEmployeeUser($data, $id){
        return ($this->databaseMapper->update($this->employeeUserTable,$data, 'id', $id));
    }

    public function deleteEmployeeUser($email){
        return $this->databaseMapper->delete($this->employeeUserTable, 'email', $email);
    }

    public function getEmailFromEUTable($key, $value, $columns){
        $userTableData = $this->databaseMapper->find($this->employeeUserTable,$columns, $key, $value);
        $newarray = $this->createArray($userTableData);
        $loginTableId = $this->databaseMapper->find($this->usersTable,$columns, 'email', $newarray['email']);
        $finalArray = $this->createArray($loginTableId);
        return $finalArray['id'];
    }

    public function getEmailFromMUTable($key, $value, $columns){
        $userTableData = $this->databaseMapper->find($this->mainUserTable,$columns, $key, $value);
        $newarray = $this->createArray($userTableData);
        $loginTableId = $this->databaseMapper->find($this->usersTable,$columns, 'email', $newarray['email']);
        $finalArray = $this->createArray($loginTableId);
        return $finalArray['id'];
    }

    public function createArray($data){
        $newarray = array_shift($data);
        return json_decode(json_encode($newarray), true);
    }

    public function editUser($data, $id){
        return ($this->databaseMapper->update($this->usersTable,$data, 'id', $id));
    }

}