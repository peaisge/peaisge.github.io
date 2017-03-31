<?php
echo 'bonjour';
require('../sql/database.php');
require('../sql/user.php');
echo 'bonjour';
$dbh = Database::connect();
if (isset($_GET['login']) && isset($_GET['password'])){
    $user = User::getUser($dbh, $_GET['login']);
    $password = $_GET['password'];
    if ($user != null && User::testPassword($dbh, $user, $password)){
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