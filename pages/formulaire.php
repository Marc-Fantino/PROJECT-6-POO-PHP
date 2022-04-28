

<?php
 require_once "methode/admin.php";
 require_once "methode/user.php";

// Instance de la class Administrateur
$giteUser = new User();
// instance de la classe Utilisateur
$giteAdmin = new Admin();

?>
 <div class="container mt-3">
          <img src="assets/image/village-sud.jpg" alt="Village du sud de la france" width="100%" height="300px">
       </div>
<div class="container border border-primary-3 mt-4" id="form-admin">
  <?php
  if(isset($_SESSION['connecter']) && $_SESSION['connecter'] === true){
    header("administration");
  }else{
  
  ?>
  
  
      
       <h2 class="mt-2 text-center text-warning">Connexion a votre espace d'administration</h2>
            <form action="" method="POST">
                <div class="mb-3 row mt-4">
                  <label for="Email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" name="id_email_admin" placeholder="Mail" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="id_password_admin" placeholder="Mot de passe" required>
                  </div>
                </div>
                <button name="btn_valide_admin" type="submit" class="btn btn-primary">Connexion</button>
            </form>
  
  
  <?php
      if(isset($_POST['btn_valide_admin'])){
                  $giteAdmin->getConnexionAdmin();
              }
        }
     
   ?>
</div>

<div class="container mt-4 border border-success-3" id="form-user">
    <?php
    if(isset($_SESSION['connecter_user']) && $_SESSION['connecter_user'] === true){
      header("connexionUser");
    }else{ 
    
    ?>
    
         <h2 class="mt-2 text-center text-warning">Connexion a votre espace membres</h2>
              <form action="" method="POST">
                  <div class="mb-3 row mt-4">
                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Email" name="id_email_user" placeholder="Mail" required>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="id_password_user" placeholder="Mot de passe" required>
                    </div>
                  </div>
                  <button name="btn_valide_user" type="submit" class="btn btn-primary">Connexion</button>
              </form>

    <?php
        
        if(isset($_POST['btn_valide_user'])){
          $giteUser->getConnexionUser();
        }
        }
          
     ?>
</div>
 