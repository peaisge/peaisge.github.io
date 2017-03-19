<?php

require('../sql/database.php');
require('../sql/user.php');

$dbh = Database::connect();
if (isset($_POST['login']) && User::getUser($dbh, $_POST['login']) != null){
    echo "1";
}
else{
    echo "0";
}

?>