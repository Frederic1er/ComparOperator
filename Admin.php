<?php

    

    include __DIR__. '../Process/Autoload.php';

    require_once(__DIR__."../Process/Connexion.php");

    /* ADMIN */

    

    include  './View/Header.php';

    

    $destination = new DestinationManager($pdo);
    $allDestinations = $destination->getListGroupByName();

    $destinationList = $destination->getList();

    $tourOp = new TourOperatorManager($pdo);
    $allTourOp = $tourOp->getList();




    /* IF FORM 1 */

    if (isset($_POST['link'])){

        $newTourOp = new TourOperator(['name'=>$_POST['name'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['premium']]);
        $tourOp->add($newTourOp);
    }

    /* IF FORM 2 */

    if (isset($_POST['to'])){

        $newDestination = new Destination(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['to'], 'price'=>$_POST['price'], 'img'=>$_POST['image'], 'description'=>$_POST['description']]);
        $operator = new TourOperator(['id'=>$_POST['to']]);
        $destination->add($newDestination, $operator);
    
    }

    /* IF FORM 3 */

    if (isset($_POST['price2'])){

        $newDestination = $destination->getOneBy($_POST['location']);
        $newDestination->setPrice($_POST['price2']);
        $operator = new TourOperator(['id'=>$_POST['to2']]);
        $destination->add($newDestination, $operator);
    
    }

    /* IF FORM 4 DELETE */

    if (isset($_POST['deletedestination'])){
        $newdestination = new Destination(['id'=>$_POST['deletedestination']]);
        $destination->DeleteDestination($newdestination);     
            
    }
            
    if (isset($_POST['deleteto'])){
        $operator = new TourOperator(['id'=>$_POST['deleteto']]);
        $tourOp->DeleteTO($operator);
                    
    }

    /* IF FORM 5 UPDATE */

    if (isset($_POST['premium'])){
        $premium = new TourOperator(['id'=>$_POST['PreTO'], 'is_premium'=>$_POST['premium']]);
        $tourOp->UpdateTO($premium);
                    
                
    }
    

?>

<!-- FORM 1 CREATE TO-->
<div class="container forms-admin">
    <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="./IMG/to.png" border="0">
                        <h2 class="text-center">Nouveau Tour Operateur</h2>

                        <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="./Admin.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" name="name" placeholder="Nom TO" class="form-control"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="link" placeholder="Lien" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="number" name="premium" min="0" max="1" placeholder="Premium" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM 2 CREATE DESTI -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="./IMG/laptop.png" border="0">
                        <h2 class="text-center">Nouvelle destination</h2>

                        <form id="register-form2" role="form" autocomplete="off" class="form" action="./Admin.php" method="post">
                            <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" class="form-control" type="text" name="location" placeholder="Lieux" required>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="sel1" name="to">
                                        <option selected="true" disabled="disabled">Choisissez un TO</option>
                                        <?php foreach ($allTourOp as $rowTourop){ ?>
                                            <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="description" placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="price" placeholder="Prix $" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="image" placeholder="/IMG/" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END ROW 1 -->

    <!-- FORM 3 CREATE ALL -->
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-md-offset-4">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="./IMG/trip.png" border="0">
                        <h2 class="text-center">Nouveau Voyage</h2>

                        <form id="register-form3" role="form" action="./Admin.php" method="post" class="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="sel1" name="location">
                                        <option selected="true" disabled="disabled">Choisissez un lieux</option>
                                        <?php foreach ($allDestinations as $rowDestination) { ?>

                                            <option value="<?=$rowDestination->getLocation()?>"><?=$rowDestination->getLocation()?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="sel1" name="to2">
                                        <option selected="true" disabled="disabled">Choisissez un TO</option>
                                        <?php foreach ($allTourOp as $rowTourop){ ?>
                                            <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="price2" placeholder="Prix $" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    

        <!-- FORM 4 DELETE -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="./IMG/trip.png" border="0">
                        <h2 class="text-center">Supprimer un TO ou Voyage</h2>

                        <form id="register-form3" role="form" action="./Admin.php" method="post" class="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="deletedestination" class="form-control" id="sel1">
                                        <option selected="true" disabled="disabled">Choisissez un lieux s'il vous plait</option>

                                        <?php foreach ($destinationList as $rowDestination) { ?>

                                            <option value="<?= $rowDestination->getId()?>"><?=$destination->getDestibyTo($rowDestination)->getName()?> : <?=$rowDestination->getLocation()?></option>

                                        <?php } ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="deleteto" class="form-control" id="sel1">
                                        <option selected="true" disabled="disabled">Choisissez un TO s'il vous plait</option>
                                        <?php foreach ($allTourOp as $rowTourop){ ?>
                                            <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- END ROW 2 -->

    <div class="row d-flex justify-content-center">

        <!-- FORM 5 UPDATE -->
        <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="./IMG/update.png" border="0">
                            <h2 class="text-center">Passez un TO Premium</h2>

                            <form id="register-form3" role="form" action="Admin.php" method="post" class="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select name="PreTO" class="form-control" id="sel1">
                                            <option selected="true" disabled="disabled">Choisissez un TO s'il vous plait</option>

                                            <?php foreach ($allTourOp as $rowTourop){ ?>
                                                <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?><?=" ".$rowTourop->isIsPremium()?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <select name="premium" class="form-control" id="sel1">
                                            <option selected="true" disabled="disabled">Choisissez une valeur</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget" type="submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- END CONTAINER -->


<!-- ***************************** BACK TO TOP BTN *********************************** -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>




<?php

    include './View/Footer.php';

?>