<?php 

require_once(__DIR__.'/../models/Oeuvre.php');
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];
        // validation des données pour le titre
        // titre 
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(empty($title)) {
            $error['title'] = 'Le titre est obligatoire.';
        } 

        // author
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(empty($author)) {
            $error['author'] = 'L\'auteur est obligatoire.';
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
        $imageLink = filter_input(INPUT_POST, 'image_link', FILTER_SANITIZE_URL);
        if (empty($imageLink)) {
            $error['imageLink'] = 'L\'URL de l\'image est obligatoire.';
        }else {
            $isOk = filter_var($imageLink, FILTER_VALIDATE_URL);
            if (!$isOk) {
                $error['imageLink'] = 'Votre url pour image est invalide.';
            }
        }  

        // vérifier s'il y a des doublons d'oeuvre
          $existDuplicate = Oeuvre::Exist($title, $author);
         
          if ($existDuplicate) {
              $error['duplicate'] = 'Cette oeuvre existe déjà.';
          } 
    
        // si tout est OK, enregistrement en base de données
        if(empty($error)){
            $oeuvreObj = new Oeuvre();
            $oeuvreObj->setImageLink($imageLink);
            $oeuvreObj->setAuthor($author);
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
                $errormsg = 'Erreur, l\'oeuvre n\'a pas été inséré. Veuillez réessayer.';
           }   
        }
    }
} catch (Throwable $e) {
    // Handle errors
    $errormsg = $e->getMessage();
}

// views
include __DIR__.'/../views/composants/header.php';
include __DIR__.'/../views/' . (isset($errormsg) ? 'error' : 'add').'.php';
include __DIR__.'/../views/composants/footer.php';

