<?php

function logIn($dbh){
    require '/Applications/MAMP/htdocs/Modal/peaisge.github.io/sql/user.php';
    $user = User::getUser($dbh, $_POST["login"]);
    if ($user != null && User::testPassword($dbh, $user, $_POST["password"])){
        echo "Bonjour $user->login";
        $_SESSION['loggedIn'] = true;
        $_SESSION['login'] = $user->login;
        $_SESSION['id'] = $user->id;
    }
}

function logOut(){
    unset($_SESSION['loggedIn']);
}


