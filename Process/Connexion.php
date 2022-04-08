<?php

function loadClass($classe)
{
  require_once __DIR__ . '/../classes/' .
    $classe . '.php';
}

spl_autoload_register('loadClass'); 
// Enregistrement de la fonction en autoload pour qu'elle soit appelée dès qu'on instancie une classe non déclarée.