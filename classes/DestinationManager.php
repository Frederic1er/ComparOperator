<?php

class DestinationManager
{

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function add(Destination $destination, TourOperator $tour_operator)
  {


    $q = $this->db->prepare('INSERT INTO destinations(location, price, images, description, id_tour_operator) VALUES(:location, :price, :images, :description, :id_tour_operator)');

    $q->bindValue(':location', $destination->getLocation());
    $q->bindValue(':price', $destination->getPrice());
    $q->bindValue(':images', $destination->getImages());
    $q->bindValue(':description', $destination->getDescription());
    $q->bindValue(':id_tour_operator', $tour_operator->getId());

    $q->execute();

    $destination->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }

  /* RECUPERER DESTI POUR LES AFFICHER */

  public function getList()
  {
    $desti = [];

    $q = $this->db->prepare('SELECT * FROM destinations');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      echo '<br>';
      array_push($desti, new Destination($donnees));
    }

    return $desti;
  }

  /* JOIN DESTINATIONS W/ TO */

  public function getDestibyTo(Destination $destination)
  {

    $q = $this->db->prepare('SELECT * FROM tour_operators WHERE id=?');


    $q->execute([$destination->getIdTourOperator()]);
    $To = $q->fetchAll(PDO::FETCH_ASSOC);
    $test = new TourOperator($To);

    return $test;
  }

  public function getDestinationByLocation($location)
  {

    $destinationCollection = [];

    $q = $this->db->prepare('SELECT * FROM destinations WHERE location=?');


    $q->execute([$location]);
    $destinations = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($destinations as $destinationArray) {
      array_push($destinationCollection, new Destination($destinationArray));
    }

    return $destinationCollection;
  }

  /* METHODE POUR PAS AVOIR DE DOUBLON */

  public function getListGroupByName()
  {

    $q = $this->db->prepare('SELECT location, images, description FROM destinations GROUP BY location, images, description');

    $destinations = [];

    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      array_push($destinations, new Destination($donnees));
    }
    return $destinations;
  }

  public function deleteDestination()
  {

    $q = $this->db->prepare('DELETE FROM membres WHERE `membres`.`id` = ? ');
  }
  /* AJOUTER INFO FORM SELECT */
}
