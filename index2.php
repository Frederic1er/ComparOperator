<?php

include __DIR__. '../Process/Autoload.php';

    require_once(__DIR__."../Process/Connexion.php");

    /* ADMIN */

    

    include  './View/Header.php';

    $destination = new DestinationManager($pdo);
    $allDestinations = $destinations->getListGroupByName();
  
    foreach ($allDestinations as $destinations)
?>

      <div class="Index2">
            <?php $allDestination = $destination->getListGroupByName($_GET['location']);?>
            <div class="title">
                  <h1><?=$_GET['location']?></h1>
                  <h2>A partir de <?= $allDestinations[0]->getPrice()?> Euros</h2> 
                  <h4>Liste des Operateurs proposant ce voyage</h4>
                  <img src=""> 
                  <?php foreach ($allDestination as $destinations){
                        $operator = $destinations->getLocation($destinations->getIdTourOperator()); ?>
                        <a href="detail_operator.php?to=<?=$operator->getId()?>">
                        <h3><?= $operator->getName()?></h3> </a>
                  
                  <?php } ?> 
            </div>   
      </div>

     <?php

include './Footer.php'?>
<br>


