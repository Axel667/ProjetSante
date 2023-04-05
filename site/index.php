<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SantEconomie</title>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <script src="https://cdn.tailwindcss.com"></script>
   <?php include("baseD.php") ?>
</head>

<body class="bg-white flex flex-col min-h-screen">
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

   <!--
   <div class="absolute inset-x-0 -top-100 -z-10 transform-gpu overflow-hidden blur-2xl">
      <svg class="relative -z-10 h-[32rem] max-w-none rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
         viewBox="0 0 1155 678">
         <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
         <defs>
            <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645"
               gradientUnits="userSpaceOnUse">
               <stop stop-color="#9089FC" />
               <stop offset="1" stop-color="#FF80B5" />
            </linearGradient>
         </defs>
      </svg>
   </div>
-->

   <div class="border absolute inset-0 -top-100 -z-10 transform-gpu overflow-hidden blur-lg opacity-25">
      <img src="./img/world-map.png" alt="Your image description" class="h-full w-full">
   </div>

   <div class="place-content-evenly flex flex-col lg:flex-row md:m-28 m-10">
      <div class="m-8">
         <div class="backdrop-blur-md bg-white/50 relative isolate overflow-hidden px-6 shadow-2xl sm:rounded-3xl">
            <!--
            <svg viewBox="0 0 1024 1024"
               class="absolute top-1 left-1 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-0 lg:ml-0 lg:translate-y-0 lg:-translate-x-1/2"
               aria-hidden="true">
               <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
               <defs>
                  <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                     <stop stop-color="#7775D6" />
                     <stop offset="1" stop-color="#E935C1" />
                  </radialGradient>
               </defs>
            </svg>
            -->
            <div class="max-w-sm m-20">
               <h2 class="my-10 text-3xl font-bold tracking-tight text-black sm:text-5xl">SantÉconomie</h2>
               <p class="my-6 text-lg leading-8 text-gray-900">Ce site présente les données entre le développement
                  économique et le niveau de santé de sa population. Manipulez les facilement pour faire votre propres
                  déductions grâce à nos visualisations.</p>
            </div>
         </div>
      </div>
      <div class="flex flex-col my-8 lg:pt-6">
         <div class="border bg-white p-6 rounded-lg mb-6">
            <a href="testmap.php" class="flex items-center text-gray-900">
               Découvrez notre carte
            </a>
         </div>
         <div class="border bg-white p-6 rounded-lg mb-6">
            <a href="comparaison2.php" class="flex items-center text-gray-900">
               Comparez les pays
            </a>
         </div>
         <div class="border bg-white p-6 rounded-lg">
            <a href="create.php" class="flex items-center text-gray-900">
               Publiez votre article
            </a>
         </div>
      </div>
   </div>
   <?php
   if (!isset($_SESSION['client'])) {
   } else {
      echo "<p class='p-6'>Bonjour " . $_SESSION['client']['genre'] . " " . $_SESSION['client']['Nom'] . " " . $_SESSION['client']['Prenom'] . "</p>";
   }
   ?>
   <section class="mt-auto">
      <!-- Footer -->
      <footer class="bg-black text-white text-center py-6">
         <!-- Grid container -->
         <div class="container px-4">
            <!-- Section: CTA -->
            <section>
            </section>
            <!-- Section: CTA -->
         </div>
         <!-- Grid container -->
         <div class="text-center pt-3 pb-6" style="background-color: black;">
            <a href="contact.php" class="text-white mr-4">À propos</a>
            <a href="#" class="text-white mr-4">Conditions d'utilisation</a>
            <a href="#" class="text-white">Politique de confidentialité</a>
         </div>
      </footer>
      <!-- Footer -->
   </section>

</body>

</html>