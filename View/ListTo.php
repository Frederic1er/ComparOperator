<?php
include './../Process/Autoload.php';
require_once("./../Process/Connexion.php");
include 'Header.php';
?>

<div class="container">
    <?php
    $test = new DestinationManager($pdo);
    $testi = new ReviewManager($pdo);
    $tourOp = new TourOperatorManager($pdo);
    if (isset($_GET['destination'])) {
        $arrayDestination = $test->getDestinationByLocation($_GET['destination']);

        echo "<h1>" . $_GET['destination'] . "</h1>";
        foreach ($arrayDestination as $destination) {
            $To =  $test->getDestibyTo($destination);
            $reviews =  $testi->getReviewByTo($To);
            echo $To->getName() . ' ' . $destination->getPrice() . " " . "Euros" . " " . "avec pour note" . " " . $To->getGrade() . "/5";
            foreach ($reviews as $review) {
                echo "<br>" . $To->getName() . " " . $review->getAuthor() . " " . $review->getMessage() . "<br>";
            }
        }
    }

    $allTourOp = $tourOp->getList();
    if (isset($_POST['message'])) {
        $newreview = new Review(['author' => $_POST['author'], 'message' => $_POST['message']]);
        $newOperator = new TourOperator(['id' => $_POST['to']]);
        $testi->add($newreview, $newOperator);
    } ?>

    <form method="post" action="./ListTo.php">
        <label for="nom">Votre Nom:</label>
        <input type="text" name="author" required>
        <label for="message">Votre message:</label>
        <input type="text" name="message" required>

        <label>TO :</label>
        <select name="to">
            <option value="">Choisissez un TO</option>
            <?php foreach ($allTourOp as $rowTourOp) { ?>
                <option value="<?= intval($rowTourOp->getId()) ?>"><?= $rowTourOp->getName() ?></option>

            <?php } ?>
        </select>

        <button>Soumettre</button>


    </form>
</div>

<?php

include 'Footer.php';

?>