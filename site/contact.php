<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact</title>

    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link rel="stylesheet" type="text/css" href="site.css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
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
                <a class="nav-link active" href="evolutiontest.php">Evolution</a>
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
                
                echo '<li class="nav-item"><a class="nav-link active" id = "logout" href="deconnexion.php">Log out</a></li>';
                
              }
              ?>
              
            </ul> 
            </div>
            </div>
            </nav>

            <a href="index.php" class="btn btn-secondary">Back Home</a>
    
    <h2>Contact : </h2>

    <p>
        Bonjour, nous sommes le groupe SantEconomie actuellement en dernière année de licence MIASHS <br/>
        à l'université Paul-Valéry 3 de Montpellier. En effet ce site a été créé par 6 jeunes étudiants en plein <br/>
        apprentissage des mathématiques et de l'informatiques appliquées aux sciences humaines et sociales. <br/>
        Ce site a pour but de renseigner quiconque le souhaite, sur les données reliant la santé et l'économie <br/>de chaque 
        pays à travers des graphiques permettant la comparaison du PIB par habitant, l'espérance  de vie,<br/> le taux d'obésité 
        mais aussi les dépenses en santé, entre pays. Mais aussi en explorant par le biais d'un globe<br/> terrestre, il permet 
        aussi aux utilisateurs de créer des articles à partir des données mises à disposition de plus les articles créés et approuvés seront consultables.
    </p>

    <h4>Fondateurs : </h4>

    <ul>
        <li>Girondin Audric</li>
        <li>Can Arisoy Ivan</li>
        <li>Carot Axel</li>
        <li>Duckes Jonathan</li>
        <li>Ravalisaona Malala</li>
        <li>Abdallah Rachydah</li>
    </ul>

    <p>Vous pouvez nous joindre en laissant un message dans le formulaire ci-dessous : </p>

    <form method ="post" action="#">
    <div class="mb-3 mt-3">
      <label for="comment">Comments:</label>
      <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary">Envoyer</button>
  </form>

</body>
</html>