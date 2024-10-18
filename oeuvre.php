<?php
    require 'header.php';
    require 'bdd.php';

    $pdo = connexion();

    $id = $_GET['id'];

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($id)) {
        header('Location: index.php');
    }

    // requête SQL pour chercher une oeuvre en particulier
    $sql = 'SELECT * FROM `oeuvres` WHERE id = :id; ';
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $oeuvre = $sth->fetch();

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
