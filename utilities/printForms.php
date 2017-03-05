<!DOCTYPE html>
<?php

function printLoginForm($askedPage){
    echo <<<FIN
    <form action="index.php?todo=login&page=$askedPage" method="post" onsubmit="return verifLoginForm()">
        <p><input id="login "type="text" name="login" placeholder="login" required /></p>
        <p><input id="password" type="password" name="password" placeholder="mot de passe" required /></p>
    
        <p><input type="submit" value="Valider" /></p>
    </form>
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