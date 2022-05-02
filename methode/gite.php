<?php

require_once "methode/database.php";

class Gite extends Database{

        private $id_nom_location;
        private $id_photo_location;
        private $id_prix_location;
        private $id_date_indisponible;
        private $id_date_disponible;
        private $id_description_location;
   

                    public function getGite(){
                      
                           
                            $db = $this->getPDO();
                            $sql = "SELECT * FROM location INNER JOIN categorie on location.categorie_id = categorie.id_categorie INNER JOIN commentaires on location.commentaire_id =commentaires.id_commentaire WHERE id_location ORDER BY location.id_location DESC";
                            $gite =$db->query($sql);
                            
                             return $gite;
                            }

   

           
}
