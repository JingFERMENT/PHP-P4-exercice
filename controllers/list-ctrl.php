<?php
require_once(__DIR__.'/../models/Oeuvre.php');

try {
    
    $oeuvres = Oeuvre::getAll();

} catch (Throwable $e) {
    $errormsg = $e->getMessage();
    // include __DIR__ . '/../views/templates/header.php';
    // include __DIR__ . '/../views/templates/error.php';
    // include __DIR__.'/../views/templates/footer.php';
    // die;
}


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/'. (isset($errormsg) ? 'error' : 'list'). '.php';
include __DIR__.'/../views/templates/footer.php';