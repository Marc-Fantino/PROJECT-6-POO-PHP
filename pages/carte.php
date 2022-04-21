
<?php


?>
<div class="container d-flex">
  <div class="row">
  <?php
  foreach($PDO as $location)
  {
  ?>
    <div class="col-sm-6">
    <div class="card" style="width: 30rem;">
  <img src="<?=$location['id_photo_location']?>" class="card-img-top" alt="<?=$location['id_nom_location']?>">
  <div class="card-body">
    <h5 class="card-title"><?=$location['id_nom_location']?></h5>
    <p class="card-text"><?=$location['id_description_location']?></p>
    <a href="#" class="btn btn-primary">Reservé</a>
  </div>
</div>
    </div>
    <?php
}
?>
  </div>
</div>
