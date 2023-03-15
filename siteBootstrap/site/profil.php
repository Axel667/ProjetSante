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
    <a class="nav-link active" href="compare.html">Comparer</a>
    </li>
    </ul>
    <ul class="navbar-nav ms-auto">
    <li class="nav-item">
    <a class="nav-link active" href="#">Page 3</a>
    </li>
    </ul>
</ul>
    </div>
    </nav>

    
        <h3>Votre profil :</h3>
        <?php
        session_start();
        if (!isset($_SESSION['client'])) {
            echo "<p>Veuillez vous connecter</p>";
        }
        else{
            echo "<p>".$_SESSION['client']['genre']."</p>";
            echo "<p>".$_SESSION['client']['Nom']."</p>";
            echo "<p>".$_SESSION['client']['Prenom']."</p>";
            echo "<p>".$_SESSION['client']['mail']."</p>";
            echo "<p>".$_SESSION['client']['fonction']."</p>";
        }
        ?>
    
    <a class="btn btn-primary" href="index.php" role="button">Retour à la page d'acceuil</a>


    
</body>
</html>