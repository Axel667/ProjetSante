<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Article</title>
   <?php include("baseD.php");  ?>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <link rel="stylesheet" type="text/css" href="site.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script>
      function desapprouver() {
         var aa = <?php echo $_GET['id_article']; ?>;

         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // Traitement à effectuer lorsque la mise à jour est terminée
            }
         };
         xhttp.open("GET", "article.php?id_article=" + aa + "&action=desapprouver", false);
         xhttp.send();
         }


   </script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
         <h2>SantÉconomie</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
         aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                if (!isset($_SESSION['client'])) {
                } else {
                    echo '<li class="nav-item">
                <a class="nav-link active" href="create.php">Créer</a>
              </li>';
                } ?>
         </ul>
         <ul class="navbar-nav ms-auto"></ul>
         <form class="d-flex" method="GET" action="recherche.php">
            <input class="form-control me-2" name="s" type="search" placeholder="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
         </form>
         <?php

            if (!isset($_SESSION['client'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="sign-in.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a>
              </li>';
            } else {
                echo '<li class="nav-item">
                <a class="nav-link active" href="profil.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a></li>';

                echo '<li class="nav-item"><a href="deconnexion.php" class="btn btn-light">Log out</a></li>';
            }
            ?>
      </ul>
   </div>
</nav>

<body>
   <a href="index.php" class="btn btn-secondary">Back Home</a>
   <br />
   <br />

   <?php
    //récupération du paramètre
    $aa = $_GET['id_article'];
    //connection avec la bdd avec la fonction getBD
    $bdd = getBD();

   
    if (isset($_SESSION['client']) and $_SESSION['client']['admin']== "oui"){
      
      echo "<a type='button' class='btn btn-success' href ='approuve.php?id_article=$aa'>Approuver</a>

      <a type='button' class='btn btn-danger' href='desapprouver.php?id_article=$aa'>Désapprouver</a>";

   
    //requete sur la bd avec le paramètre récupéré
      $rep = $bdd->query("select * from sourcer where id_article= $aa ");

      while ($ligne = $rep->fetch()) {

         if ($ligne['approuve']== 0){
            echo "<p> Approuvée : non</p>";
         }
         elseif ($ligne['approuve']== 1){
            echo "<p> Approuvée : oui </p>";
         }
         
         echo "Titre : <h2>" . $ligne['Titre'] . "</h2>";

         echo "Auteur : <h3>" . $ligne['auteur'] . "</h3>";

         //echo "<br/>";

         echo "Article : <p>" . $ligne['article'] . "</p>";
      }
    $rep->closeCursor();
   }
   else{

      $rep3 = $bdd->query("select * from sourcer where id_article= $aa ");

      while ($ligne = $rep3->fetch()) {
         
         echo "Titre : <h2>" . $ligne['Titre'] . "</h2>";

         echo "Auteur : <h3>" . $ligne['auteur'] . "</h3>";

         //echo "<br/>";

         echo "Article : <p>" . $ligne['article'] . "</p>";
      }

      $rep3->closeCursor();

   }
    ?>
</body>

</html>