<!DOCTYPE html>
<?php

$form_values_valid=false;
$stringLogin = "";
$stringPassword = "";
 
if(isset($_POST["login"]) && $_POST["login"] != "" &&
   isset($_POST["email"]) && $_POST["email"] != "" &&
   isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
   isset($_POST["nom"]) && $_POST["nom"] != "" &&
   isset($_POST["date"]) && $_POST["date"] != "" &&
   isset($_POST["password1"]) && $_POST["password1"] != "" &&
   isset($_POST["password2"]) && $_POST["password2"] != "") {
    require 'sql/database.php';
    $dbh = Database::connect();
    require 'sql/user.php';
    $user = User::getUser($dbh, $_POST['login']);
    if ($user == null){
        User::insertUser($dbh, $_POST['login'], $_POST['password1'], '0', $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email']);
        $form_values_valid = true;
    }
    else{
        $stringLogin = "<span style='color:red'> Ce login est déjà utilisé </span>";
    }
}

if($_GET['todo'] == 'login'){
    echo <<<FIN
    Vous pouvez maintenant vous connecter sur la page d'accueil
    <input type="button" value="Accueil" onclick="javascript:location.href='index.php?todo=login'">
FIN;
}

if (isset($_POST["prenom"])){
    $prenom = $_POST["prenom"];
}

if (isset($_POST["nom"])){
    $nom = $_POST["nom"];
}

if (isset($_POST["date"])){
    $birthdate = $_POST["date"];
}

if (!$form_values_valid){
?>
<form action="?todo=login" method="post"
      oninput="password2.setCustomValidity(password2.value != password1.value ? 'Les mots de passe diffèrent.' : '')"
      onsubmit="return verifRegisterForm2(this)">
    <p>
        <label for="prenom">Prénom</label>
        <input id="prenom" type="text" required name="prenom" value="<?php echo $prenom ?>" onblur="verifNames(this)">
    </p>
    <p>
        <label for="nom">Nom</label>
        <input id="nom" type="text" required name="nom" value="<?php echo $nom ?>" onblur="verifNames(this)">
    </p>
    <p>
        <label for="date">Date de naissance</label>
        <input id="date" type="date" placeholder="aaaa-mm-jj" required name="date" value="<?php echo $birthdate ?>" onblur="verifDate(this)">
        <span id="dateError" style="color:red; display:none">Cette date n'existe pas</span>
    </p>
    <input type="submit" value="Identification">
</form>
<?php }
?>

<script src="js/verifForms.js"></script>