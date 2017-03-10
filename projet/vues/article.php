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
        <div id="bloc-page">    
            <p>Par <?php  echo htmlspecialchars($article->auteur()), ' le ',  $article->dateAjout() ;  ?></p>
            <p><?php  echo htmlspecialchars($article->titre());  ?></p>
            <p><?php  echo  htmlspecialchars($article->contenu());  ?></p>
            <form id="comment" action="../controleur/verif/ajouterCommentaire.php" method="post">
                <div class="form-group">
                    <label for="auteur" name="auteur">Auteur</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value="" placeholder="Auteur" required>
                </div>
                <div class="form-group">
                    <label for="text">Texte</label>
                    <textarea class="form-control" id="exampleTextarea" name="contenu" value=""  rows="3" required></textarea>
                </div>
                <input value="Commenter" type="submit"  class="btn btn-primary" name="ajouterCommentaire">
            </form>    
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <h2 class="page-header">Comments</h2>
                    <section class="comment-list">
                      <!-- First Comment -->
                             <?php foreach ($commentaires as $unCommentaire) {
                            ?>
                      <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                          <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                            <figcaption class="text-center"><?php  echo $unCommentaire->auteur(); ?></figcaption>
                          </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                          <div class="panel panel-default arrow left">
                            <div class="panel-body">
                              <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i><?php echo htmlspecialchars($unCommentaire->auteur()); ?></div>
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                              </header>
                              <div class="comment-post">
                                <p>
                                   <?php echo htmlspecialchars($unCommentaire->contenu()); ?>
                                </p>
                              </div>
                              <p class="text-right"><a href="../controleur/verif/signalerCommentaire.php?id=<?php echo  $unCommentaire->id()?>">Signaler</a>
                              <button  class="btn btn-default btn-sm" onclick="toggleForm(<?php echo $unCommentaire->id()?>)"><i class="fa fa-reply"></i>Répondre</button>
                              </p>
                            <form style="display: none " id="formulaire-<?php echo $unCommentaire->id(); ?>" method="POST" action="../controleur/verif/ajouterReponse.php?idReponse=<?php echo $unCommentaire->id(); ?>">
                                <input type="text" class="form-control"  name="auteur" value="" placeholder="Auteur"><br/>
                                <textarea class="form-control" class="exampleTextarea" name="contenu" value=""  rows="3"></textarea><br/>
                                <input value="Envoyer" type="submit"  class="btn btn-primary" name="ajouterReponse">
                            </form>
                          </div>
                        </div>
                    </div>
               </article>
               <?php $id = $unCommentaire->id(); 
$reponses = $CommentaireManager->getReponses($id); 
               foreach ($reponses as $uneReponse) { ?>
               <article class="row">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                          <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                            <figcaption class="text-center"><?php  echo $uneReponse->auteur(); ?></figcaption>
                          </figure>
                        </div>
                        <div class="col-md-9 col-sm-9">
                          <div class="panel panel-default arrow left">
                            <div class="panel-heading right">Reply</div>
                            <div class="panel-body">
                              <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i><?php  echo $uneReponse->auteur(); ?></div>
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                              </header>
                              <div class="comment-post">
                                <p>
                                    <?php  echo $uneReponse->contenu(); ?>
                                </p>
                              </div>
                              <p class="text-right"><?php echo '<a href="../controleur/verif/signalerCommentaire.php?id=' . $uneReponse->id()  . '">Signaler</a>' ?>s
                              </p>
                            </div>
                          </div>
                        </div>
                      </article>
                      <?php } } ?>
                    </section>
                  </div>
                </div>
            </div>
        </div>
        <script src="../js/reponse.js"></script>
    </body>
</html>