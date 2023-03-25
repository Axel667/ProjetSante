<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nos Articles</title>

    <?php include("baseD.php"); ?>

    <link rel="stylesheet" type="text/css" href="site.css" />

    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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

    <a href="index.php" class="btn btn-secondary">Back Home</a>

    <br/>

    <h2>Nos Articles : </h2>
    
    <br/>
    <form class="d-flex" method="GET" action="nos-article.php">
      <input class="form-group me-2" name="rech"  type="search" placeholder="Rechercher un article">
      <button class="btn btn-secondary"  type="submit">Search</button>
    </form>

    <br/>
    <?php

    $bdd =  getBD();

    if (isset($_GET['rech']) and !empty($_GET['rech'])){

      $rech = htmlspecialchars($_GET['rech']);
        
      $Rart = $bdd->query('SELECT * FROM sourcer where Pays LIKE "%'.$rech.'%" ');            

      if ($Rart->rowCount() > 0 and (!empty($Rart))){

        while($affart = $Rart->fetch()){

          echo "<ul><li><a href ='article.php?id_article=".$affart['id_article']."'><em><strong>" .$affart['Titre']. "</em></strong></a></li></ul>";

        }
        $Rart ->closeCursor();
      }
      else{
        echo "<p>Aucun article ne correspond à votre recherche</p>";
      }
    }
    else{
  
      //requête sur la bd
      $rep = $bdd->query('select id_article,titre from sourcer');

      while ($ligne = $rep ->fetch()) {

        //création d'un lien contenant le paramètre de l'article en question sur le nom de l'article
        echo "<ul><li><a href ='article.php?id_article=".$ligne['id_article']."'><em><strong>" .$ligne['titre']. "</em></strong></a></li></ul>";
      }
      $rep ->closeCursor(); 
    }

      
    ?>
				
    
</body>
</html>