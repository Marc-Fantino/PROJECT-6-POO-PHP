<?php
require "methode/gite.php";

$giteLoc = new Gite();


$gite = $giteLoc->getGite();

?>
<div class="row">
<?php
foreach($gite as $location)
{
?>

  <div class="col-sm-6">
  <div class="card" style="width: 30rem;">
<img src="<?=$location['id_photo_location']?>" class="card-img-top" alt="<?=$location['id_nom_location']?>">
<div class="card-body">
  <h5 class="card-title"><?=$location['id_nom_location']?></h5>
  <p class="card-text"><?=$location['id_description_location']?></p>
  <a href="formulaire.php" class="btn btn-primary">Reservé</a>
</div>
</div>
  </div>
  <?php
}
?>
</div> 