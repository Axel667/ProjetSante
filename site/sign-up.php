<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=  , initial-scale=1.0">
   <title>Sign up</title>
   <link rel="stylesheet" type="text/css" href="site.css" />
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
   <div class="border absolute inset-0 -top-100 -z-10 transform-gpu overflow-hidden blur-3xl opacity-75">
      <img src="./img/world-map.png" alt="Your image description" class="h-full w-full">
   </div>
   <div class="flex min-h-screen items-center justify-center py-12 mt-10 sm:px-6 lg:px-8">
      <div class="w-full max-w-md space-y-8">
         <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Bienvenue sur SantEconomie 👋
            </h2>
            <h3 class="mt-2 text-center text-xl tracking-tight text-gray-900">créez votre compte</h3>
         </div>
         <form class="mt-8 space-y-6" action="users.php" method="post">
            <input type="hidden" name="remember" value="true">
            <div class="space-y-4">
               <div class="m-4">
                  <label for="nom" class="block text-sm text-gray-900">Nom :</label>
                  <input id="nom" name="n" type="text" required
                     class="pl-2 relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Nom">
               </div>
               <div class="m-4">
                  <label for="prenom" class="block text-sm text-gray-900">Prénom :</label>
                  <input id="prenom" name="p" type="text" required
                     class="pl-2 relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Prénom">
               </div>
               <div class="m-4">
                  <label for="mail" class="block text-sm text-gray-900">Adresse e-mail :</label>
                  <input id="mail" name="mail" type="email" required
                     class="pl-2 relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Adresse e-mail">
               </div>
               <div class="m-4">
                  <span class="block text-sm text-gray-900">Genre :</span>
                  <div class="flex items-center space-x4">
                     <input id="radio1" name="genre" type="radio" value="Mr"
                        class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-600" checked>
                     <label for="radio1" class="text-sm text-gray-900">Homme</label>
                  </div>
                  <div class="flex items-center space-x-4">
                     <input id="radio2" name="genre" type="radio" value="Mme"
                        class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-600">
                     <label for="radio2" class="text-sm text-gray-900">Femme</label>
                  </div>
               </div>
               <div class="m-4">
                  <label for="fonction" class="block text-sm text-gray-900">Fonction :</label>
                  <select id="fonction" name="fonction"
                     class="w-full mt-1 pl-2 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     <option value="Etudiant(e)">Etudiant(e)</option>
                     <option value="Enseignant(e)">Enseignant(e)</option>
                     <option value="Statisticien(e)">Statisticien(e)</option>
                     <option value="Retraité(e)">Retraité(e)</option>
                  </select>
               </div>
               <div class="m-4">
                  <span class="block text-sm text-gray-900">S'abonner à la newsletter :</span>
                  <div class="flex items-center space-x-4">
                     <input id="news1" name="news" type="radio" value="Oui"
                        class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-600" checked>
                     <label for="news1" class="text-sm text-gray-900">Oui</label>
                  </div>
                  <div class="flex items-center space-x-4">
                     <input id="news2" name="news" type="radio" value="Non"
                        class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-600">
                     <label for="news2" class="text-sm text-gray-900">Non</label>
                  </div>
               </div>
               <div class="m-4">
                  <label for="pwd" class="block text-sm text-gray-900">Mot de passe :</label>
                  <input id="pwd" name="mdp1" type="password" required
                     class="pl-2 relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Enter password">
               </div>
            </div>
            <div class="m-4">
               <label for="confirmPwd" class="block text-sm text-gray-900">Confirmer votre mot de passe :</label>
               <input id="confirmPwd" name="mdp2" type="password" required
                  class="pl-2 relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  placeholder="Enter password">
            </div>
            <div class="m-4">
               <button type="submit"
                  class="w-full flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                  </span>
                  S'inscrire
               </button>
            </div>
         </form>
      </div>
   </div>
</body>

</html>