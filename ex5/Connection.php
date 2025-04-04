<?php
class Connection{
    private static $dbname = "tpphpex5";
    private static $user = "root";
    private static $pwd = "";
    private static $host = "localhost";
    private static $port = "3307";

    private static $bdd = null;

    private function __construct(){
        try{
            self::$bdd = new PDO("mysql:host=" . self::$host . ";port=".self::$port." ;dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        } catch (PDOException $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance(){
        if (!self::$bdd){
            new Connection();
        }
        return (self::$bdd);
    }
}
?>