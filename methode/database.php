<?php

namespace methode;

use PDO as GlobalPDO;

class pdo{
    
    private $BaseDonnee;
    private $user;
    private $pass;
    private $hote;
    
    
    public function __construct($BaseDonnee, $user ='root', $pass = '', $hote = 'localhost'){
    
    $this->$BaseDonnee = $BaseDonnee;
    $this->$user = $user;
    $this->$pass = $pass;
    $this->$hote = $hote;

    }    
    
    private function getPDO(){
        
        $pdo = new PDO('mysql:host=".'$hote.';dbname='.$BaseDonnee.';charset=UTF8", $user,$pass');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    
    }
    
    public function query($statement){
        
        $requet = $this->getPDO()>query("SELECT * FROM location 
        INNER JOIN categorie ON location.categorie_id = categorie.id_categorie 
        INNER JOIN commentaires ON location.commentaire_id = commentaire.id_commentaire 
        INNER JOIN user ON location.user_id=user.id_user");
        $donnee = $requet ->fetchAll(PDO::FETCH_OBJ);
        return $donnee;
    }
}
