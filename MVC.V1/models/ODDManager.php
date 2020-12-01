<?php

//Cette classe sert à gerer les odds, là la seule methode disponible sert juste à renvoyer un tableau des odd


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