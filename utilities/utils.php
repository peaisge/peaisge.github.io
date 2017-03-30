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
        
        <!-- CSS Font-awesome -->
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
        
        <!-- CSS Form -->       
        <link href="css/form.css" rel="stylesheet">
            
        <!-- CSS Map -->
        <link href="css/docs.min.css" rel="stylesheet">
            
        <!-- CSS Git -->
        <link href="css/main.css" rel="stylesheet">

 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
            
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- Supprimer le lag des clics sur mobile -->
        <script src="js/fastclick.js"></script>

        
    </head>
FIN;
}

function generateHTMLfooter(){
    echo <<<FIN
    <br>
    <div id="footer" class="col-lg-8 col-lg-offset-2 text-center">
        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
        <p>Nous contacter</p>
        <p><a href="mailto:mo—dalweb.contact@gmail.com">modalweb.contact@gmail.com</a></p>
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

function registerForm(){
    echo <<<FIN
    <form class="register-form" action="" method="post"
        oninput="password2.setCustomValidity(password2.value != password1.value ? 'Les mots de passe diffèrent.' : '')" 
            onsubmit="return verifRegisterForm(this)">
        <p>
            <label for="login">Login</label>
            <input id="login" type="text" required name="login">
<!--            <input id="login" type="text" required name="login" onblur="verifLogin(this)&&existLogin(this)">-->
            <span id="loginVu" style="color:red">Login utilisé</span>
        </p>
        <p>
            <label for="email">E-mail</label>
            <input id="email" type="email" required name="email">
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input id="prenom" type="text" required name="prenom" onblur="verifNames(this)">
        </p>
        <p>
            <label for="nom">Nom</label>
            <input id="nom" type="text" required name="nom" onblur="verifNames(this)">
        </p>
        <p>
            <label for="date">Date de naissance</label>
            <input id="date" type="date" placeholder="aaaa-mm-jj" required name="date" onblur="verifDate(this)">
            <span id="dateError" style="color:red; display:none">Cette date n'existe pas</span>
        </p>
        <p>
            <label for="tel">Téléphone</label>
            <input id="tel" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" 
                placeholder="0XXXXXXXXX" name="tel" onblur="verifTel(this)">
            <span id="telError" style="color:red; display:none">Entrez un numéro à 10 chiffres sans espace, ou laissez vide</span>
        </p>
        <p>
            <label for="password1">Mot de passe</label>
            <input id="password1" type="password" required name="password1" onblur="verifPassword(this)">
            <span id="mdpError" style="color:red; display:none">Le mot de passe doit contenir au moins 6 caractères</span>    
        </p>
        <p>
            <label for="password2">Confirmez le mot de passe</label>
            <input id="password2" type="password" name="password2" onblur="verifPasswordEquality(this)">
            <span id="mdpEqualityError" style="color:red; display:none">Les deux mots de passe ne sont pas identiques</span>
        </p>
        <input type="submit" class="boutonEnvoi" value="Identification">
        <p class="message">Déjà inscrit ? <a href="#">Connectez-vous</a></p>
    </form>
FIN;
    
}

function loginForm($askedPage){
    echo <<<FIN
    <form class="login-form" action="?todo=login&page=$askedPage" method="post" onsubmit="return verifLoginForm(this)">
        <p><input id="login-connexion" type="text" name="login-connexion" placeholder="Login" required onblur="verifLogin(this)"/></p>
        <p><input id="password" type="password" name="password" placeholder="Mot de passe" required onblur="verifPassword(this)"/></p>
        <p><input type="submit" class="boutonEnvoi" value="Valider" /></p>
        <p class="message">Pas encore inscrit ? <a href="#">Créez un compte</a></p>
    </form>
FIN;
}

function generateMenu($askedPage, $status){
    echo <<<FIN
    <div class="collapse navbar-collapse row" id="bs-example-navbar-collapse-1">
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
    
    if ($status == 1 || $status == 0){
        echo "<li style='float:right'><a href='?todo=logout&page=".$askedPage."'>Déconnexion</a></li>";
    }
    else{
        echo "<li style='float:right'><a data-toggle='modal' data-target='#myModal'>Connexion</a></li>";
        echo <<<FIN
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Connexion</h4>
              </div>
              <div class="modal-body form">
FIN;
                    registerForm();
                    loginForm($askedPage);
                    echo <<<FIN
                </div>
            </div>
          </div>
        </div>
FIN;
    }
    if (isset($_SESSION['login']) && $_SESSION['login'] != ""){
        echo <<<FIN
        <li class='dropdown' style='float:right'>
            <a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' 
                aria-expanded='false'>Mon compte<span class='caret'></span></a>
        <ul class="dropdown-menu">
            <li><a href="#">Mes mariages</a></li>
            <li><a href="#">Mes amis</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Paramètres</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
        </ul>
        </li>
FIN;
   }
    echo "</ul>";
    echo "</div>";
}

?>