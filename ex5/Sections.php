<?php

include_once "Connection.php";

class Sections{
    static private $bdd;
    
    private function __construct(){
    }

    static function getBdd() {
        if (!self::$bdd) {
            self::$bdd = Connection::getInstance();
        }
        return self::$bdd;
    }

    static function addSection($designation, $description){
        $req = self::getBdd()->prepare('insert into section (designation, description) values(?,?)');
        $response = $req->execute(array($designation, $description));
        return $response;
    }

    static function getSection($id){
        $req = self::getBdd()->prepare('select * from section where id=?');
        $req->execute(array($id));

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    static function getAll(){
        $req = self::getBdd()->query('select * from section');

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    static function deleteSection($id){
        $req = self::getBdd()->prepare('delete from section where id=?');
        $response = $req->execute(array($id));

        return $response;
    }

    static function updateSection($id, $designation, $description){
        $req = self::getBdd()->prepare('update section set designation=?, description=? where id=?');
        $response = $req->execute(array($designation, $description, $id));

        return $response;
    }
}

?>