<?php
session_start();

function logIn($dbh, $login){
    require 'sql/user.php';
    $user = User::getUser($dbh, $login);
    if ($user != null && User::testPassword($user, $_POST["password"])){
        //echo 'Connexion login réussie'; 
        $_SESSION['loggedIn'] = true;
        $_SESSION['login'] = $user->login;
        $_SESSION['status'] = $user->id;
        echo 'Login réussi';
    }
    else if($user != null && !User::testPassword($user, $_POST["password"])){
        echo 'Mauvais mot de passe';
    }
    else if ($user == null){
        echo 'Erreur...';
    }
}

function logOut(){
    session_unset();
    unset($_SESSION['loggedIn']);
    session_destroy();
}


