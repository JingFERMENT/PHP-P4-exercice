<?php 

require_once(__DIR__.'/../models/Oeuvre.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];

    // validation des données pour le titre
    // titre 
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($title)) {
        $error['title'] = 'Le titre est obligatoire.';
    } 

    // artiste
    $artiste = filter_input(INPUT_POST, 'artiste', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($artiste)) {
        $error['artiste'] = 'L\'auteur est obligatoire.';
    } 

    // description
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($description)) {
        $error['description'] = 'La description est obligatoire.';
    } else {
        if (strlen($description) < 3) {
            $error['description'] = 'Merci de donner une description qui fait au moins 3 caractères';
        }
    }

    // image
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL);
    if (empty($image)) {
        $error['image'] = 'L\'URL de l\'image est obligatoire.';
    }else {
        $isOk = filter_var($image, FILTER_VALIDATE_URL);
        if (!$isOk) {
            $error['image'] = 'Votre url pour image est invalide.';
        }
    }  

    // si tout est OK, enregistrement en base de données
    if(empty($error)){
        $oeuvreObj = new Oeuvre();
        $oeuvreObj->setImage($image);
        $oeuvreObj->setArtiste($artiste);
        $oeuvreObj->setDescription($description);
        $oeuvreObj->setTitle($title);

        $insertOeuvre = $oeuvreObj->insert();
       

       if($insertOeuvre){
            $msg = 'Votre œuvre a bien été ajouté.';
            $_SESSION['msg'] = $msg;
            // ajouter le dernier ID dans la base de donnée
            $id = Database::connect()->lastInsertId();
            header('Location: detail-ctrl.php?id='.$id);
            exit();
       } else {
            $msg = 'Erreur, la donnée n\'a pas été insérée. Veuillez réessayer.';
       }   
    }
}

// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/add.php';
include __DIR__.'/../views/templates/footer.php';

