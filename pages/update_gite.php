

<?php
require_once "methode/Categorie.php";
require_once "methode/gite.php";


$categorieClasse = new Categories();
$giteAdmin = new Gite();

$categoriesLieux = $categorieClasse->getCategories();
$detail = $giteAdmin ->getGiteAdmin();


?>

<div class="container bg-dark w-50">
    
    <!--La methode post recup les l'attribut name de chaque elements du formulaire a l'aide de la super global $_POST['name=id-gite']-->
    <form method="POST" enctype="multipart/form-data">
        <div class="mt-3">
            <label for="id_nom_location"></label>
            <input type="text" id="id_nom_location" value="<?=$detail['id_nom_location']?>" name="id_nom_location" class="form-control" placeholder="Nom de la location">
        </div>
        <div class="mt-3">
            <label for="id_description_location"></label>
            <textarea type="text" id="id_description_location" name="id_description_location" class="form-control" placeholder="Description de la location"></textarea>
        </div>
        
        <div class="form-group">
            <label for="id_photo_location">Image du gite</label>
            <br>
            <input class="btn btn-ouline-warning" value="<?=$detail['id_photo_location']?>" type="file" id="id_photo_location" name="id_photo_location" accept="image/png, image/jpeg, image/webp image/bmp, image/svg">
        </div>
        <div class="mt-3">
            <label for="id_prix_location"></label>
            <input type="number" id="id_prix_location" value="<?=$detail['id_prix_location']?>" name="id_prix_location" class="form-control" placeholder="Prix de la location"/>
        </div>
        
        <div class="mt-3">
            <label for="id_disponible">Est disponible
                <select name="id_disponible" class="form-control">
                    <option value="0">non</option>
                    <option value="1">oui</option>
                </select>
            </label>
        </div>
        <div class="mt-3">
            <label for="categorie">Choix de la catégorie
                <select name="categorie" class="form-control" id="">
                    <?php
                        foreach ($categoriesLieux as $categorie){
                            ?>  
                                <option value="<?=$categorie['id_categorie']?>">
                                    <?=$categorie['id_style']?>
                                </option>
                            <?php
                        }
                    ?>
                </select>
            </label>
        </div>

        <div class="mt-3">
            <label for="id_date_disponible">Dépot de l'offre</label>
            <input type="date" id="id_date_disponible" value="<?=$detail['id_date_disponible']?>" name="id_date_disponible" class="form-control" placeholder="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>"></input>
        </div>
        <!--
        <div class="mt-3">
            <label for="id_date_indisponible">Date de départ</label>
            <input type="date" id="id_date_indisponible" name="id_date_indisponible" class="form-control" placeholder="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>" required></input>
        </div>
        -->
        <button type="submit" name="btn-update-gite" class="btn btn-outline-success text-center">Modifier le gite</button>
        <a class="btn btn-outline-success mt-5 mb-5" href="administration">Retour au gite</a>
    </form>
</div>
<?php
    if(isset($_POST['btn-update-gite'])){
        $updateGite = $giteAdmin->updateGite();
        
    }
    ?>
