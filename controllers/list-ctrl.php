<?php
require_once(__DIR__.'/../models/Oeuvre.php');

try {
    $oeuvres = Oeuvre::getAll();

} catch (Throwable $e) {
    // Handle errors
    $error = $e->getMessage();

    var_dump($error);

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__.'/../views/templates/footer.php';
    die;
}


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/list.php';
include __DIR__.'/../views/templates/footer.php';