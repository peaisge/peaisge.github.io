<?php
//var_dump($_POST);
?>

<!-- CSS RSVPForm -->
<link rel="stylesheet" type="text/css" href="css/rsvpform.css" />
<script src="js/rsvpform.js"></script>
<br>
Allez-vous venir? 
<input type=checkbox id='rep'/>
<form action="index.php?page=rsvp&answer=yes" method="post" id='formulaire' style='display: none'>
    <p>
        <label for="nbguests" class="left">Nombre de personnes :</label>         
        <input name="nbguests" id="nbguests" disabled value='1'/>
        <input name="nbguests-cache" id="nbguests-cache" type=hidden value='1'/>
        <span class="glyphicon glyphicon-plus" aria-hidden="true" id='plus'></span>
        <span class="glyphicon glyphicon-minus" aria-hidden="true" id='moins'></span>
    </p>
    <div id='zone-dyn-form'>
        <div class="instance-reponse">
            <p>
                <label for="nom-1" class="left">Nom :</label> 
                <input name="nom[]" id="nom-1" type="text" size="30" maxlength="30" />
            </p>
            <p>
                <label for="prenom-1" class="left">Prénom :</label> 
                <input name="prenom[]" id="prenom-1" type="text" size="30" maxlength="30" />
            </p>
            <p>
                <label for="age-1" class="left">Âge :</label> 
                <input name="age[]" id="age-1" type="number" min="1" max="17" />
            </p>
            <p>
                <label class="left">Je serai présent :</label>
                <input name="mairie[]" type="checkbox" /><label for="mairie">Mairie</label>
                <input name="messe[]" type="checkbox" /><label for="messe">Messe</label>
                <input name="diner[]" type="checkbox" /><label for="diner">Dîner</label>
                <input name="brunch[]" type="checkbox" /><label for="brunch">Brunch</label>       
            </p>
            <p>  
                <label for="alimentation-1" class="left">Restrictions alimentaires :</label> 
                <select name="alimentation[]" id="alimentation-1">
                    <option value="aucune">Aucune</option>
                    <option value="vegetarien">Végétarien</option>
                    <option value="sansporc">Sans porc</option>
                    <option value="halal">Halal</option>
                    <option value="autre">Autre (préciser)</option>
                </select>
            </p>
            <p>
                <label class="left">Styles de musique souhaités :</label>
                <input name="disco[]" type="checkbox" /><label for="disco">Disco</label>
                <input name="variete[]" id="variété" type="checkbox" /><label for="variété">Variété française</label>
                <input name="pop[]" id="pop" type="checkbox" /><label for="pop">Pop actuelle</label>
                <input name="classique[]" id="classique" type="checkbox" /><label for="classique">Danse classique</label>
                <input name="house[]" id="house" type="checkbox" /><label for="house">Deep house</label>
                <input name="rock[]" id="rock" type="checkbox" /><label for="rock">Rock</label>
                <input name="autre[]" id="autre" type="checkbox" /><label for="autre">Autre (préciser)</label>       
            </p>
        </div>
    </div>
    <p>
        <label for="commentaires" class="left">Commentaires : </label>
        <textarea name="commentaires" id="commentaires" cols="30" rows="5"></textarea>
        <br>
        <input value="Envoyer" type="submit">
</form>

<?php
//    $form_values_valid = false;
//
//    if (isset($_POST["login"]) && $_POST["login"] != "" &&
//            isset($_POST["email"]) && $_POST["email"] != "" &&
//            isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
//            isset($_POST["nom"]) && $_POST["nom"] != "" &&
//            isset($_POST["up"]) && $_POST["up"] != "" &&
//            isset($_POST["up2"]) && $_POST["up2"] != "") {
//        if (Utilisateur::getUtilisateur($dbh, $_POST["login"]) == null) {
//            if ($_POST["up2"] == $_POST["up"]) {
//                $form_values_valid = true;
//                Utilisateur::insererUtilisateur($dbh, $_POST["login"], $_POST["up"], $_POST["nom"], $_POST["prenom"], "2015", "1960-01-01", $_POST["email"], "classe.css");
//                $_POST["mdp"]=$_POST["up"];
//                logIn($dbh);
//            }
//        }
//    }
//
//    if (!$form_values_valid) {
//        if (isset($_POST["prenom"]))
//            $prenom = $_POST["prenom"];
//        else
//            $prenom = "";
//        if (isset($_POST["nom"]))
//            $nom = $_POST["nom"];
//        else
//            $nom = "";
//        if (isset($_POST["login"]))
//            $login = $_POST["login"];
//        else
//            $login = "";
//        if (isset($_POST["email"]))
//            $email = $_POST["email"];
//        else
//            $email = "";
//        
?>
<!--            <form action = "index.php?page=register" method = post
            oninput = "up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
            <p>
            <label for = "login">login:</label>
            
            <input id = "login" type = text required name = "login" value="$login">
            </p>
            <p>
            <label for = "email">email:</label>
            <input id = "email" type = email required name = "email" value="$email">
            </p>
            <p>
            <label for = "prenom">Prénom:</label>
            <input id = "prenom" type = text required name = "prenom" value="$prenom">
            </p>
            <p>
            <label for = "nom">Nom:</label>
            <input id = "nom" type = text required name = "nom" value="$nom">
            </p>
            <p>
            <label for = "password1">Password:</label>
            <input id = "password1" type = password required name = "up">
            </p>
            <p>
            <label for = "password2">Confirm password:</label>
            <input id = "password2" type = password name = "up2">
            </p>
            <input type = submit value = "Create account">
            </form >-->