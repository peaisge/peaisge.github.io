<!DOCTYPE html>
<html>
    <?php 
        require 'utilities/utils.php';
        if (isset($_GET['page'])){
            $askedPage = $_GET['page'];
        }
        else{
            $askedPage = "welcome";
        }
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
                
                $dbh = Database::connect();
                require 'user.php';
                User::insertUser($dbh, "peaisge", "abrege", "Lescot", "Raphael", "1996-10-20", "raphi.lescot@hotmail.fr");
                $dbh = null;
            ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>