<?php

class Database{
    
    private $BaseDonnee ='gite';
    private $user ='root';
    private $pass ='';
    private $hote ='localhost';
     
    
    public function getPDO(){
        try{
            $pdo = new PDO('mysql:host='.$this->hote.';dbname='.$this->BaseDonnee.";charset=UTF8", $this->user ,$this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch (PDOException $e){
            echo "erreur !".$e->getMessage() . "</br>";
        die();
        }
      

    return $pdo;
}
 
}
