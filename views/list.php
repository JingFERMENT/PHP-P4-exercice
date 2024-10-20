<div id="liste-oeuvres">
    <?php 
    // Loop through each item in the $oeuvres array
    foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="detail-ctrl.php?id=<?= $oeuvre['id'] ?>">
                <?php if($oeuvre['id'] <= 15) { ?>
                    <img src="/public/assets/<?=$oeuvre['image_link']?>" alt="<?= $oeuvre['title'] ?>">
                <?php }else{?>
                    <img src="<?=$oeuvre['image_link']?>" alt="<?= $oeuvre['title'] ?>">
                <?php } ?> 
                <h2><?= $oeuvre['title'] ?></h2>
                <p class="description"><?= $oeuvre['author'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>