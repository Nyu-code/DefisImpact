<?php

require_once('View.php');

class ControllerHome{
    
    private $ODDManager;
    private $view;

    public function __construct($url){   
            $this->ODD();
    }


    private function ODD(){
        $this->ODDManager = new ODDManager;
        $ODD = $this->ODDManager->getODD();

        $this->view = new View('Home');
        $this->view->generate(array('ODD'=>$ODD));
    }
}