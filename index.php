<?php

session_start();

ob_start();
// les options passées dans l'URL
// Si dans l'url un paramètre $_GET['url'] existe
// soit index;php?=la page


if(isset($_GET['route'])){
    $url = $_GET['route'];
}else{
    $url = "accueil";
}
// si $url retourne une chaine de caractères vide
if($url === ""){
// on redirige vers la page d'accueil
$url = "accueil";
}
// si $url ='accueil'
if($url === "accueil"){
    // on appel le fichier accueil.php
    require_once "pages/accueil.php";
    
    }elseif($url ==='connexion'){
    $title = "Accueil page de connexion";
    require_once "pages/formulaire.php";
    }
 
    else if($url === "administration" && isset($_SESSION['connexion']) && $_SESSION['connexion'] === true){
        $title = "Espace admin";
        require_once "pages/administration.php";
        }
   
    else if($url === "membre" && isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] === true){
        $title = "Espace membres";
        require_once "pages/accueil.php";
        }
        elseif($url === "deconnexion"){
            //on appel le fichier de deconnexion
            require_once "pages/deconnexion.php";
        }elseif($url != '#:[\w]+)#'){
        
        }

$content = ob_get_clean();
require_once "template.php";
?>
