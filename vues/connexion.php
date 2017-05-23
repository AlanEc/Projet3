    <?php include('doctype.html'); ?> 
    <body>
       <?php include('menu.php'); ?>
       <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <?php if(isset($mauvaisMdp)) {
                    ?> 
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert"></a>
                            <strong>Attention!</strong> Identifiant ou mot de passe incorrect.
                        </div>
                    <?php } ?>
                    <h1 class="text-center login-title">Connectez vous à l'administration</h1>
                    <div class="account-wall">
                        <form class="form-signin" action="../controleur/verif/verifMotpasse.php" method="post">
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                        </label>
                          <span class="clearfix"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
     </body>
</html>

