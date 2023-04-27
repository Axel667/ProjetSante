<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profil</title>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <link rel="stylesheet" type="text/css" href="site.css" />
   <script src="https://cdn.tailwindcss.com"></script>
   <?php include("baseD.php") ?>
</head>

<body>
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


   <div class="m-4 p-4">
      <h3 class="text-xl font-semibold mb-4">Votre profil :</h3>

      <?php
      if (!isset($_SESSION['client'])) {
         echo "<p>Veuillez vous connecter</p>";
      } else {
         echo "<p class='mb-2'>Civilité : " . $_SESSION['client']['genre'] . "</p>";
         echo "<p class='mb-2'>Nom : " . $_SESSION['client']['Nom'] . "</p>";
         echo "<p class='mb-2'>Prénom : " . $_SESSION['client']['Prenom'] . "</p>";
         echo "<p class='mb-2'>Adresse e-mail : " . $_SESSION['client']['mail'] . "</p>";
         echo "<p class='mb-4'> Fonction : " . $_SESSION['client']['fonction'] . "</p>";

         echo "<h3 class='text-xl font-semibold mb-4'>Vos articles :</h3>";

         $bdd = getBD();
         // Récupérer l'ID du client connecté
         $client_id = $_SESSION['client']['id_users'];

         // requête SQL pour récupérer l'historique du client connecté en utilisant une jointure
         $hist = $bdd->query("SELECT  `sourcer`.`id_article`, `sourcer`.`Titre`,`sourcer`.`Pays`,`sourcer`.`approuve` FROM `sourcer` JOIN `users`  on  `sourcer`.`id_users` = `users`.`id_users`WHERE `users`.`id_users`=$client_id");

         if ($hist->rowCount() == 0) {

            echo "<p>Vous n'avez pas encore créer d'article pour le moment.</p>";
         } else {
            // Afficher le tableau répertoriant tout les articles créés du client connecté
            echo '<table class="table-auto w-full text-left border-collapse">
                      <thead>
                      <tr>
                         <th class="px-4 py-2 border border-gray-400">Id de l\'article</th>
                         <th class="px-4 py-2 border border-gray-400">Nom de l\'article</th>
                         <th class="px-4 py-2 border border-gray-400">Pays</th>
                         <th class="px-4 py-2 border border-gray-400">Statut</th>
                      </tr>
                      </thead>
                      <tbody>';

            while ($h = $hist->fetch()) {

               echo '<tr>
                      <td class="px-4 py-2 border border-gray-400">' . $h['id_article'] . '</td>
                      <td class="px-4 py-2 border border-gray-400">' . $h['Titre'] . '</td>
                      <td class="px-4 py-2 border border-gray-400">' . $h['Pays'] . '</td>';
               if ($h['approuve'] == 0) {
                  echo ' <td class="px-4 py-2 border border-gray-400">' . "En cours de vérification" . '</td>';
               } elseif ($h['approuve'] == 1) {
                  echo ' <td class="px-4 py-2 border border-gray-400">' . "Approuvé" . '</td>';
               }

               '</tr>';
            }
            echo '</tbody>
                      </table>';

            $hist->closeCursor();
         }
      }

      ?>
   </div>
</body>

</html>