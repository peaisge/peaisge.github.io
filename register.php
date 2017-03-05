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
    if ($user == null && $_POST['password1'] == $_POST['password2']){
        User::insertUser($dbh, $_POST['login'], $_POST['password1'], $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email']);
        $form_values_valid = true;
    }
    if ($user != null){
        $stringLogin = "<span style='color:red'> Ce login est déjà utilisé </span>";
    }
    if ($_POST['password1'] != $_POST['password2']){
        $stringPassword = "<span style='color:red'> Les mots de passe ne sont pas identiques </span>";
    }
}

if($_GET['todo']== 'login'){
    echo "Vous pouvez maintenant vous connecter sur la page d'accueil";
    echo "<button ahref='index.php?todo=login'>Retour à la page d'accueil</button>";
}

if (isset($_POST["login"])){
    $login = $_POST["login"];
}

if (isset($_POST["email"])){
    $email = $_POST["email"];
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
      onsubmit="return verifRegisterForm(this)">
    <p>
        <label for="login">Login</label>
        <input id="login" type="text" required name="login" value="<?php echo $login ?>" onblur="verifLogin(this)">
        <?php echo $stringLogin; ?>
    </p>
    <p>
        <label for="email">E-mail</label>
        <input id="email" type="email" required name="email" value="<?php echo $email ?>" onblur="verifMail(this)">
    </p>
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
    <p>
        <label for="password1">Mot de passe:</label>
        <input id="password1" type="password" required name="password1" onblur="verifPassword(this)">
        <span id="mdpError" style="color:red; display:none">Le mot de passe doit contenir au moins 6 caractères</span>    
    </p>
    <p>
        <label for="password2">Confirmez le mot de passe</label>
        <input id="password2" type="password" name="password2" onblur="verifPasswordEquality(this)">
        <span id="mdpEqualityError" style="color:red; display:none">Les deux mots de passe ne sont pas identiques</span>
    </p>
    <input type="submit" value="Identification">
</form>
<?php }
?>

<script src="js/verifForms.js"></script>