<?php

class TourOperatorManager
{

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  //
  /*
    recupere les tours operateurs en fonction de la localisation de la destination
    Parameters
      * [String] localisation de destination
    Return
      * [Array] Tableau de TourOperator
  */
  public function getTourOperatorsByDestinationLocation(String $destinationLocation)
  {
    // 'GROUP BY' is used to avoid multiple times of same tour operator
    // 'INNER JOIN' because we search on 2 different tables
    $q = $this->db->prepare('SELECT tour_operators.* FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator=tour_operators.id WHERE destinations.location=? GROUP BY tour_operators.id');

    $q->execute([$destinationLocation]);
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    $tourOperators = [];
    foreach ($res as $toData) {
      array_push($tourOperators, new TourOperator($toData));
    }
    return $tourOperators;
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
  /*
    recupere la liste des tours operateurs 
    Parameters
    Return
      * [Array] Tableau de TourOperator
  */
  public function getList()
  {
    $tourOperators = [];

    $q = $this->db->prepare('SELECT * FROM tour_operators');

    $q->execute();
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $tourOperatorsData) {
      array_push($tourOperators, new TourOperator($tourOperatorsData));
    }

    return $tourOperators;
  }



  public function DeleteTO(TourOperator $tour_operator)
  {
    $q = $this->db->prepare('DELETE  FROM tour_operators WHERE id= :id');
    $q->bindValue(':id', $tour_operator->getId());
    $q->execute();
  }

  /* METHODE POUR UPDATE UN TO PREMIUM OU PAS */

  public function UpdateTO(TourOperator $tour_operator)
  {
    $q = $this->db->prepare('UPDATE tour_operators  SET is_premium=:is_premium WHERE id= :id');
    $q->bindValue(':id', $tour_operator->getId());
    $q->bindValue(':is_premium', $tour_operator->isIsPremium());
    $q->execute();
  }
}
