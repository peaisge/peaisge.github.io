<?php

class User{
    public $login;
    public $password;
    public $nom;
    public $prenom;
    public $birthdate;
    public $email;
    public $wedding;
    
    public function __toString(){
        return "[$this->login] $this->prenom $this->nom, né le $this->birthdate, $this->email, pour le mariage $this->wedding";
    }
    
    public static function getUser($dbh, $login){
        $sth = $dbh->prepare("SELECT * from `users` WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        if ($sth -> rowCount() != 1) { return null; }
        $user = $sth->fetch();
        return $user;
    }
    
    public static function insertUser($dbh, $login, $password, $nom, $prenom, $birthdate, $email){
        if (getUser($dbh, $login) == null){
            $sth = $dbh->prepare("INSERT INTO `users` (`login`, `password`, `nom`, `prenom`, `birthdate`, `email`, `wedding`) VALUES(?,SHA1(?),?,?,?,?,?)");
            $sth->execute(array($login, $password, $nom, $prenom, $birthdate, $email, "NULL")); 
            echo "C'est réussi";
        }
        else{
            echo "Ce login est déjà utilisé";
        }
    }
    
    public static function testPassword($dbh, $login, $password){
        if (getUser($dbh, $login) != null){
            $mdp = getUser($dbh, $login) -> password;
            return ($mdp == SHA1($password));
        }
        echo "Ce login n'est associé à aucun utilisateur";
    }
}


