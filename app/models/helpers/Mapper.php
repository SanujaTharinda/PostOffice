<?php




interface Mapper {

    public function get($tableName, $columns);
    public function find($tableName, $columns, $key, $value);
    public function findLike($tableName, $columns, $key, $value);
    public function insert($tableName,$values);
    public function delete($tableName, $key, $value);
    public function update($tableName, $setters, $key, $value);
    
}