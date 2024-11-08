<?php
require_once(__DIR__.'/../models/Oeuvre.php');

try {
    
    $oeuvres = Oeuvre::getAll();

} catch (Throwable $e) {
    // Handle errors 
    if (get_class($e) === 'PDOException') {
        $errormsg = "La connexion des bases de données a été échouée.";
    }

   

    // include __DIR__ . '/../views/templates/header.php';
    // include __DIR__ . '/../views/templates/error.php';
    // include __DIR__.'/../views/templates/footer.php';
    // die;
}


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/'. (isset($errormsg) ? 'error' : 'list'). '.php';
include __DIR__.'/../views/templates/footer.php';