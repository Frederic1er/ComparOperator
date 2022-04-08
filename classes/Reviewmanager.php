<?php

class ReviewManager
{

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function add(Review $review, TourOperator $tour_operator)
  {


    $q = $this->db->prepare('INSERT INTO reviews(message, author, id_tour_operator) VALUES(:message, :author, :id_tour_operator)');

    $q->bindValue(':message', $review->getMessage());
    $q->bindValue(':author', $review->getAuthor());
    $q->bindValue(':id_tour_operator', $tour_operator->getId());
    $q->execute();
    $review->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }






  public function getRevByTo(Review $review)
  {

    $q = $this->db->prepare('SELECT * FROM destinations WHERE id_tour_operator=?');


    $q->execute([$review->getId_Tour_Operator()]);
    $rev = $q->fetch(PDO::FETCH_ASSOC);
    $testi = new Review($rev);

    return $testi;
  }

  public function getReviewByTo($to)
  {

    $reviewCollection = [];

    $q = $this->db->prepare('SELECT * FROM reviews WHERE id_tour_operator=?');
    $q->execute([$to->getId()]);
    $reviews = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($reviews as $reviewArray) {
      array_push($reviewCollection, new Review($reviewArray));
    }

    return $reviewCollection;
  }
}
