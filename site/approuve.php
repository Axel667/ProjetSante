<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>approuve</title>
</head>

<body>
   <?php
   include("baseD.php");

   function approuver($ab)
   {

      //$ab = $_GET['id_article'];
   
      $bdd = getBD();

      $upd = $bdd->prepare("UPDATE sourcer SET approuve = 1 WHERE `sourcer`.`id_article` = $ab");

      $update = $upd->execute();

   }

   if (isset($_GET['id_article']) and !empty($_GET['id_article'])) {
      approuver($_GET['id_article']);
      echo '<meta http-equiv="refresh" content="0;url=article.php?id_article=' . $_GET['id_article'] . '">';
   }
   ?>
</body>

</html>