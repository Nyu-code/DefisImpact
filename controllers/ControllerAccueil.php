<?php
class ControllerAccueil {
    private $_ODD;
    private $_view;

    public function __contruct($url){
        if (isset($url)&&count($url)>1){
             throw new Exception('Page introuvable'); 
        }
        else {
            $this->ODD();
        }
    }
    private function ODD(){
        $this->_ODD = new ODD;
        $ODD = $this->_ODD->getODD();

        require_once('views/home.php');
    }
}