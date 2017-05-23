    <?php include('doctype.html'); ?> 
    <body>
            <?php include('menu.php'); ?>
            <?php 
            if (isset($articleAModifier)) { 
                include('formulaireActionModifier.php'); }
            else {
                include('formulaire.php');
            }
            ?>
            <?php if(isset($supprime)) {
                ?> 
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> Le commentaire vient d'être supprimé.
                </div>
            <?php } ?>
            <?php if(isset($ajoute)) {
                ?> 
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> L'article vient d'être creé.
                </div>
            <?php } ?>
            <div class="tabbable" id="tabs-895083">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-508380" data-toggle="tab">Articles</a>
                    </li>
                    <li>
                        <a href="#panel-707003" data-toggle="tab">Commentaires signalés</a>
                    </li>
                    <li>
                        <a href="#panel-707004" data-toggle="tab">Commentaires</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-508380">
                        <table class="table table-striped">
                            <tbody>
                            <thead>    
                            <tr>
                            <th>Auteur</th>
                            <th>Titre</th>
                            <th>Date d'ajout</th>
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
                    </div>
                    <div class="tab-pane" id="panel-707003">
                        <table class="table table-striped" id="comment_signaler">
                            <tbody>
                            <thead>    
                            <tr>
                            <th>Commentaires signalés</th>
                            <th>Action</th>
                            <th>Voir l'article</th>
                            <th>Nombres de signalements</th>
                            </tr>
                            </thead>      
                            <?php foreach ($commentairesSignales as $unCommentaire) { ?>
                            <tr>
                            <td><?php  echo htmlspecialchars($unCommentaire->contenu()); ?></td>
                            <td><a href="../controleur/verif/supprimerCommentaire.php?idCommentaire=<?php echo $unCommentaire->id() ?>">Supprimer</a></td>
                            <td><a href="../controleur/controleurArticle.php?idArticle=<?php echo $unCommentaire->idArticle() ?>">Lien vers l'article</a></td>
                            <td><?php echo $unCommentaire->signaler()?></td>
                            </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="panel-707004">
                        <table class="table table-striped" id="admin_coment">
                        <tbody>
                        <thead>    
                        <tr>
                        <th>Commentaires</th>
                        <th>Action</th>
                        <th>Voir l'article</th>
                        </tr>
                        </thead>      
                        <?php foreach ($commentaires as $unCommentaire) { ?>
                        <tr>
                        <td><?php  echo htmlspecialchars($unCommentaire->contenu()); ?></td>
                        <td><a href="../controleur/verif/supprimerCommentaire.php?idCommentaire=<?php echo $unCommentaire->id() ?>">Supprimer</a></td>
                        <td><a href="../controleur/controleurArticle.php?idArticle=<?php echo $unCommentaire->idArticle() ?>">Lien vers l'article</a></td>
                        </tr><?php } ?>
                        </tbody>
                        </table>
                        </div>
                </div>
            </div>
        
            <?php include('footer.php'); ?>
        </body>
        <script src="http://code.jquery.com/jquery-3.1.1.js" 
			  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        
</html>

    