<!DOCTYPE html>
<html>
    <head>
        <title>tp6</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/css.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
  
    <body>
        <?php include('header.php'); ?>
        <form action="../controleur/verif/actionFormulaireArticle.php<?php if (isset($news)) { ?> ?id= <?php echo $news->id(); } ?>" method="post">
            <div class="form-group">           
                <label for="auteur" name="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="<?php if (isset($news)) echo $news->auteur(); ?>" placeholder="Auteur">
            </div>
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?php if (isset($news)) echo $news->titre(); ?>" placeholder="titre">
            </div>
            <div class="form-group">
                <label for="text">Texte</label>
                <textarea  class="tinymce" id="exampleTextarea" name="contenu" rows="3"><?php if (isset($news)) echo $news->contenu(); ?></textarea>
            </div>
           
            <input value="Ajouter" type="submit"  class="btn btn-primary" name="Ajouter">
            <?php if (isset($news)) { ?> <input value="Modifier" type="submit"  class="btn btn-primary" name="Modifier"> <?php } ?>
        </form>
            <table class="table table-striped">
                <tbody>
                    <thead>    
                        <tr>
                            <th>Auteur</th>
                            <th>Titre</th>
                            <th>Date d\'ajout</th>
                            <th>Denière modification</th>
                            <th>Action</th>
                        </tr>
                    </thead>      
                    <?php foreach ($articles as $unArticle) { ?>
                    <tr>
                        <td><?php  echo  htmlspecialchars($unArticle->auteur()); ?></td>
                        <td><?php  echo  htmlspecialchars($unArticle->titre()); ?></td>
                        <td><?php  echo  htmlspecialchars($unArticle->dateAjout()); ?></td>
                        <td><?php  echo  htmlspecialchars($unArticle->dateModif()); ?></td>
                        <td><a href="../controleur/controleurAdministration.php?idArticle=<?php echo  $unArticle->id() ?> ">Modifier</a> | <a href="../controleur/verif/supprimerArticle.php?id=<?php echo $unArticle->id() ?>">Supprimer</a></td>
                    </tr><?php } ?>
                </tbody>
            </table>
            <table class="table table-striped" id="comment_signaler">
                <tbody>
                    <thead>    
                        <tr>
                            <th>Commentaires signalés</th>
                            <th>Action</th>
                        </tr>
                    </thead>      
                    <?php foreach ($commentSignaler as $unComment) { ?>
                    <tr>
                        <td><?php  echo htmlspecialchars($unComment->contenu()); ?></td>
                        <td><a href="../controleur/verif/supprimerCommentaire.php?idCommentaire=<?php echo $unComment->id() ?>">Supprimer</a></td>
                    </tr><?php } ?>
                </tbody>
            </table>
            <table class="table table-striped" id="admin_coment">
                <tbody>
                  <thead>    
                        <tr>
                            <th>Commentaires</th>
                            <th>Action</th>
                        </tr>
                    </thead>      
                    <?php foreach ($comment as $unComment) { ?>
                    <tr>
                        <td><?php  echo htmlspecialchars($unComment->contenu()); ?></td>
                        <td><a href="../controleur/verif/supprimerCommentaire.php?idCommentaire=<?php echo $unComment->id() ?>">Supprimer</a></td>
                    </tr><?php } ?>
                </tbody>
            </table>
        </body>
        <script src="http://code.jquery.com/jquery-3.1.1.js" 
			  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
</html>

    