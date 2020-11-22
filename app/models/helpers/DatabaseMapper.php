<?php

require_once MODELS_LOCATION.'helpers/Mapper.php';

class DatabaseMapper implements Mapper{
    private $database;


    public function __construct($database){
        $this->database = $database;
    }

    public function get($tableName, $columns){
        $columns = $this->getColumns($columns);
        $sql = "SELECT {$columns} FROM $tableName";
        $this->database->query($sql);
        return $this->database->resultSet();
    }


    public function find($tableName, $columns, $key, $value){
        $columns = $this->getColumns($columns);
        $sql = "SELECT {$columns} FROM $tableName WHERE $key = :value";
        $this->database->query($sql);
        $this->database->bind(':value', $value);
        $this->database->execute();
        return $this->database->resultSet();
     
    }

    public function findLike($tableName, $columns, $key, $value){
        $columns = $this->getColumns($columns);
        $sql = "SELECT {$columns} FROM $tableName WHERE $key REGEXP :value";
        $this->database->query($sql);
        $this->database->bind(':value', "^{$value}");
        $this->database->execute();
        return $this->database->resultSet();  
    }

    public function insert($tableName, $columns, $values){
        $columns = $this->getColumns($columns);
        $keys = $this->generateKeys($values);
        $sql = "INSERT INTO $tableName ({$columns}) VALUES ({$keys})";
        $this->database->query($sql);
        $this->bind($values);
        return $this->database->execute();
        
    }

    public function delete($tableName, $key, $value){
        $sql = "DELETE FROM $tableName WHERE $key = :value";
        $this->database->query($sql);
        $this->database->bind(':value', $value);
        return $this->database->execute();

    }

    public function update($tableName, $setters, $key, $value){
        $setters = $this->getSetters($setters);
        $sql = "UPDATE $tableName SET {$setters} WHERE $key =:value";
        $this->database->query($sql);
        $this->database->bind(':value', $value);
        return $this->database->execute();
    }

    private function getSetters($array){
        $setters = '';
        foreach($array as $key => $value){
            $setters = $setters . " {$key} = '{$value}',";
        }
        return chop($setters,",");
    }
      
    private function bind($values){
        for ($i = 0; $i < count($values); $i++) {
            $this->database->bind(":value{$i}", $values[$i]);
        }
    }

    private function generateKeys($values){
        $valuesCount = count($values);
        $keys = ':value0';
        for ($i = 1; $i < $valuesCount; $i++) {
            $keys = $keys . ",:value{$i}";
        }
        return $keys;
    
    }
    
    private function getColumns($columns){
        if(empty($columns)){
            return "*";
        }
        $columnsRequired = '';
        foreach ($columns as $column) {
            $columnsRequired  = $columnsRequired . $column;
        }
        return $columnsRequired;
    }
    
}