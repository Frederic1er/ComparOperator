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
      $q->bindValue(':is_premium', $tourOperator->isIs_Premium());
      
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


}