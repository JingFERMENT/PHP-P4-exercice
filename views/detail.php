<!-- détail d'une oeuvre -->
<span class="text-success"><?= $msg ?? '' ?></span>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
    <?php if($oeuvre['id'] <= 15) { ?>
                    <img src="/public/assets/<?=$oeuvre['image']?>" alt="<?= $oeuvre['title'] ?>">
                <?php }else{?>
                    <img src="<?=$oeuvre['image']?>" alt="<?= $oeuvre['title'] ?>">
                <?php } ?>
        
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>