<?php

require_once(__DIR__ . '/../models/Oeuvre.php');

session_start();

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    
    // on récupère les messages stockés dans la session.
    if (isset($_SESSION['msg'])) {
        $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    $oeuvre = Oeuvre::getOne($id);

} catch (\Throwable $e) {
    //throw $e;
    $error = $e->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}


// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/detail.php';
include __DIR__ . '/../views/templates/footer.php';
