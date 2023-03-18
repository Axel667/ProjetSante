<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link rel="stylesheet" type="text/css" href="site.css" />
</head>
<body>
    <h1>Créer un article</h1>

    <p>Sur cette page vous pouvez créer un article à partir des des datasets et des graphiques mis à votre disposition sur notre site.<p>
    <?php 
    
    session_start();

    if (isset($_SESSION['client'])){

    
    echo '<form method="get" action="create.php" >

    <p> Titre : <INPUT class = "sign" type="text" name="titre" value=""></p>

    <p> Auteur : <INPUT class = "sign" type="text" name="auteur" value=""></p>

    <p> Article: <br/><TEXTAREA  class ="sign" rows="20" cols="170" name="art">
    Ecrivez votre article ici
    </TEXTAREA></p>

    <p><input type="submit"  class = "sign" value="Enregistrer"></p>


    </form>';
    }
    else{
        echo '<p>Veuillez vous connecter afin créer un article</p>';
    }
    ?>

    <a href="index.php" class="btn btn-secondary">Back Home</a>

</body>
</html>