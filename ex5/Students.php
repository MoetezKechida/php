<?php

include_once "Connection.php";

class Students{
    static private $bdd;
    
    private function __construct(){
    }

    static function getBdd() {
        if (!self::$bdd) {
            self::$bdd = Connection::getInstance();
        }
        return self::$bdd;
    }

    static function addStudent($name, $birthday, $imageName, $section){
        $req = self::getBdd()->prepare('insert into etudiant (name, birthday, image, section) values(?,?,?,?)');
        $response = $req->execute(array($name, $birthday, $imageName, $section));
        return $response;
    }

    static function getStudent($id){
        $req = self::getBdd()->prepare('select * from etudiant where id=?');
        $req->execute(array($id));

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    static function getStudentBySection($section){
        $req = self::getBdd()->prepare('select * from etudiant where section=?');
        $req->execute(array($section));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    static function getAll(){
        $req = self::getBdd()->query('select * from etudiant');

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    static function deleteStudent($id){
        $req = self::getBdd()->prepare('delete from etudiant where id=?');
        $response = $req->execute(array($id));

        return $response;
    }

    static function updateStudentImage($id, $imageName){
        $req = self::getBdd()->prepare('update etudiant set image=? where id=?');
        $response = $req->execute(array($imageName, $id));

        return $response;
    }
    static function updateStudentSection($id, $section){
        $req = self::getBdd()->prepare('update etudiant set section=? where id=?');
        $response = $req->execute(array($section, $id));

        return $response;
    }
    static function getStudentsByNameFilter($filter){
        $req = self::getBdd()->prepare('select * from etudiant
                                        where name like ?');
        $req->execute(array("%$filter%"));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>