<?php

include_once "autoloader.php";

class Student{
    static private $bdd;

    private function __construct(){
    }

    static function getBdd() {
        if (!self::$bdd) {
            self::$bdd = ConnexionDB::getInstance();
        }
        return self::$bdd;
    }
    static function addStudent($id, $name, $birthday){
        $req = self::getBdd()->prepare('select * from student where id=?');
        $req->execute(array($id));
        if($req->fetch(PDO::FETCH_ASSOC)==null)
        {
            $req = self::getBdd()->prepare('insert into utilisateur (id, name, birthday) values(?,?,?)');
            $req->execute(array($id, $name, $birthday));
        }
    }

}
?>