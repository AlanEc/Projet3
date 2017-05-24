
<?php include('doctype.html'); ?>
    <?php include('menu.php'); ?>
    <div id="carouselAccueil" class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
        <div  id="titre_principal">
            <h1>Billet simple pour l'Alaska</h1>
        </div>
    </div>
        <div id="containerAccueil" class="container">
    <div id="liste">

        <?php foreach ($articles as $unArticle) { ?>
        <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h2><?php  echo  htmlspecialchars($unArticle->titre()) ?> </h2>
                <p><?php echo $unArticle->resume() ?>...</p>
                <div>
                    <div class="more label"><a class="btn btn-primary btn-large" href="controleurArticle.php?idArticle=<?php echo $unArticle->id() ?>">Lire la suite</a>
                    </div>
                </div> 
                <div class="clear">
                </div> 
            </div>
            </div></div>
            <hr> 
        </div> 
        <?php } ?> 
    </div>
    <?php include('footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>





