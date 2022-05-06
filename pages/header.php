    <header>
        <nav class="navbar navbar-expand-lg navbar-white bg-dark">
              <div class="container ms-5 ps-5">
                <a class="navbar-brand" href="accueil">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Reservation</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link" href="#">Nos retours clients</a>
                        </li>
                        <li class="nav-item">
                        <?php
                        //si l'utilisateur est correctement connecter a sa session en utilisateur
                        if(isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] ===true){
                        ?>
                        <h6 class="text-primary mt-2">utilisateur :<?=$_SESSION['id_email_user']?></h6>
                        <?php
                        //on verifie que la personne est connecté en tant qu'administrateur 
                        }
                        if(isset($_SESSION['connexion']) && $_SESSION['connexion'] ===true){
                        ?>
                        <div class="d-flex">
                          <a class="nav-link" href="administration">administration</a>
                            <h6 class="text-warning mt-2">administrateur : <?= $_SESSION['id_email_admin']?>
                            </h6>
                        </div>
                        <?php
                        }
                        ?>
                    </li>
                    <li>
                  
                      
                        <?php
                          //si on est connecter en tant que utilisateur ou admin le bouton connexion se transforme en deconnexion et l'inverse
                          if(isset($_SESSION['connexion']) && $_SESSION['connexion'] === true || isset($_SESSION['connexion_user']) && $_SESSION['connexion_user'] === true){
                          ?>
                            <a class="nav-link btn btn-danger" href="deconnexion">Deconnexion</a>
                          <?php
                          }else{
                          ?>
                            <a class="nav-link btn btn-warning mr-3" href="connexion">Connexion</a>
                          <?php
                          }
                        ?>
                    </li>
                  </ul>
                </div>
        </div>
          </nav>
    </header>
