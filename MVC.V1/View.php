<?php

class View{
    private $file;
    private $titre;

    public function __construct($action){
        $this->file = 'view'.$action.'.php';
    }

    public function generate($data){                                                                // Genere la vue


        $content = $this->generateFile($this->file,$data);                                           //Partie spécifique à la vue choisie
       
        $view = $this->generateFile('template.php',array('titre'=> $this->titre, 'content' => $content));   // Partie commune à toutes les vues

        echo $view;
    }

    private function generateFile($file,$data){                                                     //Genere le fichier vue et renvoie son résultat html
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;

            return ob_get_clean();
        }
        else{
            throw new Exception('Fichier '.$file.' introuvable');
        }
    }
}