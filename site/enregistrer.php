<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    include("baseD.php"); 

    session_start();

    $id_users=$_SESSION['client']['id_users'];

    function creer($id_users, $auteur, $pays, $titre, $article) {

        // Connexion à la base de données
        $bdd = getBD();

        // Préparation de la requête d'insertion
        $requete = $bdd->prepare("INSERT INTO `sourcer` ( `id_users`, `auteur`, `pays`, `titre`, `article`,`approuve`) VALUES ( '$id_users', '$auteur', '$pays', '$titre', '$article','0')");
        
        // Exécution de la requête avec les paramètres donnés
        $requete->execute(array('id_users'=>$id_users, 'auteur'=>$auteur, 'pays'=>$pays, 'titre'=>$titre,'article'=> $article,'approuve'=>0));
    }

      if ((isset($_POST['titre']) and empty($_POST['titre']))
      or (isset($_POST['auteur']) and empty($_POST['auteur']))
      or (isset($_POST['pays']) and empty($_POST['pays']))
      or (isset($_POST['art']) and empty($_POST['art']))){

        echo '<meta http-equiv="refresh" content="0;url=create.php?var1='.$_POST['titre'].'&var2='.$_POST['auteur'].'&var3='.$_POST['pays'].'&var4='.$_POST['art'].'">';
      }
    else{
        creer($id_users,$_POST['auteur'], $_POST['pays'], $_POST['titre'], $_POST['art']);
        echo'<p>Votre article a bien été enregistréé, il est en cours de vérification</p>';
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
      }
    ?>
</body>
</html>