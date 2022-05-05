<?php

require_once "methode/gite.php";

$giteAdmin = new Gite();

$giteGestion = $giteAdmin->getGite();

?>
<div class="row mt-4 ms-5">



  <?php
  foreach ($giteGestion as $location) {
  ?>
    <div class="col-sm-6 my-4">
      <div class="card" style="width: 30rem;">

        <img src="<?= $location['id_photo_location'] ?>" class="card-img-top" alt="<?= $location['id_nom_location'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $location['id_nom_location'] ?></h5>
          <button class="card-text btn btn-primary">Nombre de Commentaire :<?= $location['id_commentaire'] ?></button><span><button class="btn btn-warning">Disponible le <?= $location['id_date_disponible'] ?></button></span>
          <p class="card-text text-danger border boder-solid-3px"><?= $location['id_commentaire_contenu'] ?></p>
          <a class="card-text btn btn-success" href="administration_Gite ?id_location=<?= $location['id_location'] ?>">gestion du gite</a>


        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>