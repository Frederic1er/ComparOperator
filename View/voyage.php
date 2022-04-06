<?php

include '../Process/Autoload.php';
include '../Process/Connexion.php';
include '../View/Header.php';

?>
<div class="cards">
  <?php
  //Pour obtenir depuis la base de données
  $destination = new DestinationManager($pdo);
  $allDestinations = $destination->getListGroupByName();
  ?>
   <?php foreach ($allDestinations as $rowDestination){?>
  <div class=cartes>
 
    <div class="card" style="width: 18rem;">
    
    <img class="card-img-top" src="<?php echo $rowDestination->getImages()?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo 'Destination'." ".$rowDestination->getLocation(); ?></h5>
          
          <p class="card-text"><?php echo $rowDestination->getDescription ()?></p>
          <p class="card-text"><?php echo $rowDestination->getPrice ()?></p>
          <a class="btn btn-primary" href="/ComparOperator/View/ListTo.php?destination=<?=$rowDestination->getLocation()?>">Voir plus</a>
        </div>
    
  </div>
</div>
<div class="col-1"></div>
<?php  } ?>
</div>

<?php
    include '../View/Footer.php';
?>
