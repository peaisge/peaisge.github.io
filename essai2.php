<?php

$login = "admin";
$password = "adminnon";
require 'sql/database.php';
require 'sql/user.php';
$dbh = Database::connect();
$user = User::getUser($dbh, $login);
echo User::testPassword($user, $password);