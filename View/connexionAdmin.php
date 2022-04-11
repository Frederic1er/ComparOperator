<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");



    include 'Header.php';

?>


<div class="container forms-admin">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="./IMG/admin.png" border="0">
                        <h2 class="text-center">Connect to access </h2>

                        <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="/Process/sessionStart.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" name="pseudoAdmin" placeholder="Name" class="form-control"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="password" name="password" placeholder="password" required>
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
    </div>
</div>


<?php include 'Footer.php';
    