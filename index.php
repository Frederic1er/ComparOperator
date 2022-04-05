<?php
  
    require_once("Process/Connexion.php");
    include 'Process/Autoload.php';
    include 'View/Header.php';

?>


<div class="cards">
  <?php
  //Pour obtenir depuis la base de données
  $destination = new DestinationManager($pdo);
  $allDestinations = $destination->getListGroupByName();
  ?>
   <?php foreach ($allDestinations as $rowDestination){?>
  <div class=cartes>
 
  <div class="row row-cols ">
            <div class="card" style="width: 20rem;">
    
    <img class="card-img-top" src="<?php echo $rowDestination->getImages()?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo 'Destination'." ".$rowDestination->getLocation(); ?></h5>
          
          <p class="card-text"><?php echo $rowDestination->getDescription ()?></p>
          <a class="btn btn-primary" href="View/ListTo.php?destination=<?=$rowDestination->getLocation()?>">Voir plus</a>
        </div>
    
  </div>
</div>
<div class="row row col 4"></div>
<?php  } ?>
</div>

<?php
    include 'View/Footer.php';
?>