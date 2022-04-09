<?php


require_once(__DIR__ . '/Process/Connexion.php');
include __DIR__ . '/Process/Autoload.php';
include __DIR__ . '/View/Header.php';

$destination = new DestinationManager($pdo);
$allDestinations = $destination->getList();

/*
foreach ($allDestination as $destination) {
                  $operator = $manager->getLocation($destination->getIdTourOperator()); ?>
                  <a href="detail_operator.php?to=<?= $operator->getId() ?>">
                        <h3><?= $operator->getName() ?></h3>
                  </a>
}
*/
?>

<div class="Index2">
      <?php
      foreach ($allDestinations as $destination) {
      ?>
            <div class="title">
                  <h2>A partir de <?= $destination->getPrice() ?> Euros</h2>
                  <p><?= $destination->getDescription() ?></p>
                  <!--<img src="IMG/alger.jpg">-->
            </div>
      <?php
      }
      ?>

</div>

<?php

include './View/Footer.php'; ?>
<br>