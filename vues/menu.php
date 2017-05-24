<body>
    <?php if (!isset($_SESSION['id'])) { ?>
    <nav class="navbar navbar-inverse" id="navigationDeconnecte">
        <div class="container-fluid" id="logo">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="liensNavigations">
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
                <ul class="nav navbar-nav navbar-right">
                    <li class="connexion"><a href="../controleur/controleurConnexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php } else { ?>
    <nav class="navbar navbar-inverse" id="navigationDeconnecte">
        <div class="container-fluid" id="logo">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="liensNavigations">
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
                <ul class="nav navbar-nav navbar-right">
                    <li class="connexion"><a href="../controleur/verif/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php } ?>