<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    include 'Header.php';

?>


<?php

    $test = new DestinationManager($pdo);

    if (isset($_GET['destination'])) {

       $arrayDestination = $test->getDestinationByLocation($_GET['destination']);
        echo "<h1>".$_GET['destination']."</h1>";
         
       foreach ($arrayDestination as $destination){ 
           $to =  $test->getDestibyTo($destination);
           var_dump($destination);
           ?>

            <div class="container card-list">
                <div class="row">
                    <div class="example-2 card1">
                        <div class="wrapper" style="background: url('<?=$destination->getImages()?>') 30% 1%; background-repeat: no-repeat; background-size: cover;">
                        
                        <!-- DIV COMMENTS + MODALE -->
                        <div class="date">
                            <div class="day1">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light btn-comment" data-idTour="<?=$to->getId()?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-comments"></i>
                                </button>
                            </div>
                        </div>
                            <!-- DIV PREMIUM BADGE -->
                            <div class="menu-content">
                                <span class="day">
                                    <!-- PREMIUM -->
                                    <?php if ($to->isIsPremium()==1){?>
                                    <a target="_blank" href="<?= $to->getLink()?>">
                                        <img border="0" alt="badg" src="../IMG/badge.png" width="100" height="100">
                                    </a>
                                <?php ; }?></span>
                            </div>
                            
                            <div class="data">
                                <div class="content">
                                    <h5 class="type"><?=$destination->getPrice() .' €'?></h5>
                                    <h1 class="title"><a><?=$to->getName()?></a></h1>
                                    <p class="card-text"><?=$to->getGrade().' / 5 ⭐'?></p>
                                    <p class="text"><?=$destination->getDescription()?></p>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
                        

       <?php }
    } ?>

                                    
        <!-- ***************************** BACK TO TOP BTN *********************************** -->
        <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>


        <!-- ************ DIV MODALE THAT GOES W/ THE BUTTON COMMENTS ************ -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Commentaires</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- AJAX POUR LES COMS DANS JS ET GETREVIEW -->
                </div>
                <div class="modal-footer">
                <img src="../IMG/note.png" style="width:9rem">
                    <h5>Ecrivez votre commentaire...</h5>
                    <form action="post" method="./View/ListTo.php">
                    <div class="labels">
                        <label>* Nom</label>
                        <input id="input-author" type="text" name="author" placeholder="Kaido" required>
                    </div>
                    <div class="labels">
                        <label>* Commentaires</label>
                        <input id="input-message" type="textarea" name="comment" placeholder="Roi des bêtes" required>
                    </div>
                    <div class="labels">
                        <label>* Note</label>
                        <input id="input-note" type="number" name="note" min="0" max="5" required>
                    </div>
                    <button class="btn btn-dark btn-form-review" id='submit' type="button">Soumettre</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
   


        

<?php

    include 'Footer.php';

?>