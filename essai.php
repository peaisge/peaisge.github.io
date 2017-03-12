<?php
echo '1 <br/>';
require 'sql/database.php';
echo '2 <br/>';
require 'sql/user.php';
$dbh = Database::connect();
echo '3 <br/>';
$user = User::getUser($dbh, "melk444");
echo $user;
echo '<br/>4 <br/>';
User::insertUser($dbh, "papa", "jesuisfort", 1, "Lescot", "Christophe", "1963-12-22", "clescot@free.fr");
echo '5 <br/>';
$dbh = null;

