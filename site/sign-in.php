<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign in</title>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <link rel="stylesheet" type="text/css" href="site.css" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
   <div class="border absolute inset-0 -top-100 -z-10 transform-gpu overflow-hidden blur-3xl opacity-75">
      <img src="./img/world-map.png" alt="Your image description" class="h-full w-full">
   </div>
   <div class="flex min-h-full items-center justify-center py-12 mt-20 sm:px-6 lg:px-8">
      <div class="w-full max-w-md space-y-8">
         <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Connectez-vous sur
               SantEconomie 🧑‍💻
            </h2>
         </div>
         <form class="mt-8 space-y-6" action="connecter.php" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm">
               <div>
                  <label for="email" class="sr-only">Email address</label>
                  <input id="email" name="mail" type="email" autocomplete="email" required
                     class="pl-2 relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Email address">
               </div>
               <div>
                  <label for="password" class="sr-only">Password</label>
                  <input id="pwd" type="password" autocomplete="current-password" required
                     class="pl-2 relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     placeholder="Password" name="mdp">
               </div>
            </div>

            <div class="flex items-center justify-between">
               <div class="flex items-center">
                  <input id="remember-me" name="remember" type="checkbox"
                     class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
               </div>
            </div>

            <div>
               <button type="submit"
                  class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                     <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                           d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                           clip-rule="evenodd" />
                     </svg>
                  </span>
                  Sign in
               </button>
            </div>
         </form>
         <p>Première visite sur <strong>SantEconomie</strong> ?<a href="sign-up.php"> Inscrivez-vous</a></p>
      </div>
   </div>
</body>

</html>