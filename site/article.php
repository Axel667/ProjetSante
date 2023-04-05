<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Article</title>
   <?php include("baseD.php"); ?>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <link rel="stylesheet" type="text/css" href="site.css" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<nav class="bg-stone-800 text-white px-6 rounded-lg mt-4 mx-4">
   <div class="flex items-center justify-between">
      <div class="flex space-x-4">
         <!-- logo -->
         <div>
            <a href="index.php" class="flex items-center py-5 px-2  hover:text-gray-900">
               <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
               </svg>
               <span class="text-2xl font-bold">SantÉconomie</span>
            </a>
         </div>

         <!-- primary nav -->
         <div class="hidden md:flex items-center space-x-1">
               <a href="testmap.php" class="px-4 py-2">Carte</a>
               <a href="comparaison2.php" class="px-4 py-2">Comparer</a>
               <a href="evolutiontest.php" class="px-4 py-2">Evolution</a>
               <a href="nos-article.php" class="px-4 py-2">Nos Articles</a>
               <a href="datasets.php" class="px-4 py-2">Datasets</a>
            <?php
            session_start();
            if (!isset($_SESSION['client'])) {
            } else {
               echo '<a href="create.php" class="mx-2">Créer</a>';
            } ?>
         </div>
      </div>

      <!-- secondary nav -->
      <div class="hidden md:flex items-center space-x-1">

         <form class="flex ml-6" method="GET" action="recherche.php">
            <input class="rounded-l-md bg-gray-200 px-2 py-1" name="s" type="search" placeholder="Search">
            <button class="rounded-r-md bg-gray-500 px-2 py-1" type="submit">Search</button>

         </form>
         <?php
         if (!isset($_SESSION['client'])) {
            echo '<a href="sign-in.php" class="ml-6"></a>';
         } else {
            echo '<a href="profil.php" class="ml-6"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a>';
            echo '<a href="deconnexion.php" class="ml-6 text-gray-100 bg-gray-500 rounded-md px-4 py-2">Log out</a>';
         }
         ?>
         <a href="" class="flex items-center py-5 px-3">Login
            <svg class="h-6 w-6 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
         </a>
         <a href=""
            class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">Signup</a>
      </div>
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
   
   if (isset($_SESSION['client']) and $_SESSION['client']['admin'] == "oui") {
      echo "<a type='button' class='btn btn-success' href ='approuve.php?id_article=$aa'>Approuver</a>
      <a type='button' class='btn btn-danger' href='desapprouver.php?id_article=$aa'>Désapprouver</a>";
      //requete sur la bd avec le paramètre récupéré
      $rep = $bdd->query("select * from sourcer where id_article= $aa ");
      while ($ligne = $rep->fetch()) {
         if ($ligne['approuve'] == 0) {
            echo "<p> Approuvée : non</p>";
         } elseif ($ligne['approuve'] == 1) {
            echo "<p> Approuvée : oui </p>";
         }
         echo "Titre : <h2>" . $ligne['Titre'] . "</h2>";
         echo "Auteur : <h3>" . $ligne['auteur'] . "</h3>";
         //echo "<br/>"; 
         echo "Article : <p>" . $ligne['article'] . "</p>";
      }
      $rep->closeCursor();
   } else {
      $rep3 = $bdd->query("select * from sourcer where id_article= $aa ");
      while ($ligne = $rep3->fetch()) {
         echo "Titre : <h2>" . $ligne['Titre'] . "</h2>";
         echo "Auteur : <h3>" . $ligne['auteur'] . "</h3>";
         //echo "<br/>" 
         echo "Article : <p>" . $ligne['article'] . "</p>";
      }
      $rep3->closeCursor();
   }
   ?>
</body>

</html>