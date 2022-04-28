
<?php
require "methode/gite.php";

$giteLocResa = new Gite();


$giteResa = $giteLocResa->getReservation();

?>
<div class="row mt-4 ms-5">


  <div class="col-sm-6 my-4">
  <div class="card" style="width: 30rem;">
<img src="<?=$reservation['id_photo_location']?>" class="card-img-top" alt="<?=$reservation['id_nom_location']?>">
<div class="card-body">
  <h5 class="card-title"><?=$reservation['id_nom_location']?></h5>
  <p class="card-text"><?=$reservation['id_description_location']?></p>
  <a href="formulaire.php" class="btn btn-primary">Reservé</a>
</div>
</div>
  </div>

</div> 