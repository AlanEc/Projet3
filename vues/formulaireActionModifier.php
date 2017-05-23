<form class="formAdministration" action="../controleur/verif/ModifierArticle.php?id=<?php echo $articleAModifier->id();  ?>" method="post">
    <div class="form-group">           
        <label for="auteur" name="auteur">Auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?php echo $articleAModifier->auteur(); ?>" placeholder="Auteur">
    </div>
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $articleAModifier->titre(); ?>" placeholder="titre">
    </div>
    <div class="form-group">
        <label for="text">Texte</label>
        <textarea  class="tinymce" id="Textarea" name="contenu" rows="3"><?php echo $articleAModifier->contenu(); ?></textarea>
    </div>

    <input value="Modifier" type="submit"  class="btn btn-primary" name="Modifier"> 
</form>