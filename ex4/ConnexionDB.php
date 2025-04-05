<?php
class ConnexionDB
{
    private static $_dbname = "database";
    private static $_user = "root";
    private static $_pwd = "";
    private static $_host = "localhost";

    private static $_bdd = null;

    private function __construct()
    {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host, self::$_user, self::$_pwd);
            self::$_bdd->exec("CREATE DATABASE IF NOT EXISTS `" . self::$_dbname . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
            self::create_tables();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance(): ?PDO
    {
        if (!self::$_bdd) {
            new ConnexionDB();
            
        }
        return (self::$_bdd);
    }
    private static function create_tables(){
        $request = "create table if not exists student(
            id int primary key,
            name varchar(25),
            birthday date
        );";
        self::$_bdd->query($request);
    }
}
?>