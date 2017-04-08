<form id="mdpForm" class="login-form" action="?todo=updatePassword" method="post">
    <p>
        <label for="mdpActuel">Mot de passe actuel</label>
        <input id="mdpActuel" type="password" name="mdpActuel" required/>
        <span id="mauvaisMdp-password" style="color:red">Mauvais mot de passe</span>
    </p>
    <p>
        <label for="mdpNouveau1">Nouveau mot de passe</label>
        <input id="mdpNouveau1" type="password" name="mdpNouveau1" required/>
        <span id="mdpError-password" style="color:red">Le mot de passe doit contenir au moins 6 caractères</span>
    </p>
    <p>
        <label for="mdpNouveau2">Confirmez</label>
        <input id="mdpNouveau2" type="password" name="mdpNouveau2" required/>
        <span id="mdpEqualityError-password" style="color:red">Les deux mots de passe ne sont pas identiques</span>
    </p>    
    <p><input type="submit" class="boutonEnvoi" value="Enregistrer les modifications" /></p>
</form>


