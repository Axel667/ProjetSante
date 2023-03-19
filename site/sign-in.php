<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign in</title>


    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link rel="stylesheet" type="text/css" href="site.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    
<div class= "form">

    <h1>Bienvenue sur SantEconomie</h1>

    <div class="container mt-3">
    <form action="connecter.php" method="post">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Adresse e-mail : </label>
    <input type="email" class="form-group" id="email" placeholder="Enter email" name="mail">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mot de passe : </label>
    <input type="password" class="form-group" id="pwd" placeholder="Enter password" name="mdp">
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</div>


    <footer>
        <p>Première visite sur <strong>SantEconomie</strong> ?<a href ="sign-up.php">Inscrivez-vous</a></p>
    </footer>
</div>
</body>

</html>