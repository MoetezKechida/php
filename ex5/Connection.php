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
            self::$bdd = new PDO("mysql:host=" . self::$host . ";port=" . self::$port, self::$user, self::$pwd);
            self::$bdd->exec("CREATE DATABASE IF NOT EXISTS `" . self::$dbname . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            self::$bdd = new PDO("mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        } catch (PDOException $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance(){
        if (!self::$bdd){
            new Connection();
            self::create_tables();
        }
        return (self::$bdd);
    }
    private static function create_tables(){
        $request = "create table if not exists utilisateur(
            id int auto_increment primary key,
            username varchar(20),
            email varchar(50),
            password varchar(100),
            role ENUM('admin', 'user')
        );";
        self::$bdd->query($request);

        $request = "create table if not exists section(
            id int auto_increment primary key,
            designation varchar(50),
            description varchar(255)
        );";
        self::$bdd->query($request);

        $request = "create table if not exists etudiant(
            id int auto_increment primary key,
            name varchar(20),
            birthday date,
            image varchar(50),
            section int,
            constraint fk_etudiant_section foreign key(section) references section(id)
        );";
        self::$bdd->query($request);
    }
}
?>