<?php 

require_once(__DIR__.'/../models/Oeuvre.php');

session_start();

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

// on récupère les messages stockés dans la session.
if (isset($_SESSION['msg'])) {
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
}

if (isset($_SESSION['msg'])) {
    unset($_SESSION['msg']);
}

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($id)) {
    header('Location: index.php');
}

$oeuvre = Oeuvre::getOne($id);

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (is_null($oeuvre)) {
    header('Location: index.php');
}


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/detail.php';
include __DIR__.'/../views/templates/footer.php';
