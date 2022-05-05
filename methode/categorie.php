<?php

require_once "methode/database.php";


class Categories extends Database
{

    public function getCategories(){
        $db = $this->getPDO();

        $sql = "SELECT * FROM categorie";

        $categories = $db->query($sql);
        return $categories;

    }

}