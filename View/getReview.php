<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    $reviewManager = new ReviewManager($pdo);

    $tourOp = new TourOperator(['id'=>intval($_POST['idTO'])]);

    $reviews = $reviewManager->getList($tourOp);

?>

    <div class="box-review" id="<?=$tourOp->getId()?>">

    <?php foreach ($reviews as $review) { ?>
        
        <div>
            <h3><?=$review->getAuthor()?> :</h3>
            <p><?=$review->getMessage()?></p>
            <p><?=$review->getNote().'⭐'?></p>
        </div>

<?php } ?>
    

    </div>
