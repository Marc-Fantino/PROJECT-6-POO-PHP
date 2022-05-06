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
  
 
    elseif($url === "administration" && isset($_SESSION['connexion']) && $_SESSION['connexion'] === true){
        $title = "Espace admin";
        require_once "pages/administration.php";
        }
        
        elseif($url ==="administration_Gite" && isset($_GET['id_location']) && $_GET['id_location'] > 0){
            $title ="Administration du Gite";
            require_once "pages/administration_Gite.php";
        }
        elseif($url ==="creation_gite" && isset($_GET['id_location']) && $_GET['id_location'] > 0){
            $title ="creation du Gite";
            require_once "pages/creation_gite.php";
        }
        elseif($url ==="Mise_à_jour_du_gite" && isset($_GET['id_location']) && $_GET['id_location'] > 0){
            $title ="Mse_à_jour_du_gite";
            require_once "pages/update_gite.php";
        }
      
            elseif($url === "Confirmation_de_la_création_du_gite" && isset($_SESSION['connexion']) && $_SESSION['connexion'] === true){
                $title = "Confirmation_de_la_création_du_gite";
                require_once "pages/confirmation-creation.php";
                }
            elseif($url === "supprimer-gite" && isset($_SESSION['connexion']) && $_SESSION['connexion'] === true){
                $title = "supprimer du gite";
                require_once "pages/supprimer-gite.php";
                }
    elseif($url === "membre" && isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] === true){
        $title = "Espace membres";
        require_once "pages/accueil.php";
        }
        
        elseif($url === "creation_gite" && isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] === true){
            $title = "Création de gite";
            require_once "pages/creation_gite.php";
            }
          
          
        elseif($url === "deconnexion"){
            //on appel le fichier de deconnexion
            require_once "pages/deconnexion.php";
        }elseif($url != '#:[\w]+)#'){
        
        }

$content = ob_get_clean();
require_once "template.php";
