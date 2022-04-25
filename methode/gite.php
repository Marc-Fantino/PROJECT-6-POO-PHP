<?php

require_once "../methode/database.php";

class Gite extends Database{

    private $id_location  = 'id_location';
    private $id_nom_location = 'id_nom_location';
    private $id_photo_location = 'id_photo_location';
    private $id_prix_location = 'id_prix_location';
    private $id_date_indisponible = 'id_date_indisponible';
    private $id_description_location = 'id_description_location';
    
    public function getGite(){
      
        $gite = new Gite($this->id_location ,$this->id_nom_location, $this->id_photo_location, $this->id_prix_location, $this->id_date_indisponible, $this->id_description_location);
            $gite = $this->getGite();
            $sql = "SELECT * FROM gite WHERE id_location = ?";
             $gite =$gite->query($sql);
             return $gite;
            }

           
}
