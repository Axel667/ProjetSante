<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Sign up</title>

    <link rel="stylesheet" type="text/css" href="site.css" />
    
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="form">

    <h1>Sign up</h1>
    

    <form action="users.php" method="post">
    <div class="mb-3 mt-3">
        <label for="Nom" class="form-label">Nom : </label>
        <input type="nom" class="form-group" id="nom" name="n">
    </div>
    <div class="mb-3 mt-3">
        <label for="Prenom" class="form-label">Prénom : </label>
        <input type="prenom" class="form-group" id="prenom" name="p">
    </div>
    <div class="mb-3 mt-3">
        <label for="Mail" class="form-label">Adresse e-mail : </label>
        <input type="mail" class="form-group" id="mail" name="mail">
    </div>
    Genre : 
    <div class="form-check form-check-inline">
    <div class="form-check">
    <input type="radio" class="form-check-input" id="radio1" name="genre" value="Mr" checked>Homme
    <label class="form-check-label" for="radio1"></label>
    </div>
    </div>
    <div class="form-check form-check-inline">
    <div class="form-check">
    <input type="radio" class="form-check-input" id="radio2" name="genre" value="Mme">Femme
    <label class="form-check-label" for="radio2"></label>
    </div>
    </div>
    <br/>
    <br/>
    Fonction : <select class="form-group" name="fonction">
    <option value = "Etudiant(e)">Etudiant(e)</option>
    <option value ="Enseignant(e)">Enseignant(e)</option>
    <option value ="Statisticien(e)">Statisticien(e)</option>
    <option value = "Retraité(e)">Retraité(e)</option>
    </select><br/><br/>
    S'abonner à la newsletter :
    <div class="form-check form-check-inline">
    <div class="form-check">
    <input type="radio" class="form-check-input" id="radio1" name="news" value="Oui" checked>Oui
    <label class="form-check-label" for="radio1"></label>
    </div>
    </div>
    <div class="form-check form-check-inline">
    <div class="form-check">
    <input type="radio" class="form-check-input" id="radio2" name="news" value="Non">Non
    <label class="form-check-label" for="radio2"></label>
    </div>
    </div>
    <br/><br/>
    <div class="mb-3">
        <label for="pwd" class="form-label">Mot de passe : </label>
        <input type="password" class="form-group" id="pwd" placeholder="Enter password" name="mdp1">
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">Confirmer votre mot de passe : </label>
        <input type="password" class="form-group" id="pwd" placeholder="Enter password" name="mdp2">
    </div>
    
    <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
</body>

</html>