<?php

require_once "methode/database.php";
class Admin extends Database{
    
    

    private $id_email_admin;
    private $id_password_admin;


    public function getConnexionAdmin(){
      
            $db = $this->getPDO();
            
            if(isset($_POST['id_email_admin']) && !empty($_POST['id_email_admin'])){   
            
            $this->id_email_admin = trim(htmlspecialchars($_POST['id_email_admin']));
            //faille xss = ON DESINFECTE LES DONNÉES = Sanitize
                //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
                //htmlspecialchars — Convertit les caractères spéciaux en entités HTML :: Cette fonction retourne une chaîne de caractères avec ces modificationss

            }else{
                echo"<p class='alert-danger p-3 mt-3'>Merci de remplir le champ Email</p>";
            }
            if(isset($_POST['id_password_admin']) && !empty($_POST['id_password_admin'])){   
            
                //on rajoute les paramètres des données en private
                $this->id_password_admin = trim(htmlspecialchars($_POST['id_password_admin']));
                //faille xss = ON DESINFECTE LES DONNÉES = Sanitize
                    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
                    //htmlspecialchars — Convertit les caractères spéciaux en entités HTML :: Cette fonction retourne une chaîne de caractères avec ces modificationss
    
                }else{
                    echo"<p class='alert-danger p-3 mt-3'>Merci de remplir le champ Mot de passe</p>";
                }
                //requete de connexion
                $sql ="SELECT * FROM admin WHERE id_email_admin = ? AND id_password_admin = ? ";
                // requete préparé
                $admin = $db->prepare($sql);
                
                //bind des paramètres
                
                $admin->bindParam(1, $this->id_email_admin);
                $admin->bindParam(2, $this->id_password_admin);
                //attention ici 2 paramètre à liés
                // on éxécute la requète et on retourne un tableau associatif
                
                $admin->execute();
                //On compte les entrées retournée par execute(tableau associatif)
                //SI on au minimum un admin dans la table
                if($admin->rowCount()>=1){
                //Créer une variable qui liste (recherche) tous les elements
                $adminLog = $admin->fetch(PDO::FETCH_ASSOC);
                
                    if($this->id_email_admin === $adminLog['id_email_admin'] && $this->id_password_admin === $adminLog['id_password_admin']){
                        //Demarrage de session
                        session_start();
                        //Booléen pour verifier la connexion
                        $_SESSION['connexion'] = true;
                        $_SESSION['id_email_admin'] =$this->id_email_admin;
                        
                        header('Location: administration');
                    }else{
                        echo "<p class='alert-danger mt-3 p-2'>Erreur de connexion, merci de verifié votre email et mot de passe et recommencer !</p>";
                    }
                }else{
                    echo "<p class='alert-danger mt-3 p-2'>Erreur </p>";
                }
                
            }
            

}


