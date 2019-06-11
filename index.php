<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Bois De Violette</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aff_user.php">Clients</a>
          </li>
          <li class="nav-item">
              <?php
              extract($_GET);
              $id=$_GET['id'];
         echo"<a class=nav-link href=commande.php?id=$id>Commande</a>"; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Catégorie</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Salon</a>
          <a href="#" class="list-group-item">Lit</a>
          <a href="#" class="list-group-item">Table</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="images/Salon_Baroque.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/Salon1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/Salon2.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
<?php
session_start();

include "GestionUser.php";
$g=new GestionUser();
$tab= $g->getallproduct();
?>
            <?php
            foreach($tab as $row)
            {


    echo    "  <div class=col-lg-4 col-md-6 mb-4> ";
      echo"      <div class=card h-100>";
                    echo"   <a href=><img class=card-img-top src=".$row['lien']."></a>";
                        echo" <div class=card-body>";
                        echo" <h2 class= card-title>".$row['nom_produit']."</h2>";
                        echo" <h5>".$row['prix']." DT</h5>";
                        echo"   <p class=card-text>".$row['description']."</p>";
                        echo"  </div>";
                    echo" <div class=card-footer>";
                    $idp=$row['id'];
                    echo "<center><a href='ajouter_commande.php?id=$id&idp=$idp'><button class='btn btn-success btn-xs' title='Commande'>Ajoter au panier <span class='glyphicon glyphicon-shopping-cart'></span></button></a></center></td>";
                        echo"   </div>";
                    echo"   </div>";
                echo" </div>";
          } ?>



        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <br><br>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Bois de Violette 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
