<?php

class TourOperator {

    private $id;
    private $name;
    private $link;
    private $grade_Count;
    private $grade_Total;
    private $is_Premium;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

  // Hydratation

    public function hydrate($donnees){
        foreach ($donnees as $key =>$value) {
        
            $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }
 
// Getter Setter

    public function getId (){
        return $this->id;
    }

    public function setId ($id){
        $this->id = $id;
    }

    public function getName (){
        return $this->name;
    }

    public function setName  ($name){
        $this->name = $name;
    }

    public function getLink (){
        return $this->link;
    }

    public function setLink ($link){
        $this->link = $link;
    }

    public function getGrade (){
        return $this->grade_Count;
    }

    public function setGrade ($grade_Count){
        $this->grade_Count = $grade_Count;
    }

    public function getgrade_Total(){
        return $this->grade_Total;
    }

    public function setgradeTotal($grade_Total){
        return $this->grade_Total = $grade_Total;
    }

    public function isIs_Premium (){
        return $this->is_Premium;
    }

    public function setIs_premium ($is_Premium){
        $this->is_Premium = $is_Premium;
    }
    
}
