<?php
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
?>
<!DOCTYPE html>
<html>
    <?php
    require 'sql/database.php';
    require 'sql/user.php';
    require 'sql/invite.php';
    if(isset($_POST["login"]) && $_POST["login"] != "" &&
       isset($_POST["email"]) && $_POST["email"] != "" &&
       isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
       isset($_POST["nom"]) && $_POST["nom"] != "" &&
       isset($_POST["date"]) && $_POST["date"] != "" &&
       isset($_POST["password1"]) && $_POST["password1"] != "" &&
       isset($_POST["password2"]) && $_POST["password2"] != "") {
        $dbh = Database::connect();
        $user = User::getUser($dbh, $_POST['login']);
        if ($user == null){
            if (isset($_POST["tel"]) && $_POST["tel"] != ""){
                $tel = $_POST["tel"];
            }
            else{
                $tel = "NULL";
            }
            User::insertUser($dbh, $_POST['login'], $_POST['password1'], 0, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email'], $tel);
        }
        else{
            echo 'Login déjà utilisé';
        }
        $dbh = null;
    }

    //Traitement du formulaire de réponse
    if (isset($_POST["nbguests-cache"])){
        $nb = $_POST["nbguests-cache"];
        echo $nb;
        $bienRempli = true;
        for ($i=1; $i<=$nb; $i++){
            $bienRempli = $bienRempli &&
                    isset($_POST["nom-$i"]) && $_POST["nom-$i"] != "" &&
                    isset($_POST["prenom-$i"]) && $_POST["prenom-$i"] != "" &&
                    isset($_POST["age-$i"]) && $_POST["age-$i"] != "";        
        }
        if ($bienRempli){
            echo 'c bon';
            $dbh = Database::connect();
            echo 'Connecté';
            for ($i=1; $i<=$nb; $i++){ 
                $nom = $_POST["nom-$i"];
                $prenom = $_POST["prenom-$i"];
                $age = $_POST["age-$i"];
                if (isset($_POST["mairie"])){
                    $mairie = 1;
                }
                else{
                    $mairie = 0;
                }
                if (isset($_POST["messe"])){
                    $messe = 1;
                }
                else{
                    $messe = 0;
                }
                if (isset($_POST["diner"])){
                    $diner = 1;
                }
                else{
                    $diner = 0;
                }
                if (isset($_POST["brunch"])){
                    $brunch = 1;
                }
                else{
                    $brunch = 0;
                }
                $alimentation = $_POST["alimentation-$i"];
                foreach($alimentation as $choix){
                    $alimentationChoix = $choix;
                }
                echo $alimentationChoix;
                $musique = $_POST["musique-$i"];
                foreach($musique as $choix){
                    $musiqueChoix = $choix;
                }
                echo $musiqueChoix;
                if ($i == 1){
                    $commentaire = $_POST["commentaires"];
                }
                else{
                    $commentaire = "NULL";
                }
                Invite::insertInvite($dbh, $nom, $prenom, $age, $mairie, $messe, $diner, $brunch, $alimentationChoix, $musiqueChoix, $commentaire);
            }
            $dbh = null;
        }
    }

    require 'utilities/logInOut.php';
    if (!isset($_SESSION['login']) && $_GET["todo"] == "login"){
        //print_r($_POST);
        $dbh = Database::connect();     
        logIn($dbh, $_POST['login-connexion']);
        $dbh = null;
    }
    if ($_GET["todo"] == "logout"){
        logOut();
    }
    else if ($_GET["todo"] == "updatePassword"){
        $dbh = Database::connect();
        User::updatePassword($dbh, $_SESSION['login'], SHA1($_POST['mdpNouveau2']));
        $dbh = null;
    }
    else if ($_GET["todo"] == "delete"){
        $dbh = Database::connect();
        User::deleteAccount($dbh, $_SESSION['login']);
        $dbh = null;
    }
    if (isset($_GET['page'])){
        $askedPage = $_GET['page'];
    }
    else {
        $askedPage = "welcome";
    }
    require 'utilities/utils.php';
    $authorized = checkPage1($askedPage) || checkPage2($askedPage);
    $pageTitle = getPageTitle($askedPage);
    generateHTMLheader($pageTitle);
    ?>
    <body>
        <div id="container">
            <?php
            if (!isset($_SESSION['status'])) {
                $_SESSION['status'] = -1;
            }
            //print_r($_SESSION);
            if ($authorized){
                generateMenu($askedPage, $_SESSION['status']);
                require "content/content_$askedPage.php";
            }
            else{
                echo "<p>Désolé, la page demandée n'existe pas ou n'est accessible 
                    qu'aux gentlemen.</p>";
            }
            generateHTMLfooter();
            ?>
        </div>
        
        <!-- Scripts pour les formulaires de connexion et d'inscription -->
        <script src="js/form.js"></script>
        <script src="js/verifForms.js"></script>
        <?php
        if ($askedPage == "parametres"){
        ?>
        <!-- Script pour le formulaire de changement de mot de passe -->
        <script src="js/passwordForm.js"></script>
        <?php } ?>
    </body>
 
</html>
