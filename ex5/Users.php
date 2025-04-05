<?php

include_once "Connection.php";

class Users{
    static private $bdd;

    private function __construct(){
    }

    static function getBdd() {
        if (!self::$bdd) {
            self::$bdd = Connection::getInstance();
        }
        return self::$bdd;
    }

    static function addUser($username, $email, $password, $role){
        $req = self::getBdd()->prepare('insert into utilisateur (username, email, password, role) values(?,?,?,?)');
        $response = $req->execute(array($username, $email,$password, $role));
        return $response;
    }

    static function getUser($email, $password){
        $req = self::getBdd()->prepare('select * from utilisateur where email=? and password=?');
        $req->execute(array($email, $password));

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    static function emailExists($email){
        $req = self::getBdd()->prepare('select * from utilisateur where email=?');
        $req->execute(array($email));

        return $req->fetch(PDO::FETCH_ASSOC) != null;
    }
}

?>