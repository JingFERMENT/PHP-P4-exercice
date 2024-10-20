<form action="" method="POST" novalidate>
    <span class="text-danger"><?= $error['duplicate'] ?? '' ?></span>
    <div class="champ-formulaire">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title" value ="<?=$title ?? ''?>" required>
        <span class="text-danger"><?= $error['title'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="author">Auteur de l'œuvre</label>
        <input type="text" name="author" id="author" value ="<?=$author ?? ''?>" required>
        <span class="text-danger"><?= $error['author'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="image_link">URL de l'image</label>
        <input type="url" name="image_link" id="image_link" pattern="https://.*" value ="<?=$imageLink ?? ''?>"required>
        <span class="text-danger"><?= $error['imageLink'] ?? '' ?></span>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description" minlength="3" required><?=$description ?? ''?></textarea>
        <span class="text-danger"><?= $error['description'] ?? '' ?></span>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

