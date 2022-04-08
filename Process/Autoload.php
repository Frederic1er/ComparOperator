<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=comparoperator', "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    print "erreur !: " . $e->getMessage() . "<br>";
    die();
}
