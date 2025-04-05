<?php
include_once "connection.php";

class Repository{
    private $bdd;
    private $table;
    public function __construct($table){
        $this->bdd = Connection::getInstance();
        $this->table = $table;
    }
    public function findAll(){
        $req = $this->bdd->query("select * from $this->table");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id){
        $req = $this->bdd->prepare("select * from $this->table where id=?");
        $req->execute(array($id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    public function create($assocArray){
        $columns = implode(', ', array_keys($assocArray) );
        $placeholders = str_repeat( '?,',count($assocArray) );
        $placeholders = substr($placeholders, 0, -1);

        $req = $this->bdd->prepare("insert into $this->table ($columns) values($placeholders)");
        return $req->execute(array_values($assocArray));
    }
    public function delete($id){
        $req = $this->bdd->prepare("delete from $this->table where id=?");
        return $req->execute(array($id));
    }
}

?>