<?php
echo '1 <br/>';
require 'utilities/database.php';
echo '2 <br/>';
require 'sql/user.php';
$dbh = Database::connect();
User::insertUser($dbh, "melk444", "4CLHDR", "Lescot", "Melchior", "1999-02-13", "melklescot@hotmail.fr");
echo '<br/> 3';
$dbh = null;

