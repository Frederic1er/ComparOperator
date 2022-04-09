<?php
include './../Process/Autoload.php';
require_once("./../Process/Connexion.php");
include 'Header.php';
?>

<div class="container">
    <?php
    $destinationLocation = $_GET['destinationLocation'];

    $tourOperatorManager = new TourOperatorManager($pdo);
    $destinationManger = new DestinationManager($pdo);
    $reviewManager = new ReviewManager($pdo);

    $allTourOperators = $tourOperatorManager->getList();

    if (isset($_POST['message'])) {
        $newreview = new Review(['author' => $_POST['author'], 'message' => $_POST['message']]);
        $newOperator = new TourOperator(['id' => $_POST['to']]);
        $reviewManager->addUnique($newreview, $newOperator);
    }

    if (isset($destinationLocation)) {
        $tourOperators = $tourOperatorManager->getTourOperatorsByDestinationLocation($destinationLocation);

        echo "<h1>" . $destinationLocation . "</h1>";
        foreach ($tourOperators as $tourOperator) {
            echo '<div>';
            $cheapestDestination = $destinationManger->getCheapestDestination($destinationLocation, $tourOperator->getId());
            $reviews = $reviewManager->getReviewsByTourOperator($tourOperator);
            echo $tourOperator->getName() . ' '  . $cheapestDestination->getPrice() . " " . "Euros" . " " . "avec pour note" . " " . $tourOperator->getGrade() . "/5";

            if ($tourOperator->getIs_Premium() == 1) {
                echo "<a href='{$tourOperator->getLink()}'>Website</a>";
            }
            echo '<br/><br/>';
            echo '<h3>Reviews</h3>';
            foreach ($reviews as $review) {
                echo "<br>" . $review->getAuthor() . " " . $review->getMessage() . "<br>";
            }
            echo '</div>';
        }
    }
    ?>
    <form method="post" action="./showDestination.php?destinationLocation=<?php echo $destinationLocation ?>">
        <label for="nom">Votre Nom:</label>
        <input type="text" name="author" required>
        <label for="message">Votre message:</label>
        <input type="text" name="message" required>

        <label>TO :</label>
        <select name="to">
            <option valudestinationse="">Choisissez un TO</option>
            <?php foreach ($tourOperators as $tourOperator) { ?>
                <option value="<?= intval($tourOperator->getId()) ?>"><?= $tourOperator->getName() ?></option>
            <?php } ?>
        </select>

        <button>Soumettre</button>
    </form>
</div>

<?php

include 'Footer.php';

?>