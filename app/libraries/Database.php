<?php

require_once APPROOT."/libraries/services/DatabaseMYSQL.php";

class Database{
    private static $database;

    private function __construct(){}

    public static function getDatabase(){
        $database = self::$database;
        if(is_null($database)){
            $database = new DatabaseMYSQL();
        }
        return $database;
    }
}