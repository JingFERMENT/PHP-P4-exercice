<form action="" method="POST" novalidate>
    <div class="champ-formulaire">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title" value ="<?=$title ?? ''?>" required>
        <span class="text-danger"><?= $error['title'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" value ="<?=$artiste ?? ''?>" required>
        <span class="text-danger"><?= $error['artiste'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image" pattern="https://.*" value ="<?=$image ?? ''?>"required>
        <span class="text-danger"><?= $error['image'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description" minlength="3" required><?=$description ?? ''?></textarea>
        <span class="text-danger"><?= $error['description'] ?? '' ?></span>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

