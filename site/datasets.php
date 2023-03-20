<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Datasets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link rel="stylesheet" type="text/css" href="site.css" />
</head>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><h2>SantÉconomie</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="testmap.php">Carte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="comparaison2.php">Comparer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="nos-article.php">Nos Articles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="datasets.php">Datasets</a>
              </li>
              <?php 
              session_start();

              if (!isset($_SESSION['client'])){
              }
              else{
              echo '<li class="nav-item">
                <a class="nav-link active" href="create.php">Créer</a>
              </li>';
            }?>
            </ul>
            <ul class="navbar-nav ms-auto"></ul>
             <form class="d-flex" method="GET" action="recherche.php">
                <input class="form-control me-2" name="s"  type="search" placeholder="Search">
                <button class="btn btn-secondary"  type="submit">Search</button>
              </form>
              <?php

              if (!isset($_SESSION['client'])){
              echo '<li class="nav-item">
                <a class="nav-link" href="sign-in.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a>
              </li>';
              }
              else{
                echo '<li class="nav-item">
                <a class="nav-link active" href="profil.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a></li>';
                
                echo '<li class="nav-item"><a href="deconnexion.php" class="btn btn-light">Log out</a></li>';
                
              }
              ?>
              
            </ul> 
            </div>
            </div>
            </nav>

<body>
    
  <h2>Datasets :</h2>

  <p>

    Sur ctte page nous avons mis à votre disposition, les données utilisées pour nos graphiques
    <br/> que nous mettons régulièrement à jour.

  </p>

  <h3>Données :</h3>


  <ul class="list-container">

    <li class = "list">
      Format SQL : <a href="data/data.sql"><img src ="img/sql.png" style="height:60px"></a>
    </li>

    <li class = "list">
      Format CSV : <a href="data/data.csv"><img src ="img/csv.png" style="height:60px"></a>
    </li>

    <li class = "list">
      Format XLSX : <a href="data/data.xlsx"><img src ="img/xlsx.png" style="height:60px"></a>
    </li>

  </ul>
    
</body>
</html>

<section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: black;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3" style = "color:white;">Register for free</span>
          <a href="sign-up.php" class="btn btn-light">Sign up !</a>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: black;">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/" >MDBootstrap.com</a>
      <a href="contact.php" class="btn btn-light" style ="margin-left:20px;">About us</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>