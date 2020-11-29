<?php

class ODD{
    private $id;
    private $name;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $c=>$v){
                $method = 'set'.ucfirst($c);
                if(method_exists($this,$method)){
                    $this->$method($v);
                }                   
            }
        }
            

    public function setId($id){
        $id = (int) $id;

        if($id>0){
            $this->id = $id;
        }
    }

    public function setName($name){
        if(is_string($name)){
            $this->name = $name;
        }
    }

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }


}