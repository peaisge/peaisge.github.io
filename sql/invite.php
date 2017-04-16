<?php

class Invite{
    public $nom;
    public $prenom;
    public $age;
    public $mairie;
    public $messe;
    public $diner;
    public $brunch;
    public $alimentationChoix;
    public $musiqueChoix;
    public $commentaires;
    
    public static function getInvite($dbh, $nom, $prenom, $age){
        $sth = $dbh->prepare("SELECT * from `invites` WHERE `nom`=? AND `prenom`=? AND `age`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Invite');
        $sth->execute(array($nom, $prenom, $age));
        if ($sth -> rowCount() != 1) { return null; }
        $invite = $sth->fetch();
        return $invite;
    }
    
    public static function insertInvite($dbh, $nom, $prenom, $age, $mairie, $messe, $diner, $brunch, $alimentationChoix, $musiqueChoix, $commentaires){
        if (Invite::getInvite($dbh, $nom, $prenom, $age) == null){
            $sth = $dbh->prepare("INSERT INTO `invites` (`nom`, `prenom`, `age`, `mairie`, `messe`, `diner`, `brunch`, `alimentation`, `musique`, `commentaire`) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $sth->execute(array($nom, $prenom, $age, $mairie, $messe, $diner, $brunch, $alimentationChoix, $musiqueChoix, $commentaires)); 
            echo "Vous avez été ajouté à la liste des invités";
        }
        else{
            echo "Cet invité a déjà été ajouté";
        }
    }
    
    public static function deleteInvite($dbh, $nom, $prenom){
        $sth = $dbh->prepare("DELETE FROM `users` WHERE `nom`=? AND `prenom`=?");
        $sth->execute(array($nom, $prenom));
        echo "L'invité a été supprimé";
    }
}

