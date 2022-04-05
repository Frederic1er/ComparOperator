<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    include 'Header.php';

    $destination = new DestinationManager($pdo);
    $allDestinations = $destination->getListGroupByName();

    $tourOp = new TourOperatorManager($pdo);
    $allTourOp = $tourOp->getList();

    /* IF FORM 1 */

    if (isset($_POST['link'])){

        $newTourOp = new TourOperator(['name'=>$_POST['name'], 'grade'=>$_POST['grade'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['premium']]);
        //var_dump($tourOp);
        $tourOp->add($newTourOp);
    }

    /* IF FORM 2 */

    if (isset($_POST['to'])){

        $newDestination = new Destination(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['to'], 'price'=>$_POST['price'], 'images'=>$_POST['image'], 'description'=>$_POST['description']]);
        $operator = new TourOperator(['id'=>$_POST['to']]);
        $destination->add($newDestination, $operator);
    
    }

    /* IF FORM 3 */

    if (isset($_POST['price'])){

        $newDestination = new Destination(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['to'], 'price'=>$_POST['price']]);
        $operator = new TourOperator(['id'=>$_POST['to']]);
        $destination->add($newDestination, $operator);
    
    }
    

?>

<!-- FORM 1 CREATE TO-->

<h3>Créer un TO :</h3>
<form action="Admin.php" method="post">
    <div class="labels">
        <label>* Nom</label>
        <input type="text" name="name" placeholder="TripAwsome.." required>
    </div>
    <div class="labels">
        <label>* Grade</label>
        <input type="number" name="grade" min="0" max="5">
    </div>
    <div class="labels">
        <label>* Liens</label>
        <input type="text" name="link" placeholder="https://..." required>
    </div>
    <div class="labels">
        <label>* Premium</label>
        <input type="number" name="premium" min="0" max="1">
    </div>

    <input type="submit" id='submit' value='Envoyer'>

</form>

<!-- FORM 2 CREATE DESTI -->

<h3>Créer une nouvelle destination :</h3>
<form action="Admin.php" method="post">
    <div class="labels">
        <label>* Lieux</label>
        <input type="text" name="location" placeholder="Venise.." required>
    </div>
    <select nom="to">
            <option value="">Choisir un TO</option>

            <?php foreach ($allTourOp as $rowTourop){ ?>
                <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
            <?php } ?>
        </select>
    <div class="labels">
        <label>* Description</label>
        <input type="text" name="description" placeholder="Lorem Ipsum.." required>
    </div>
    <div class="labels">
        <label>*Prix</label>
        <input type="text" name="price" placeholder="700$" required>
    </div>
    <div class="labels">
        <label>* Image</label>
        <input type="text" name="image" placeholder="/IMG/.." required>
    </div>

    <input type="submit" id='submit' value='Envoyer'>

</form>

<!-- FORM 3 CREATE ALL -->
<h3>Créer un nouveau voyage :</h3>

<form action="Admin.php" method="post" class="select">
                    
    <div class="labels">
        <label>* Lieux :</label>
    </div>
    <div class="rightTab">
        <select nom="location">
            <option value="">Choisissez un lieux</option>

            <?php foreach ($allDestinations as $rowDestination) { ?>

                <option value="<?=$rowDestination->getLocation()?>"><?=$rowDestination->getLocation()?></option>

            <?php } ?>
            
        </select>
    </div>     

    <div class="labels">
        <label >* TO :</label>
    </div>
    <div class="rightTab">
        <select nom="to">
            <option value="">Choisissez un TO</option>
            <?php foreach ($allTourOp as $rowTourOp) { ?>
                <option value="<?=intval($rowTourOp->getId())?>"><?=$rowTourOp->getName()?></option>

            <?php } ?>
        </select>
    </div>

    

    <div class="labels">
        <label for="price">* Prix :</label>
    </div>
    <div class="rightTab">
        <input type="text" name="price" required placeholder="600$">
    </div> 
        <input type="submit" id='submit' value='Envoyer'>

</form>




<?php
    include 'Footer.php';
?>