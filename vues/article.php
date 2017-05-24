<?php include('doctype.html'); ?> 
<?php include('menu.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron" id="jumbotronArticle">
                <p>Par <?php  echo ($article->auteur()), ' le ',  $article->dateAjout() ;  ?></p>
                <h2><?php  echo htmlspecialchars($article->titre());  ?></h2>
                <p><?php  echo ($article->contenu());  ?></p>
            </div>
            <?php if(isset($signale)) {
                ?> 
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Merci!</strong> Le commentaire vient d'être signalé.
                </div>
            <?php } ?>
            <?php if(isset($commentaireAjoute)) {
            ?> 
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Merci!</strong> Vous venez d'ajouer un commentaire.
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form id="comment" action="../controleur/verif/ajouterCommentaire.php?idArticle=<?php echo $id ?>" method="post">
                <div class="form-group">
                    <label for="auteur" name="auteur">Auteur</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value="" placeholder="Auteur" required>
                </div>
                <div class="form-group">
                    <label for="text">Texte</label>
                    <textarea class="form-control" id="Textarea" name="contenu" value=""  rows="3" required></textarea>
                </div>
                <input value="Commenter" type="submit"  class="btn btn-primary" name="ajouterCommentaire">
            </form>  
        </div>
    </div>  
    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header">Commentaires</h2>
            <section class="comment-list">
                <?php foreach ($commentaires as $unCommentaire) { ?>
                <article class="niveau">
                 <?php include('commentaire.php'); ?>
                </article>
                 <?php foreach ($unCommentaire->reponses() as $unCommentaire) { ?>
                <article class="niveau1">
                  <?php include('commentaire.php'); ?> 
                </article>
                <?php foreach ($unCommentaire->reponses() as $unCommentaire) { ?>
                <article class="niveau2">
                  <?php include('commentaire.php'); ?>
                </article>
                <?php foreach ($unCommentaire->reponses() as $unCommentaire) { ?>
                <article class="niveau3">
                  <?php include('commentaire.php'); ?>
                </article>
                <?php } } } }?>
            </section>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script src="../js/reponse.js"></script>
