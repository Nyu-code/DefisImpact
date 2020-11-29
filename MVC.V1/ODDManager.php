<?php

class ODDManager extends BDD{
    private $tabODD;

    public function getODD(){
        $tab = $this->getAllODD(); //Créer les objets ODD
        
        foreach($tab as $data){
            $ODD[]= new ODD($data);
        }
        return $ODD;
    }
    

}