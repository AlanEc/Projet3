<?php 

require '../bootstrap.php'; 
 $manager = new NewsManager($db);
?>

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
        <div class="container-fluid">
            <div class="col-lg-12">
                 <div class="row">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                            </ol>
                        <div class="carousel-inner">              
                            <div class="item active"> <img src="../assets/livre1.jpg" alt="Image Livre"></div>
                            <div class="item"> <img src="../assets/livre2.jpg" alt="Image Livre"></div>
                        </div>
                            <a class="left carousel-control" href="#carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="titre_principal">
                <h1>Liste des 5 dernières news</h1>
            </div>
            <div id="liste">
                   <?php $articles = $manager->getList(); 
                   foreach ($articles as $unArticle) { ?>
                <div class="container">
                    <div class="span8">
                        <h2><?php  echo  htmlspecialchars($unArticle->titre()) ?> </h2>
                        <p><?php echo $unArticle->resume() ?>...</p>
                    <div>
                        <div class="more label"><a href="article.php?idb=<?php echo $unArticle->id() ?>">Lire</a></div> 
                    </div> 
                         <div class="clear"></div>
                        <hr>  
                    </div>
                </div> 
            </div>
        <?php } ?> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Javascript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>
</html




