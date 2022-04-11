<?php

class TourOperatorManager {

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

    public function add(TourOperator $tourOperator)
    {
      
      $q = $this->db->prepare('INSERT INTO tour_operators(name, link, grade, is_premium) VALUES(:name, :link, :grade, :is_premium)');
      
      $q->bindValue(':name', $tourOperator->getName());
      $q->bindValue(':link', $tourOperator->getLink());
      $q->bindValue(':grade', $tourOperator->getGrade());
      $q->bindValue(':is_premium', $tourOperator->isIsPremium());
      
      $q->execute();
      
      $tourOperator->hydrate([
        'id' => $this->db->lastInsertId()
      ]);
    }

    public function getList()
    {
        $tourop = [];

        $q = $this->db->prepare('SELECT tour_operators.* FROM `tour_operators`');
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          
            array_push($tourop,new TourOperator($donnees));

        }

        return $tourop;
    }
    public function getMoyenne (TourOperator $tour_operator){
      $q = $this->db->prepare('SELECT AVG (note) FROM reviews WHERE id_tour_operator =?');
      $q->execute([intval($tour_operator->getId())]);
      $moyenne = $q->fetch(PDO::FETCH_BOTH);
  
      return $moyenne[0];
  }
  
    public function addGrade(TourOperator $tour_operator){
      $q = $this->db->prepare('UPDATE tour_operators SET grade = :grade WHERE id = :id');
  
      $q->bindValue(':grade', $this->getMoyenne($tour_operator));
      $q->bindValue(':id', ($tour_operator->getId()));
      $q->execute();
  
      $tour_operator->hydrate([
          'grade'=>$this->getMoyenne($tour_operator)
      ]);
    }
    public function DeleteTO(TourOperator $tour_operator){
      $q= $this->db->prepare('DELETE  FROM tour_operators WHERE id= :id');
      $q->bindValue(':id', $tour_operator->getId());
      $q->execute();
    }
  
    /* METHODE POUR UPDATE UN TO PREMIUM OU PAS */
  
    public function UpdateTO(TourOperator $tour_operator){
      $q= $this->db->prepare('UPDATE tour_operators  SET is_premium=:is_premium WHERE id= :id');
      $q->bindValue(':id', $tour_operator->getId());
      $q->bindValue(':is_premium', $tour_operator->isIsPremium ());
      $q->execute();
    }

}