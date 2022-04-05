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

<h3>Create a new TO :</h3>
<form action="Admin.php" method="post">
    <div class="labels">
        <label>* Name</label>
        <input type="text" name="name" placeholder="TripAwsome.." required>
    </div>
    <div class="labels">
        <label>* Grade</label>
        <input type="number" name="grade" min="0" max="5">
    </div>
    <div class="labels">
        <label>* link</label>
        <input type="text" name="link" placeholder="https://..." required>
    </div>
    <div class="labels">
        <label>* Premium</label>
        <input type="number" name="premium" min="0" max="1">
    </div>

    <input type="submit" id='submit' value='Submit'>

</form>

<!-- FORM 2 CREATE DESTI -->

<h3>Create a new destination :</h3>
<form action="Admin.php" method="post">
    <div class="labels">
        <label>* Location</label>
        <input type="text" name="location" placeholder="Venise.." required>
    </div>
    <select name="to">
            <option value="">choose a TO</option>

            <?php foreach ($allTourOp as $rowTourop){ ?>
                <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
            <?php } ?>
        </select>
    <div class="labels">
        <label>* Description</label>
        <input type="text" name="description" placeholder="Lorem Ipsum.." required>
    </div>
    <div class="labels">
        <label>* Price</label>
        <input type="text" name="price" placeholder="700$" required>
    </div>
    <div class="labels">
        <label>* Image</label>
        <input type="text" name="image" placeholder="/IMG/.." required>
    </div>

    <input type="submit" id='submit' value='Submit'>

</form>

<!-- FORM 3 CREATE ALL -->
<h3>Create a new Trip :</h3>

<form action="Admin.php" method="post" class="select">
                    
    <div class="labels">
        <label>* Location :</label>
    </div>
    <div class="rightTab">
        <select name="location">
            <option value="">Please choose a location</option>

            <?php foreach ($allDestinations as $rowDestination) { ?>

                <option value="<?=$rowDestination->getLocation()?>"><?=$rowDestination->getLocation()?></option>

            <?php } ?>
            
        </select>
    </div>     

    <div class="labels">
        <label >* TO :</label>
    </div>
    <div class="rightTab">
        <select name="to">
            <option value="">Please choose a TO</option>
            <?php foreach ($allTourOp as $rowTourOp) { ?>
                <option value="<?=intval($rowTourOp->getId())?>"><?=$rowTourOp->getName()?></option>

            <?php } ?>
        </select>
    </div>

    

    <div class="labels">
        <label for="price">* Price :</label>
    </div>
    <div class="rightTab">
        <input type="text" name="price" required placeholder="600$">
    </div> 
        <input type="submit" id='submit' value='Submit'>

</form>




<?php
    include 'Footer.php';
?>