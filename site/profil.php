<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <link rel="stylesheet" type="text/css" href="site.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <?php include("baseD.php")?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h2>SantÉconomie</h2></a>
    <ul class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link active" href="carte.html">Carte</a>
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
    <?php session_start();

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
                <input class="form-control me-2" name="s" id = "search" type="search" placeholder="Search">
                <input type="submit" name="search" id = "envoyer" value= "search">
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
                
                echo '<li class="nav-item"><a class="nav-link active" href="deconnexion.php">Log out</a></li>';
                
              }
              ?>
    </li>
    </ul>
    </div>
    </nav>

    
        <h3>Votre profil :</h3>

        <?php
        if (!isset($_SESSION['client'])) {
            echo "<p>Veuillez vous connecter</p>";
        }
        else{
            echo "<p>Civilité : ".$_SESSION['client']['genre']."</p>";
            echo "<p>Nom : ".$_SESSION['client']['Nom']."</p>";
            echo "<p>Prénom : ".$_SESSION['client']['Prenom']."</p>";
            echo "<p>Adresse e-mail : ".$_SESSION['client']['mail']."</p>";
            echo "<p> Fonction : ".$_SESSION['client']['fonction']."</p>";
        }
        ?>
    
    <a href="index.php" class="btn btn-secondary">Back Home</a>



    
</body>
</html>