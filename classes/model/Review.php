<?php
class Review{
    
    
    protected  $id;
    protected  $message;
    protected  $author;
    protected $id_tour_operator;
    
   


    /* CONSTRUCT */

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees){
        foreach ($donnees as $key =>$value) {
        
            $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }

    public function getId (){
        return $this->id;
    }

    public function setId ($id){
        $this->id = $id;
    }


    public function getMessage (){
        return $this->message;
    }

    public function setMessage ($message){
        $this->message = $message;
    }
    public function getAuthor (){
        return $this->author;
    }

    public function setAuthor ($author){
        $this->author = $author;
    }


    public function getId_Tour_Operator (){
        return $this->id_tour_operator;
    }

    public function setId_Tour_Operator ($id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }
}