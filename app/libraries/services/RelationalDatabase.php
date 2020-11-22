<?php

interface RelationalDatabase{
    
    public function query($sql);
    public function bind($parameter, $value);
    public function execute();
    public function resultSet();
    public function single();
    public function rowCount();

}