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
    <form style="display: none " id="formulaire-<?php echo $unCommentaire->id(); ?>" method="POST" action="../controleur/verif/ajouterReponse.php?idParent=<?php echo $unCommentaire->id(); ?>&amp;idArticle=<?php echo $id; ?>">
      <input type="text" class="form-control"  name="auteur" value="" placeholder="Auteur" required><br/>
      <textarea class="form-control" class="Textarea" name="contenu" value=""  rows="3" required></textarea><br/>
      <input value="Envoyer" type="submit"  class="btn btn-primary" name="ajouterReponse">
    </form>
    </div>
  </div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>