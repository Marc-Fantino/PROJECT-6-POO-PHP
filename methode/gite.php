<?php

require_once "methode/database.php";

class Gite extends Database{


    public function getGite(){
      
           
            $gite = $this->getPDO();
            $sql = "SELECT * FROM gite WHERE id_location = ?";
            $gite =$gite->query($sql);
             return $gite;
            }

           
}
