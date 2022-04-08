<?php

<<<<<<< HEAD
require_once('./Process/Connexion.php');
include './Process/Autoload.php';
include './View/Header.php';
=======
require_once (__DIR__.'/Process/Connexion.php');
    include './Process/Autoload.php';
    include './View/Header.php';
>>>>>>> 3418f17f71450e884daa9dd0844f9da07cc51990

$destination = new DestinationManager($pdo);
$allDestinations = $destination->getListGroupByName();
?>

<div class="Index2">
      <?php $allDestination = $destinationManager->getListGroupByName($_GET['location']); ?>
      <div class="title">
            <h1><?= $_GET['location'] ?></h1>
            <h2>A partir de <?= $allDestination[0]->getPrice() ?> Euros</h2>
            <h4>Liste des Operateurs proposant ce voyage</h4>
            <img src="asset/pngwing.com.png">
            <?php foreach ($allDestination as $destination) {
                  $operator = $manager->getLocation($destination->getIdTourOperator()); ?>
                  <a href="detail_operator.php?to=<?= $operator->getId() ?>">
                        <h3><?= $operator->getName() ?></h3>
                  </a>

            <?php } ?>
      </div>
</div>

<?php

include 'partials/footer.php' ?>
<br>