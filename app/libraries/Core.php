<?php

class Core{
    protected $currentController;
    protected $currentMethod;
    protected $parameters;

    private $urlArray;

    public function __construct($defaultController, $defaultMethod, $defaultParameters){
        //Setting default values
        $this->currentController = $defaultController;
        $this->currentMethod = $defaultMethod;
        $this->parameters = $defaultParameters;

        $this->urlArray = $this->getUrl();


        //Setting values from the URL
        $this->setController();
        $this->setCurrentMethod();
        $this->setParameters();

        call_user_func([$this->currentController, $this->currentMethod], $this->parameters);

    }

    private function setController(){
        $fileName = ucwords($this->urlArray[0]);
        $controllersLocation = CONTROLLERS_LOCATION;
        $fileFullName = $controllersLocation.$fileName.".php";


        if(file_exists($fileFullName)) {
            $this->currentController = $fileName;
            unset($this->urlArray[0]);
        }

        require_once $controllersLocation.$this->currentController.".php";
        $this->currentController = new $this->currentController;

    }

    private function setCurrentMethod(){
        if(!isset($this->urlArray[1]))
            return;

        $method = $this->urlArray[1];

        if(method_exists($this->currentController, $method)) {
            $this->currentMethod = $method;
            unset($this->urlArray[1]);
        }

    }

    private function setParameters(){
        $this->parameters = $this->urlArray ? array_values($this->urlArray) : [];
        
    }

    private function getUrl(){
        if(isset($_GET['url'])){
            //Triming the unnecessary / s.
            $url = rtrim($_GET['url'], '/');
            //Filtering as a URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //Getting the url as an array
            $urlArray = explode("/", $url);
            return $urlArray;

        }

    }













}