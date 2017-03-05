<!DOCTYPE html>
<?php
    session_name("wedding_session");
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    // Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
    //print_r($_SESSION);
?>
<html>
    <?php
    require 'utilities/logInOut.php';
    if ($_GET["todo"] == "login"){
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
        <div class="container">
            <?php
            if ($authorized){
                generateMenu($askedPage);
                if ($askedPage == "plan"){
                    require 'content/content_plan.html';
                }
                else{
                    require "content/content_$askedPage.php";
                }
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
    </body>
 
</html>