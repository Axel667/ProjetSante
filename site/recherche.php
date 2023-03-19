<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recherche</title>

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
                <a class="nav-link active" aria-current="page" href="carte.html">Carte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="comparaison2.php">Comparer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="nos-article.php">Nos Articles</a>
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

<body>

    <a href="index.php" class="btn btn-secondary">Back Home</a>

    <br/>
    <br/>
    
    <?php

        echo "<p>Voici les résultats des données pour la recherche : <strong>'".$_GET['s']."'</strong></p>";

        include("baseD.php");

        $bdd = getBD();
        
        if (isset($_GET['s']) and !empty($_GET['s'])){

            $rech = htmlspecialchars($_GET['s']);
            $data = $bdd->query('select * from Data where Pays LIKE "%'.$rech.'%" ORDER by Pays DESC');

            if ($data->rowCount() > 0 and (!empty($data))){

                echo'<table style="border: 3px solid black;">';
                echo '<tr>
                <th style="border: 3px solid black;">Pays</th>
                <th style="border: 3px solid black;">Code Pays</th>
                <th style="border: 3px solid black;">Année</th>
                <th style="border: 3px solid black;">PIB par habitant</th>
                <th style="border: 3px solid black;">Espérance de vie</th>
                <th style="border: 3px solid black;">Taux d\'obésité(%)</th>
                <th style="border: 3px solid black;">Dépenses en santé($)</th>
                </tr>';

                while($d = $data->fetch()){

                    echo "<tr>";
                    echo "<td style='border: 3px solid black;'>" .$d['Pays']. "</td>";
                    echo "<td style='border: 3px solid black;'>" .$d['Code'] . "</td>";
                    echo "<td style='border: 3px solid black;'>" .$d['Annee'] . "</td>";
                    echo "<td style='border: 3px solid black;'>".$d['PIB par habitant']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['espe_vie']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['tx_obesite(%)']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['depenses_sante($)']."</td>";
                    echo "</tr>";
                    
                }

                echo '</table>';
                $data ->closeCursor(); 

            }
            else{
                echo "<p>Aucune correspondance pour votre recherchre</p>";
            }
        }
        else{
            echo "<p>Veuillez saisir une champ dans la barre de recherche</p>";
        }
    ?>
    </>
</body>
</html>