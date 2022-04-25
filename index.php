

<?php
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
    
    }else{
    echo "erreur";
    }


$content = ob_get_clean();
require_once "template.php";
?>
