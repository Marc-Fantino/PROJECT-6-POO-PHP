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
            $sql = "SELECT * FROM location";
            $gite =$db->query($sql);
            
             return $gite;
            }

                public function getReservation(){
                        
                                $db = $this->getPDO();
                                $sql = "SELECT * FROM location WHERE id_nom_location =? AND  id_photo_location =? AND id_prix_location =? AND id_date_disponible =? AND id_date_indisponible =? AND id_description_location = ?"; 
                                $reservation =$db->prepare($sql);
                                
                                $reservation->bindParam(1, $this->id_nom_location);
                                $reservation->bindParam(2, $this->id_photo_location);
                                $reservation->bindParam(3, $this->id_prix_location);
                                $reservation->bindParam(4, $this->id_date_disponible);
                                $reservation->bindParam(5, $this->id_date_indisponible);
                                $reservation->bindParam(6, $this->id_description_location);
                                
                        $reservation->execute();
                        
                        if($reservation->rowCount()>=1){
                        
                        $logResa = $reservation->fetch(PDO::FETCH_ASSOC);
                        if($this->id_nom_location === $logResa['id_nom_location'] && $this->id_photo_location === $logResa['id_photo_location'] && $this->id_prix_location === $logResa['id_prix_location'] && $this->id_date_disponible === $logResa['id_date_disponible'] && $this->id_date_indisponible === $logResa['id_date_indisponible'] && $this->id_description_location === $logResa['id_description_location']){
                         //Demarrage de session
                         session_start();
                         //Booléen pour verifier la connexion
                         $_SESSION['connexion_user'] = true;
                         $_SESSION['id_email_user'] =$this->id_email_user;
                        }
                }
        
     
        
        
        
        }
           
}
