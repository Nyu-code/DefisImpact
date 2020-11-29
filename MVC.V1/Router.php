<?php

require_once('View.php');

class Router{
    
    private $ctrl;
    private $view;


    public function routeReq(){
        try{
                spl_autoload_register(function($class){                                //Chargement automatique des classes
                    require_once($class.'.php');
                });

                $url = '';

                if(isset($_GET['url'])){
                    $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));    //On recupère l'url de la page avec un filtre sous forme de tableau

                    $controller = ucfirst(strtolower($url[0]));
                    $controllerClass = "Controller".$controller;
                    $controllerFile= $controllerClass.".php";

                    if(file_exists($controllerFile)){                           //On vérrifie si le fichier existe pour ensuite le require
                        require_once($controllerFile);
                        $this->ctrl = new $controllerClass($url);
                    }
                    else
                        throw new Exception('Page introuvable');
                }
                else{
                    require_once('ControllerHome.php');
                    $this->ctrl = new ControllerHome($url);
                }
        }
        catch(Exception $e){
            $errorMsg = $e->getMessage();
            $this->view = new View('Error');
            $this->view->generate(array('errorMsg' => $errorMsg));
        }
    }
}