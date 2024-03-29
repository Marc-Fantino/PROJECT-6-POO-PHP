<?php


require_once "methode/gite.php";

$giteAdmin = new Gite();


$giteGestion = $giteAdmin->getGiteAdmin();




?>

<div class="container-fluid rouded p-3 detail" id="container">
    <h2 class="text-center text success"><b>Details Du Gite</b></h2>
    
    <div id="gite_id" class="bg-dark container-fluid border border-warning border-5 mb-5">
        <h2 class="text-center text-info">Style <?=$giteGestion['id_style']?></h2>
        
            <div class="row mt-3">
                <div class="col-4 bg-dark">
                    <img width="100%" class="img-fluid ms-2 mt-4 border border-warning border-5" src="<?=$giteGestion['id_photo_location']?>" alt="<?=$giteGestion['id_nom_location']?>">
                </div>
                <div class="col-8 bg-dark mb-2">
                    <div class="text-white text-center pt-5"><?=$giteGestion['id_description_location']?>
                    <p class="text-white mt-4">Prix :<?=$giteGestion['id_prix_location']?>€</p>
                    
                    <a class="card-text btn btn-warning" href="creation_gite ?id_location=<?=$giteGestion['id_location']?>">création de gite</a>
                    <a class="card-text btn btn-success" href="Mise_à_jour_du_gite ?id_location=<?=$giteGestion['id_location']?>">Mise à jour de gite</a>
                    <form method="POST">
                    <button name="btn-supprimer" class="card-text btn btn-danger mt-3 mb-2">supprimer de gite</button>
                    </form>
                    <?php
                    if (isset($_POST['btn-supprimer'])){
                        $giteDelete = $giteAdmin->deleteGite();
                    }
                    ?>
                    
                 
                    
                    <?php
                    //on demarre la session
                    // si la session est connecter on retourne a la page admin
                    if(isset($_SESSION['connexion']) && $_SESSION['connexion'] === true){
                    ?>
                    <a href="administration" class="btn btn-danger">Retour à l'administration</a>
                    <?php
                    }else{
                    ?>
                    <a href="accueil" class="btn btn-danger mt-4">Retour à l'accueil</a>
                    <?php
                    }
                    if(isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] === true){
                    ?>
                    <a href="accueil" class="btn btn-success">Retour au menu</a>
                    <?php
                    }else{
                    ?>
                    <a href="deconnexion" class="btn btn-success">Retour a l'accueil</a>
                    <?php
                    }
                    
                    ?>
                    
                    
                
                </div>
            </div>
    </div>
    
</div>