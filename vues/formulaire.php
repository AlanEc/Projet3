<form class="formAdministration" action="../controleur/verif/AjouterArticle.php" method="post">
    <div class="form-group">           
        <label for="auteur" name="auteur">Auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="" placeholder="Auteur" required>
    </div>
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="" placeholder="titre" required>
    </div>
    <div class="form-group">
        <label for="text">Texte</label>
        <textarea class="tinymce" id="Textarea" name="contenu" rows="3"></textarea>
    </div>
    <input value="Ajouter" type="submit"  class="btn btn-primary" name="Ajouter">
</form>