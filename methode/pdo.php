<?php



$user = 'root';
$pass ="";
$BaseDonnee = "gite";
$hote = "localhost";
try{

$gite =new PDO("mysql:host=".$hote.";dbname=".$BaseDonnee.";charset=UTF8", $user,$pass);
$gite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){

die();
}
$sql ="SELECT * FROM location 
INNER JOIN categorie ON location.categorie_id = categorie.id_categorie 
INNER JOIN commentaires ON location.commentaire_id = commentaire.id_commentaire 
INNER JOIN user ON location.user_id=user.id_user";

$locations = $gite->query($sql);

class PDO
{
    private static $database;
    
    public static function getDatabase();
        return new methode/

{
    $user = 'root';
    $pass ="";
    $BaseDonnee = "gite";
    $hote = "localhost";
    try{
    
    $gite =new PDO("mysql:host=".$hote.";dbname=".$BaseDonnee.";charset=UTF8", $user,$pass);
    $gite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
    
    die();
    }
    $sql ="SELECT * FROM location 
    INNER JOIN categorie ON location.categorie_id = categorie.id_categorie 
    INNER JOIN commentaires ON location.commentaire_id = commentaire.id_commentaire 
    INNER JOIN user ON location.user_id=user.id_user";
    
    $locations = $gite->query($sql);
}
}

$PDO = new PDO();