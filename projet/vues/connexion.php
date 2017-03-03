<!DOCTYPE html>
<?php 
session_start();

if(isset($_COOKIE["pseudo"])) {
    header('Location: administration.php');
} 

if(isset($_SESSION["id"])) {
    header('Location: administration.php');
} 
?> 

<html>    
<head>
    <link rel="stylesheet" href="styleCSS.css" />
    <meta charset="utf-8"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Connexion</title>
</head>
    <body>
       <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Connectez vous à l'administration</h1>
                    <div class="account-wall">
                        <form class="form-signin" action="../verif/verifMotpasse.php" method="post">
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me" name="auto">
                            Se souvenir de moi
                        </label>
                          <span class="clearfix"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </body>
</html>

