<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="widdiv=device-widdiv, initial-scale=1.0">
   <title>Recherche</title>
   <link rel="stylesheet" type="text/css" href="site.css" />
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<nav class="bg-stone-800 text-white px-6 rounded-lg mt-4 mx-4">
   <div class="flex items-center justify-between">
      <div class="flex space-x-4">
         <!-- logo -->
         <div class="mx-8">
            <a href=" index.php" class="flex items-center py-5 px-2  hover:text-stone-400">
               <svg class="h-6 w-6 mr-1 text-purple-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
               </svg>
               <span class="text-2xl font-bold">SantÉconomie</span>
            </a>
         </div>

         <!-- primary nav -->
         <div class="hidden md:flex items-center space-x-1">
            <a href="testmap.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Carte</a>
            <a href="comparaison2.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Comparer</a>
            <a href="evolutiontest.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Evolution</a>
            <a href="nos-article.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Nos
               Articles</a>
            <a href="datasets.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Datasets</a>
            <?php
            session_start();
            if (!isset($_SESSION['client'])) {
            } else {
               echo '<a href="create.php" class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Créer</a>';
            } ?>
         </div>
      </div>

      <!-- secondary nav -->
      <div class="hidden md:flex items-center space-x-1">

         <form method="GET" action="recherche.php">
            <div class="relative text-stone-600 focus-within:text-stone-400">
               <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                  <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                     <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                     </svg>
                  </button>
               </span>
               <input type="search" name="q"
                  class="py-2 text-sm text-white bg-stone-900 rounded-md pl-10 focus:outline-none focus:bg-stone-700 focus:text-white"
                  placeholder="Search..." autocomplete="off">
            </div>
         </form>

         <?php
         if (!isset($_SESSION['client'])) {
            echo '            
               <a href="sign-in.php" class="flex items-center py-5 px-4">Sign-in
               <svg class="h-6 w-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                     d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
               </svg>
               </a>
               <a href="sign-up.php"
               class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
               <span
                  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Sign-up
               </span>
            </a>';
         } else {
            echo '<a href="profil.php" class="mx-4"><svg class="h-8 w-8 mx-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                     d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
               </svg></a>';
            echo '<a href="deconnexion.php" class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
               <span
                  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Log-out
               </span></a>';
         }
         ?>

      </div>
   </div>
</nav>

<body>
   <div class="m-4 p-4">
      <?php
      echo "<div class='bg-gradient-to-r from-indigo-950 to-purple-500 text-white px-6 py-4 rounded-xl shadow-md mb-6'>";
      echo "<p class='text-lg font-semibold'>Voici les résultats des données pour la recherche : <strong>'" . $_GET['q'] . "'</strong></p>";
      echo "</div>";
      include("baseD.php");
      $bdd = getBD();
      if (isset($_GET['q']) and !empty($_GET['q'])) {
         $rech = htmlspecialchars($_GET['q']);
         $data = $bdd->query('select * from data where Pays LIKE "%' . $rech . '%" ORDER by Annee');
         if ($data->rowCount() > 0 and (!empty($data))) {
            echo "<div class='grid grid-cols-7 gap-4 text-center bg-stone-800 rounded-md text-white p-4 mb-4'>";
            echo '
                <div>Pays</div>
                <div>Code Pays</div>
                <div>Année</div>
                <div>PIB par habitant</div>
                <div>Espérance de vie</div>
                <div>Taux d\'obésité(%)</div>
                <div>Dépenses en santé($)</div>';
            echo "</div>";

            while ($d = $data->fetch()) {
               echo "<div class='grid grid-cols-7 gap-4 text-center bg-gray-100 rounded-md text-gray-900 p-4 mb-2'>";
               echo "<div>" . $d['Pays'] . "</div>";
               echo "<div>" . $d['Code'] . "</div>";
               echo "<div>" . $d['Annee'] . "</div>";
               echo "<div>" . $d['PIB par habitant'] . "</div>";
               echo "<div>" . $d['espe_vie'] . "</div>";
               echo "<div>" . $d['tx_obesite(%)'] . "</div>";
               echo "<div>" . $d['depenses_sante($)'] . "</div>";
               echo "</div>";
            }
            $data->closeCursor();
         } else {
            echo "<p>Aucune correspondance pour votre recherche</p>";
         }
      } else {
         echo "<p>Veuillez saisir une champ dans la barre de recherche</p>";
      }
      ?>
   </div>
</body>

</html>