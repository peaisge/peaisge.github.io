<?php
//var_dump($_POST);
if ($_SESSION['status'] == "0"){
?>

<!-- CSS RSVPForm -->
<link rel="stylesheet" type="text/css" href="css/rsvpform.css" />

<script src="js/rsvpform.js"></script>
<br>
Allez-vous venir? 
<input type=checkbox id='rep'/>
<form action="index.php?page=rsvp" method="post" id='formulaire' style='display: none'>
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
                <input name="nom-1" id="nom-1" type="text" size="30" maxlength="30" />
            </p>
            <p>
                <label for="prenom-1" class="left">Prénom :</label> 
                <input name="prenom-1" id="prenom-1" type="text" size="30" maxlength="30" />
            </p>
            <p>
                <label for="age-1" class="left">Âge :</label> 
                <input name="age-1" id="age-1" type="number" min="1" max="117" />
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
                <select name="alimentation-1[]" id="alimentation-1">
                    <option value="Aucune">Aucune</option>
                    <option value="Végétarien">Végétarien</option>
                    <option value="Sans porc">Sans porc</option>
                    <option value="Halal">Halal</option>
                </select>
            </p>
            <p>
                <label class="left">Styles de musique souhaités :</label>
                <select name="musique-1[]" id="musique-1">
                    <option value="Disco">Disco</option>
                    <option value="Variété française">Variété française</option>
                    <option value="Pop">Pop</option>
                    <option value="Deep house">Deep house</option>
                    <option value="Rock">Rock</option>
                </select>
            </p>
        </div>
    </div>
    <p>
        <label for="commentaires" class="left">Commentaires : </label>
        <textarea name="commentaires" id="commentaires" cols="30" rows="5"></textarea>
        <br>
        <input value="Envoyer" type="submit">
</form>

<?php }
else{
    echo ' <br> Veuillez-vous connecter';
}
?>