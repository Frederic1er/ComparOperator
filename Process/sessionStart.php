<?php
session_start();


include 'Autoload.php';
require_once("Connexion.php");



if (isset($_POST['pseudoAdmin']) &&  isset($_POST['password']))
{
    $admin = new Admin([
        'password'=>$_POST['password'],
        'admin'=>$_POST['pseudoAdmin']
    ]);
    $adminManager = new AdminManager($pdo);

    $adminManager->connect($admin);


    if ($admin->getId()) {
        $_SESSION['admin']=$_POST['pseudoAdmin'];
        $_SESSION['password']=$_POST['password'];
        
        header('Location: /View/Admin.php');
    }else
    {
        header('Location: /index.php');
    }

}