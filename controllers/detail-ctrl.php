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
    $errormsg = $e->getMessage();
}


// views
include __DIR__ . '/../views/composants/header.php';
include __DIR__ . '/../views/' . (isset($errormsg) ? 'error' : 'detail') . '.php';
include __DIR__ . '/../views/composants/footer.php';
