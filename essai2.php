<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/> 
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, 
            user-scalable=no" name="viewport">
        <title>Localisation</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/perso.css"/>
        <link href="css/highlight.css" rel="stylesheet">
        <link href="css/docs.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <a class="after" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Connectez vous</h1><br>
                    <form action="index.php?todo=login&page=accueil" method="post">
                        <input type="text" name="login" placeholder="Login" required>
                        <input type="password" name="mdp" placeholder="Mot de passe" required>
                        <button id="singlebutton" name="singlebutton" class="btn btn-success">Connexion</button> 
                    </form>
                </div>
            </div>    
        </div> 
        <!-- jQuery -->
    	<script src="js/jquery.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>

