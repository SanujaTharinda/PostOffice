<?php

    //Requre config file
    require_once 'config/config.php';

    //Require Libraries
    spl_autoload_register(function ($className){
       require_once APPROOT."/libraries/".$className.".php";

    });

