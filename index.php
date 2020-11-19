<?php

// fonction d'affichage d'un print_r() [2ème paramètre = 1] et d'un var_dump() [2ème paramètre = 2] avec balise <pre>
function debug($param, $exit = 2)
{
     if ($exit === 1) {
          echo '<pre style="background-color: #d5ecd4 ; margin: 10vh 15vw; padding: 1vw;">';
          echo '<strong>print_r(' . $param . ')</strong> <br>';
          print_r($param);
          echo '</pre>';
     } elseif ($exit === 2) {
          echo '<pre style="background-color: #ebd4cb; margin: 10vh 15vw; padding: 1vw;">';
          echo '<strong>var_dump(' . $param . ')</strong> <br>';
          var_dump($param);
          echo '</pre>';
     }
}

// debug($_GET, 2);

if (!empty($_GET)) {

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Phoenix Holidays</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link rel="stylesheet" href="#">

     <style>
          html{position: relative; min-height: 100%;}
          body{margin-bottom: 6vh; /* Margin bottom by footer height */}
          .choisir {margin-top: 5vh; margin-bottom: 5vh;}
          .with-nav { margin-top: 10vh;}
          .footer{position: absolute; /*bottom: 0; */ width: 100%; height: 60px; /* Set the fixed height of the footer here */ line-height: 60px; /* Vertically center the text there */ background-color: #75c9c8; font-size: 1.373em;}
               /*END Sticky footer specific style*/
               /*margin bottom for the header*/
          /*header{margin-bottom: 10vh; }*/
          .container-fluid { padding-left: 0; padding-right: 0;}
          /*END argin bottom for the nav*/
          .carousel100 {max-height: 80vh;}
          .carousel10 {max-height: 30vh;}
          .row {margin-top: 6vh; margin-bottom: 6vh;}
          .card-img-top {max-height: 13.5vh;}
          form > div.row {margin-top: 0vh; margin-bottom: 2vh;}
          #confirmer > .row{margin-top: 0vh; margin-bottom: 1.65vh;}
          .img-thumbnail {height: 10vh; }
          .row.card-deck {margin-bottom: 3.4vh;}
          .blockquote-footer {font-size: 48%; text-align: right;}
     </style>
</head>
<body>
     
     <!-- Navbar -->
<?php 
if (empty($_GET)) {
     ?>
     <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="height: 10vh;">
<?php 
} else {
     ?>
     <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #75c9c8;">
<?php 
}
?>
          <div class="container">
               <a class="navbar-brand" href="workshop_2.php"> <i class="fab fa-phoenix-framework fa-2x"></i> </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item active">
                              <a class="nav-link" href="workshop_2.php">Phoenix <span class="sr-only">(current)</span></a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="?action=choisir">Choisir une destination</a>
                         </li>
                         <!-- <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown
                              </a> 
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="#">Action</a>
                                   <a class="dropdown-item" href="#">Another action</a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                         </li> -->
                         <li class="nav-item">
                              <a class="nav-link disabled" href="#">Payer</a>
                         </li>
                    </ul>
               </div>
          </div>
          <!-- End .container -->
     </nav>
     <!-- End Navbar -->

<?php 
if (empty($_GET)) {
     ?>
     <!-- carousel avec controls -->
     <div class="container-fluid">     
          <div id="#" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                    <div class="carousel-item active">
                         <img class="d-block w-100 img-fluid carousel100" src="img/caraibes1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel100" src="img/maldives.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel100" src="img/maurice.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel100" src="img/turkoise.jpg" alt="Third slide">
                    </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
               </a>
          </div> <!-- fin carousel -->
          <div class="container choisir">
               <a href="?action=choisir" class="btn btn-outline-info btn-block">Choisir mon séjour tout de suite !</a>
          </div>  
     </div> <!-- fin .container-fluid -->
<?php 
} else {
     ?>
     <!-- carousel avec controls -->
     <div class="container with-nav">     
          <div id="#" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                    <div class="carousel-item active">
                         <img class="d-block w-100 img-fluid carousel10" src="img/caraibes1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel10" src="img/maldives.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel10" src="img/maurice.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                         <img class="d-block w-100 img-fluid carousel10" src="img/turkoise.jpg" alt="Third slide">
                    </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
               </a>
          </div> <!-- fin carousel -->
<?php 
}
if (isset($_GET['action']) && $_GET['action'] == 'choisir') {
     ?> 
          <section>
               <div class="row">
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Les Boucaniers</h4>
                                   <p class="card-text">Après les eaux calmes, partez à la découverte des spectaculaires cascades des gorges de la Falaise, à Trinité.</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/sicile_kamarina.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Kamarina</h4>
                                   <p class="card-text">Bienvenue au pays de l'Etna où ruelles escarpées et places en fleurs s'ouvrent sur la Méditerranée !</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/maldives_fino.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Finohlu</h4>
                                   <p class="card-text">Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s'équilibrent à merveille.</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/maurice_albion.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Albion sauvage</h4>
                                   <p class="card-text">Au cœur de l’Ile, un swing au golf, l’adrénaline du trapèze volant ou la beauté des fonds marins ... que choisir ?</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/maldives_kani.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Kani</h4>
                                   <p class="card-text">Ile-jardin posée sur des eaux turquoises, découvrez le paradis au cœur de l'archipel des Maldives.</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/grece_gregolimano.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Gregolimano</h4>
                                   <p class="card-text">L’île d’Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Egée ... en ski nautique</p>
                                   <a href="?action=reserver" class="btn btn-outline-info btn-block">Réserver maintenant !</a>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
<?php 
} elseif (isset($_GET['action']) && $_GET['action'] == 'reserver') {
     ?>
          <section>
               <div class="row">
                    <div class="col-4">
                         <div class="card border-info">
                              <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                              <div class="card-body">
                                   <h4 class="card-title">Les Boucaniers</h4>
                                   <!-- <p class="card-text">Après les eaux calmes, partez à la découverte des spectaculaires cascades des gorges de la Falaise, à Trinité.</p> -->
                              </div>
                              <div class="card-footer alert-info">
                                   1 semaine / personne : 750 €
                              </div>
                         </div>
                    </div> <!-- end .col-4 -->
                    <div class="col-8">
                         <div class="card border-info">
                              <div class="card-header alert-info">
                                   <h4>Je complète mes informations de réservation &nbsp; <i class="fab fa-phoenix-framework"></i></h4>
                                    <!-- <div class="blockquote-footer"><i class="fab fa-phoenix-framework fa-2x"></i></div> -->
                              </div>
                              <div class="card-body">
                                   <form>
                                        <!-- <div class="row">
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Nom">
                                             </div>
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Prénom">
                                             </div>
                                        </div> -->
                                        <div class="row">
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Email de confirmation">
                                             </div>
                                        </div>
                                        <!-- <div class="row">
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Ville">
                                             </div>
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Pays">
                                             </div>
                                        </div> -->
                                        <div class="row">
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Je pars combien de semaines ?">
                                             </div>
                                             <div class="col">
                                                  <input type="text" class="form-control" placeholder="Nombre de vacanciers">
                                             </div>
                                        </div>
                                        <a href="?action=confirmer" class="btn btn-info btn-block">Confirmer ma réservation</a>
                                   </form>
                              </div> <!-- end .card-body -->
                         </div> <!-- end .card -->
                    </div> <!-- end .col-8 -->
               </div> <!-- end .row -->
          </section>

          <section>
               <div class="row card-deck">
                    <div class="card">
                         <img class="img-thumbnail" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/sicile_kamarina.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maldives_fino.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maurice_albion.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maldives_kani.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/grece_gregolimano.jpg" alt="Card image cap">
                    </div>   
               </div> <!-- end .card-deck --> 
          </section>
<?php 
} elseif (isset($_GET ['action']) && $_GET ['action'] == 'confirmer') {
?>
            <section id="confirmer">
                  <div class="row">
                        <div class="col-12">
                              <div class="alert alert-info"><i class="fab fa-phoenix-framework"></i> &nbsp;  Récapitulatif de votre réservation pour Les Boucaniers</div>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-2">
                              <div class="alert alert-warning" role="alert">Participant(s)</div>
                        </div>
                        <div class="col-4">
                              <div class="alert alert-warning" role="alert">2</div>
                        </div>
                        <div class="col-2">
                              <div class="alert alert-success" role="alert">Commande</div>
                        </div>
                        <div class="col-4">
                              <div class="alert alert-success" role="alert">1</div>
                        </div>
                  </div> 

                  <div class="row">
                        <div class="col-2">
                              <div class="alert alert-warning" role="alert">Semaine(s) :</div>
                        </div>
                        <div class="col-4">
                              <div class="alert alert-warning" role="alert">3</div>
                        </div>
                        <div class="col-2">
                              <div class="alert alert-success" role="alert">Total</div>
                        </div>
                        <div class="col-4">
                              <div class="alert alert-success" role="alert">4500 €</div>
                        </div>
                  </div> 

                  <div class="row">
                        <div class="col-12">                      
                              <div class="alert alert-info" style="text-align: right;">Bon séjour &nbsp; <i class="fab fa-phoenix-framework"></i>
                        </div>
                  </div>  
            </section>
            <section>
               <div class="row card-deck">
                    <div class="card">
                         <img class="img-thumbnail" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/sicile_kamarina.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maldives_fino.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maurice_albion.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/maldives_kani.jpg" alt="Card image cap">
                    </div>   
                    <div class="card">
                         <img class="img-thumbnail" src="img/grece_gregolimano.jpg" alt="Card image cap">
                    </div>   
               </div> <!-- end .card-deck --> 
          </section>
          </div>
          </div>
<?php
}
 ?>
     </div> <!-- fin .container -->
     <footer class="footer">
          <div class="container">
               <span class="text-muted"><i class="fas fa-umbrella-beach"></i>&nbsp Vos vacances de rêve ... &nbsp<i class="fas fa-sun"></i>&nbsp Plage ... &nbsp<i class="fas fa-city"></i>&nbsp Urbaine ... &nbsp<i class="fab fa-docker"></i>&nbsp Croisière ... &nbsp<i class="fas fa-image"></i>&nbsp Montagne ... &nbsp<i class="fas fa-euro-sign"></i>&nbsp A prix tout doux ... &nbsp<i class="fas fa-umbrella-beach"></i></span>
          </div>
     </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"> </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"> </script>
</body>
</html>