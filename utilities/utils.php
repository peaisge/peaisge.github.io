<?php

function generateHTMLheader($title){
    echo <<<FIN
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$title</title>
 
        <!-- CSS Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
 
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
FIN;
}

function generateHTMLfooter(){
    echo <<<FIN
    <div id="footer">
        <p>Site réalisé en Modal par Raphaël Lescot</p>
    </div>
FIN;
}

$page_list = array(
        array(
            "name" => "welcome",
            "title" => "Page d'accueil de notre site",
            "menutitle" => "Accueil"
        ),
        array(
            "name" => "programme",
            "title" => "Le programme du mariage",
            "menutitle" => "Programme"
        ),
        array(
            "name" => "list",
            "title" => "Liste des invités",
            "menutitle" => "Invités"
        ),
        array(
            "name" => "plan",
            "title" => "Plan du site",
            "menutitle" => "Hébergement"
        ),
        array(
            "name" => "photos",
            "title" => "Photos",
            "menutitle" => "Photos"
        ),
        array(
            "name" => "news",
            "title" => "Informations pratiques",
            "menutitle" => "Informations"
        ));

function checkPage($askedPage){
    global $page_list;
    foreach($page_list as $sstab){
        if ($sstab['name'] == $askedPage){
            return true;
        }
    }
    return false;
}

function getPageTitle($askedPage){
    global $page_list;
    foreach($page_list as $sstab){
        if ($sstab['name'] == $askedPage){
            return $sstab['title'];
        }
    }
    return 'Erreur';
}

function generateMenu($askedPage){
    echo <<<FIN
    <!-- Static navbar -->
    <div class="navbar-collapse collapse">
        <ul class="nav nav-tabs">
FIN;
    global $page_list;
    foreach($page_list as $sstab){
        if ($sstab['name'] == $askedPage){ 
            echo "<li class='active'><a href='index.php?page=".$sstab['name']."'>".$sstab['menutitle']."</a></li>";
        }
        else{
            echo "<li><a href='index.php?page=".$sstab['name']."'>".$sstab['menutitle']."</a></li>";
        }
    }
    echo "</ul>";
    echo "</div>";
}

?>