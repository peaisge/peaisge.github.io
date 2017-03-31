<?php

require('/sql/database.php');
require('/sql/user.php');

$dbh = Database::connect();
if (isset($_POST['login']) && isset($_POST['password'])){
    $user = User::getUser($dbh, $_POST['login']);
    $password = $_POST['password'];
    if ($user != null && User::testPassword($dbh, $user, $password)){
        echo '1';
    }
    else {
        echo '0';
    }
}
else{
    echo "0";
}
?>