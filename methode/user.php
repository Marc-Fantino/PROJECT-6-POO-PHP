<?php

require_once "methode/database.php";
class User extends Database{
    
    

    private $id_email_user;
    private $id_password_user;
    //private $repeatPassword;


    public function getConnexionUser(){
      
            $db = $this->getPDO();
            
            if(isset($_POST['id_email_user']) && !empty($_POST['id_email_user'])){   
            
            $this->id_email_user = trim(htmlspecialchars($_POST['id_email_user']));
            //faille xss = ON DESINFECTE LES DONNÉES = Sanitize
                //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
                //htmlspecialchars — Convertit les caractères spéciaux en entités HTML :: Cette fonction retourne une chaîne de caractères avec ces modificationss

            }else{
                echo"<p class='alert-danger p-3 mt-3'>Merci de remplir le champ Email</p>";
            }
            if(isset($_POST['id_password_user']) && !empty($_POST['id_password_user'])){   
            
                //on rajoute les paramètres des données en private
                $this->id_password_user = trim(htmlspecialchars($_POST['id_password_user']));
                //faille xss = ON DESINFECTE LES DONNÉES = Sanitize
                    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
                    //htmlspecialchars — Convertit les caractères spéciaux en entités HTML :: Cette fonction retourne une chaîne de caractères avec ces modificationss
    
                }else{
                    echo"<p class='alert-danger p-3 mt-3'>Merci de remplir le champ Mot de passe</p>";
                }
                //requete de connexion
                $sql ="SELECT * FROM user WHERE id_email_user = ? AND id_password_user = ? ";
                // requete préparé
                $user = $db->prepare($sql);
                
                //bind des paramètres
                
                $user->bindParam(1, $this->id_email_user);
                $user->bindParam(2, $this->id_password_user);
                //$user->bindParam(3, $this->repeatPassword);
                
                //attention ici 2 paramètre à liés
                // on éxécute la requète et on retourne un tableau associatif
                
                $user->execute();
                //On compte les entrées retournée par execute(tableau associatif)
                //SI on au minimum un admin dans la table
                if($user->rowCount()>=1){
                //Créer une variable qui liste (recherche) tous les elements
                $userLog = $user->fetch(PDO::FETCH_ASSOC);
                
                    if($this->id_email_user === $userLog['id_email_user'] && $this->id_password_user === $userLog['id_password_user']){
                        //Demarrage de session
                        session_start();
                        //Booléen pour verifier la connexion
                        $_SESSION['connexion_user'] = true;
                        $_SESSION['id_email_user'] =$this->id_email_user;
                        
                        header('Location: membre');
                    }else{
                        echo "<p class='alert-danger mt-3 p-2'>Erreur de connexion, merci de verifié votre email et mot de passe et recommencer !</p>";
                    }
                }else{
                    echo "<p class='alert-danger mt-3 p-2'>Erreur </p>";
                }
                
            }
            

}



