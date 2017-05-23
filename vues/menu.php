<!DOCTYPE html>
<html>
    <head>
        <title>tp6</title>
        <meta charset="utf-8" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css.css" />
    </head>
    <body>
        <?php if (!isset($_SESSION['id'])) { ?>
            <nav class="navbar navbar-inverse">
            <div class="container-fluid" id="logo">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Billet Simple pour l'Alaska</p>
                </div>
                <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active accueil"><a href="controleurAccueil.php">Accueil</a></li> 
                    <li class="lienNav Apropos"><a href="controleurApropos.php">A Propos</a></li>
                    <li class="lienNav"><a href="controleurConnexion.php">Administration</a></li>
                </ul>
                <img src="../assets/logo-livre.png" alt="arobas"/>
                <ul class="nav navbar-nav navbar-right">
                    <li class="connexion"><a href="../controleur/controleurConnexion.php"><span class="glyphicon glyphicon-log-in"></span>Connexion</a></li>
            </div>
        </nav>
        <?php } else { ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid" id="logo">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Billet Simple pour l'Alaska</p>
                </div>
                <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active accueil"><a href="controleurAccueil.php">Accueil</a></li> 
                    <li class="lienNav Apropos"><a href="controleurApropos.php">A Propos</a></li>
                    <li class="lienNav"><a href="controleurConnexion.php">Administration</a></li>
                </ul>
                <img src="../assets/logo-livre.png" alt="arobas"/>
                <ul class="nav navbar-nav navbar-right">
                    <li class="connexion"><a href="../controleur/verif/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
                </ul> 
            </div>
        </nav>
        <?php } ?>
    </body>
</html>