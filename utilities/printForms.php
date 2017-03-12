<!DOCTYPE html>
<?php

function printLoginForm($askedPage){
    echo <<<FIN
    <div class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content login-page">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Connexion</h4>
                </div>
                <div class="modal-body form">
                    <form class="register-form">
                        <input type="text" placeholder="name"/>
                        <input type="password" placeholder="password"/>
                        <input type="text" placeholder="email address"/>
                        <p><input type="submit" class="boutonEnvoi" value="S'inscrire"/></p>
                        <p class="message">Déjà inscrit ? <a href="#">Connectez-vous</a></p>
                    </form>
                    <form class="login-form" action="index.php?todo=login&page=$askedPage" method="post" onsubmit="return verifLoginForm()">
                        <p><input id="login "type="text" name="login" placeholder="Login" required /></p>
                        <p><input id="password" type="password" name="password" placeholder="Mot de passe" required /></p>
                        <p><input type="submit" class="boutonEnvoi" value="Valider" /></p>
                        <p class="message">Pas encore inscrit ? <a href="#">Créez un compte</a></p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
FIN;
    //if ($opt){
    //    echo "<p style='color:red'> Veuillez fournir des identifiants et un mot de passe corrects </p>";
    //}
}

function printLogoutForm($askedPage){
echo <<<FIN
    <form action="index.php?todo=logout&page=$askedPage" method="post">    
        <p><input type="submit" value="Déconnexion" /></p>
    </form>
FIN;
}
?>

<script src="/Applications/MAMP/htdocs/Modal/peaisge.github.io/js/verifForms.js"></script>