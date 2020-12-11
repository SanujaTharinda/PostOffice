<?php

require_once APPROOT. "/libraries/services/RelationalDatabase.php";

class DatabaseMYSQL implements RelationalDatabase{

    private $host;
    private $user;
    private $password;
    private $dbName;

    private $dbHandler;
    private $statement;
    private $error;

    public function __construct(){
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->password = DB_PASS;
        $this->dbName = DB_NAME;

        $this->connectToDb();
    }

    
    
    public function query($sql){
        $this->statement = $this->dbHandler->prepare($sql);
    }
    
    public function bind($parameter, $value){
        $type = gettype($value);
        $type = $this->mapToPDOType($type);
        $this->statement->bindValue($parameter, $value, $type);
        
    }
    
    
    public function execute(){
        return $this->statement->execute();
    }
    
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
        
        
    }
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
        
    }
    
    public function rowCount(){
        return $this->statement->rowCount();
    }
    
    private function connectToDb(){
        try{
            $dsn = 'mysql:host='.$this->host.";dbname=".$this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->dbHandler = new PDO($dsn, $this->user, $this->password, $options);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    private function mapToPDOType($type){
        switch ($type){
            case 'integer':
                $type = PDO::PARAM_INT;
                break;
            case 'boolean':
                $type = PDO::PARAM_BOOL;
                break;
            case null:
                $type = PDO::PARAM_NULL;
            default:
                $type = PDO::PARAM_STR;
        }
        return $type;
    } 
}