<?php

include(dirname(__FILE__).'../sql/database.php');
include(dirname(__FILE__).'../sql/user.php');
$login = $_SESSION['login'];

$dbh = Database::connect();
if (isset($_POST['password'])){
    $user = User::getUser($dbh, $login);
    $password = $_POST['password'];
    if ($user != null && User::testPassword($user, $password)){
        echo '1';
    }
    else {
        echo '0';
    }
}
else{
    echo '0';
}
?>