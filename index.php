<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
?>
<html>
    <?php
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
    require 'utilities/logInOut.php';
    if (!isset($_SESSION['login']) && $_GET["todo"] == "login"){
        //print_r($_POST);
        require 'sql/database.php';
        $dbh = Database::connect();        
        logIn($dbh, $_POST['login']);
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
    require 'utilities/utils.php';
    $authorized = checkPage($askedPage);
    $pageTitle = getPageTitle($askedPage);
    generateHTMLheader($pageTitle);
    ?>
    <body>
        <div id="container">
            <?php
            if (!isset($_SESSION['status'])) {
                $_SESSION['status'] = -1;
            }
            print_r($_SESSION);
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/form.js"></script>
        <script src="js/verifForms.js"></script>

    </body>
 
</html>