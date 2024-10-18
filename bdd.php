<?php

require 'config.php';

try {
    // Utiliser les constantes définies pour créer une connexion PDO
    $pdo = new PDO(DSN, LOGIN, PASSWORD);

    // Définir le mode d'erreur PDO pour lever des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo "Erreur de connexion : " . $e->getMessage();
}

$sqlQuery = 'SELECT * FROM oeuvres';
$oeuvresStatement = $pdo->prepare($sqlQuery);
$oeuvresStatement->execute();
$oeuvres = $oeuvresStatement->fetchAll();

// var_dump($oeuvres);
