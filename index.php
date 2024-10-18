<?php
require_once 'header.php';
require_once 'bdd.php';

    $pdo = connexion();
    $sql = 'SELECT * FROM oeuvres';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $oeuvres = $sth->fetchAll();
?>


<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>