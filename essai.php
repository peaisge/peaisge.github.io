<?php
echo 'bonjour';
require('sql/database.php');
require('sql/invite.php');
$dbh = Database::connect();
echo 'Connecté';
$nom = 'Lescot';
$prenom = 'Raphael';
$age = '18';
$mairie = '0';
$messe = '0';
$diner = '0';
$brunch = '0';
$alimentationChoix = 'Aucune';
$musiqueChoix = 'Disco';
$commentaires = "NULL";
Invite::insertInvite($dbh, $nom, $prenom, $age, $mairie, $messe, $diner, $brunch, $alimentationChoix, $musiqueChoix, $commentaires);
?>