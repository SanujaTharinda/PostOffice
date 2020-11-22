<?php

    //Requre config file
    require_once 'config/config.php';

    require_once MODELS_LOCATION.'Model.php';

    //Require Libraries
    spl_autoload_register(function ($className){
       require_once APPROOT."/libraries/".$className.".php";

    });

