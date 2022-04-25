<?php

require_once "methode/database.php";

class Gite extends Database{


    public function getGite(){
      
           
            $db = $this->getPDO();
            $sql = "SELECT * FROM location";
            $gite =$db->query($sql);
             return $gite;
            }

           
}
