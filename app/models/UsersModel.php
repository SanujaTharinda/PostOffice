<?php 

class UsersModel extends Model{
    private $usersTable;

    public function __construct($database){
        parent::__construct($database);
        $this->usersTable = TB_USERLOG;
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
        if(isset($user)) {
            return true;
        }
        return false;
    }

    public function getUserType($email){
       return $this->findUser('email', $email, ['usertype'])->usertype; 
    }

}