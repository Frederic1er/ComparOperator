<?php

require_once('./Process/Connexion.php');
include './Process/Autoload.php';
include './View/Header.php';

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