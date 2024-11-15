<?php
require_once(__DIR__.'/../models/Oeuvre.php');

try {
    
    $oeuvres = Oeuvre::getAll();

} catch (Throwable $e) {
    $code= $e->getCode();
    if($code === 0) {
        $errormsg = "Impossible de se connecter à la base de données!";
    }
}


// views
include __DIR__.'/../views/composants/header.php';
include __DIR__.'/../views/'. (isset($errormsg) ? 'error' : 'list'). '.php';
include __DIR__.'/../views/composants/footer.php';