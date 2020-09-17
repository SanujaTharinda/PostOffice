<?php


class HomeController extends Controller{




    public function __construct(){


    }


    public function homePage($pageName){
        $page = array_shift($pageName);
        $this->view("home/$page");

    }    


    













}