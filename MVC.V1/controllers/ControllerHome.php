<?php

// Controlleur de la page Home, il prend en parametre ODDManager qui est lui meme permet d'instancier un tableau d'ODD
//Le controlleur est celui qui instancie la vue

require_once('views/View.php');

class ControllerHome{
    
    private $ODDManager;
    private $view;

    public function __construct($url){
        if(isset($url)&& count($url)>1){
            throw new Exception('Page introuvable');
        }
        else
            $this->ODD();
    }


    private function ODD(){
        $this->ODDManager = new ODDManager;
        $ODD = $this->ODDManager->getODD();

        $this->view = new View('Home');
        $this->view->generate(array('ODD'=>$ODD,));
    }
}