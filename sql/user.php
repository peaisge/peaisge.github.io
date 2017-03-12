<?php

class User{
    public $login;
    public $password;
    public $id;
    public $nom;
    public $prenom;
    public $birthdate;
    public $email;
    public $wedding;
    
    public function __toString(){
        return "[$this->login] $this->prenom $this->nom, né le $this->birthdate, $this->email, pour le mariage $this->wedding, a les droits $this->id";
    }
    
    public static function getUser($dbh, $login){
        $sth = $dbh->prepare("SELECT * from `users` WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        if ($sth -> rowCount() != 1) { return null; }
        $user = $sth->fetch();
        return $user;
    }
    
    public static function insertUser($dbh, $login, $password, $id, $nom, $prenom, $birthdate, $email){
        if (User::getUser($dbh, $login) == null){
            $sth = $dbh->prepare("INSERT INTO `users` (`login`, `password`, `id`, `nom`, `prenom`, `birthdate`, `email`, `wedding`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
            $sth->execute(array($login, $password, $id, $nom, $prenom, $birthdate, $email, "NULL")); 
            echo "Votre compte a été ajouté, vous pouvez maintenant vous connecter";
        }
        else{
            echo "Ce login est déjà utilisé";
        }
    }
    
    public static function testPassword($dbh, $user, $password){
        $mdp = $user -> password;
        return ($mdp == SHA1($password));
    }
}


