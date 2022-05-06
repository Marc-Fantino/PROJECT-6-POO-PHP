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
          <p><?= $location['id_description_location'] ?></p>
          <button class="btn btn-warning">Disponible le <?= $location['id_date_disponible'] ?></button>
          
          <a class="card-text btn btn-success" href="administration_Gite ?id_location=<?= $location['id_location'] ?>">gestion du gite</a>


        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>