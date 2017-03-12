<!DOCTYPE html>
<?php
    session_name("wedding_session");
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = -1;
    }
    // Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
    //print_r($_SESSION);
?>
<html>
    <?php
    require 'utilities/logInOut.php';
    if ($_GET["todo"] == "login"){
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
                User::insertUser($dbh, $_POST['login'], $_POST['password1'], 0, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email']);
            }
            $dbh = null;
        }
        require 'sql/database.php';
        $dbh = Database::connect();        
        logIn($dbh);
        $dbh = null;
    }
    if ($_GET["todo"] == "logout"){
        logOut();
    }
    if (isset($_GET['page'])){
        $askedPage = $_GET['page'];
    }
    else {
        $askedPage = "welcome";
    }
    require 'utilities/printForms.php';
    if ($_SESSION["loggedIn"]){
        printLogoutForm($askedPage);
    }
    else{
        printLoginForm($askedPage);
    }
    require 'utilities/utils.php';
    $authorized = checkPage($askedPage);
    $pageTitle = getPageTitle($askedPage);
    generateHTMLheader($pageTitle);
    ?>
    <body>
        <div id="container">
            <?php
            if ($authorized){
                generateMenu($askedPage, $_SESSION['id']);
                require "content/content_$askedPage.php";
            }
            else{
                echo "<p>Désolé, la page demandée n'existe pas ou n'est accessible 
                    qu'aux gentlemen.</p>";
            }
            generateHTMLfooter();
            ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/form.js"></script>
        <script src="js/verifForms.js"></script>

    </body>
 
</html>