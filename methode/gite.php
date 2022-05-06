<?php

require_once "methode/database.php";

class Gite extends Database
{

    private $id_nom_location;
    private $id_photo_location;
    private $id_prix_location;
    private $id_date_disponible;
    private $id_disponible;
    private $id_description_location;
    private $categorie_id;



    public function getGite(){


        $db = $this->getPDO();
        $sql = "SELECT * FROM location
                            INNER JOIN categorie on location.categorie_id = categorie.id_categorie
                            WHERE id_location ORDER BY location.id_location DESC";
        $gite = $db->query($sql);

        return $gite;
    }

    public function getGiteAdmin(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM location
                            INNER JOIN categorie on location.categorie_id = categorie.id_categorie 
                            WHERE id_location = ? ORDER BY location.id_location DESC";

        $gestionAdmin = $db->prepare($sql);

        $loc = $_GET['id_location'];

        $gestionAdmin->bindParam(1, $loc);

        $gestionAdmin->execute();

        $detail = $gestionAdmin->fetch();

        return $detail;
    }
    public function setGite(){
        //On verifie tous les champs du formulaires existe et ne sont pas vide
        //On assigne les $_POST[] = attribut HTML name="" au propriétés privées (variables)
        if (isset($_POST["id_nom_location"]) && !empty($_POST["id_nom_location"])) {
            $this->id_nom_location = trim(htmlspecialchars($_POST['id_nom_location']));
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ nom du gite</p>";
        }

        if (isset($_POST["id_description_location"]) && !empty($_POST["id_description_location"])) {
            $this->id_description_location = trim(htmlspecialchars($_POST['id_description_location']));
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ description du gite</p>";
        }
        //UPLOAD D' IMAGE
        if (isset($_FILES['id_photo_location'])) {
            $dossierImage = "assets/image";
            $img_gite = $dossierImage . basename($_FILES['id_photo_location']['name']);
            $_POST['id_photo_location'] = $img_gite;
            if (move_uploaded_file($_FILES['id_photo_location']['tmp_name'], $img_gite)) {
                echo '<p class="alert alert-success">Le fichier est valide et à été téléchargé avec succès !</p>';
            } else {
                echo '<p class="alert-danger">Une erreur s\'est produite, le fichier n\'est pas valide !</p>';
            }
        }
        //LE POSTE DE L'IMAGE
        if (isset($_POST['id_photo_location'])) {
            $this->id_photo_location = $_POST['id_photo_location'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ image du gite</p>";
        }
        //LE prix du Gite/Semaine
        if (isset($_POST['id_prix_location'])) {
            $this->id_prix_location = $_POST['id_prix_location'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ prix du gite</p>";
        }
        //le Booleen gite dispo ou non
        if (isset($_POST['id_disponible'])) {
            $this->id_disponible = $_POST['id_disponible'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ disponible</p>";
        }
        // La date de dispo du gite
        if (isset($_POST['id_date_disponible'])) {
            $this->id_date_disponible = $_POST['id_date_disponible'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ date d'arrivée</p>";
        }
        //Cle etrangère gite categorie
        if (isset($_POST['categorie'])) {
            $this->categorie_id = $_POST['categorie'];
        }

        try {
            $db = $this->getPDO();
            $sql = "INSERT INTO location
            (id_nom_location, id_photo_location, id_prix_location, id_date_disponible, id_description_location, id_disponible, categorie_id) 
                   VALUES (?,?,?,?,?,?,?)";
            $gestionGite = $db->prepare($sql);

            $gestionGite->bindParam(1, $this->id_nom_location);
            $gestionGite->bindParam(2, $this->id_photo_location);
            $gestionGite->bindParam(3, $this->id_prix_location);
            $gestionGite->bindParam(4, $this->id_date_disponible);
            $gestionGite->bindParam(5, $this->id_description_location);
            $gestionGite->bindParam(6, $this->id_disponible);
            $gestionGite->bindParam(7, $this->categorie_id);

            $rajout = $gestionGite->execute(array(
                $this->id_nom_location,
                $this->id_photo_location,
                $this->id_prix_location,
                $this->id_date_disponible,
                $this->id_description_location,
                $this->id_disponible,
                $this->categorie_id
            ));
            if ($rajout) {
                header("Location: Confirmation_de_la_création_du_gite");
            } else {
                echo "<p class='alert-danger p-3'>Une erreur est survenue durant l'ajout du gite, merci de verifié tous les champs !</p>";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du gites ! Merci de recommencer !" . $e->getMessage();
        }
    }
    public function deleteGite(){
        //recup de la connexion depuis la methode getPDO de la classe mere
        $db = $this->getPDO();
        //Recup de l'id du gite depuis URL (<a href=detail_gite?id_gite=CLE PRIMAIRE></a>)
        $del = $_GET['id_location'];
        //la requete SQL
        $sql = "DELETE FROM location WHERE id_location = ?";
        //La requète préparée pour lutter contre les injections SQL
        $delete = $db->prepare($sql);
        //On lie ID de URL = CLE PRIMAIRE a la requète SQL
        $delete->bindParam(1, $del);
        //On execute la requète
        $delete->execute();
        //Si ca marche = redirection vers une page de succès SINON on affiche une erreur
        if ($delete) {
            header("Location: supprimer-gite");
        } else {
            echo "<p class='alert-warning p-2'>Une erreur est survenue durant la supression de cet élément.</p>";
        }
    }

    public function updateGite(){
        $db = $this->getPDO();
        //On verifie tous les champs du formulaires existe et ne sont pas vide
        //On assigne les $_POST[] = attribut HTML name="" au propriétés privées (variables)
        if (isset($_POST["id_nom_location"]) && !empty($_POST["id_nom_location"])) {
            $this->id_nom_location = trim(htmlspecialchars($_POST['id_nom_location']));
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ nom du gite</p>";
        }

        if (isset($_POST["id_description_location"]) && !empty($_POST["id_description_location"])) {
            $this->id_description_location = trim(htmlspecialchars($_POST['id_description_location']));
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ description du gite</p>";
        }
        //UPLOAD D' IMAGE
        if (isset($_FILES['id_photo_location'])) {
            $dossierImage = "assets/image";
            $img_gite = $dossierImage . basename($_FILES['id_photo_location']['name']);
            $_POST['id_photo_location'] = $img_gite;
            if (move_uploaded_file($_FILES['id_photo_location']['tmp_name'], $img_gite)) {
                echo '<p class="alert alert-success">Le fichier est valide et à été téléchargé avec succès !</p>';
            } else {
                echo '<p class="alert-danger">Une erreur s\'est produite, le fichier n\'est pas valide !</p>';
            }
        }
        //LE POSTE DE L'IMAGE
        if (isset($_POST['id_photo_location'])) {
            $this->id_photo_location = $_POST['id_photo_location'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ image du gite</p>";
        }
        //LE prix du Gite/Semaine
        if (isset($_POST['id_prix_location'])) {
            $this->id_prix_location = $_POST['id_prix_location'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ prix du gite</p>";
        }
        //le Booleen gite dispo ou non
        if (isset($_POST['id_disponible'])) {
            $this->id_disponible = $_POST['id_disponible'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ disponible</p>";
        }
        // La date de dispo du gite
        if (isset($_POST['id_date_disponible'])) {
            $this->id_date_disponible = $_POST['id_date_disponible'];
        } else {
            echo "<p class='alert-danger p-2'>Merci de remplir le champ date d'arrivée</p>";
        }
        //Cle etrangère gite categorie
        if (isset($_POST['categorie'])) {
            $this->categorie_id = $_POST['categorie'];
        }
            $sql = "UPDATE location SET
            id_nom_location = ?,
            id_photo_location = ?,
            id_prix_location = ?,
            id_date_disponible = ?,
            id_description_location = ?,
            id_disponible = ?,
            categorie_id =?
            WHERE id_location= ?";

            $update = $_GET['id_location'];

            $gestionUpdateGite = $db->prepare($sql);

            $gestionUpdateGite->bindParam(1, $this->id_nom_location);
            $gestionUpdateGite->bindParam(2, $this->id_photo_location);
            $gestionUpdateGite->bindParam(3, $this->id_prix_location);
            $gestionUpdateGite->bindParam(4, $this->id_date_disponible);
            $gestionUpdateGite->bindParam(5, $this->id_description_location);
            $gestionUpdateGite->bindParam(6, $this->id_disponible);
            $gestionUpdateGite->bindParam(7, $this->categorie_id);

            $modif = $gestionUpdateGite->execute(array(
                $this->id_nom_location,
                $this->id_photo_location,
                $this->id_prix_location,
                $this->id_date_disponible,
                $this->id_description_location,
                $this->id_disponible,
                $this->categorie_id,
                $update,
            ));
            if ($modif) {
                header("Location: Confirmation_de_la_création_du_gite");
            } else {
                echo "<p class='alert-danger p-3'>Une erreur est survenue durant la mise à jour du gite, merci de verifié tous les champs !</p>";
            }
        
    }
}
