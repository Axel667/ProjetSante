<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Sign up</title>

    <link rel="stylesheet" type="text/css" href="site.css" />
</head>
<body>

<div class="form">
    <h1>Sign up</h1>
    
        <form  action="users.php" method="post" autocomplete="off" class="si">
            <?php
            
            echo '<p>Nom : <input class = "sign" type="text" name="n" value=""/></p>';

            echo '<p>Prénom : <input class = "sign" type="text" name="p" value=""/></p>'; 

            echo '<p>Adresse e-mail : <input  class = "sign" type="text" name="mail" value=""/></p>';

            echo '<p>Genre : Homme  <input type="radio" name="genre" value="Mr">
                Femme  <input type="radio" name="genre" value="Mme"><p>';

            echo 
            '<p>Fonction : <SELECT class = "sign" name="fonction">
                <OPTION
                VALUE="enseignant">Enseignant(e)</OPTION>
                <OPTION VALUE="etudiant">Etudiant(e)</OPTION>
                <OPTION VALUE="Statisticien">Statisticien(ne)</OPTION>
                <OPTION VALUE="retraite">Retraité(e)</OPTION>
                <OPTION VALUE="autre">Autre</OPTION>
            </SELECT></p>';

            echo '<p>S\'abonner à la newsletter : Oui  <input type="radio" name="news" value="oui">
                Non  <input type="radio" name="news" value="non"><p>';
            
            echo '<p>Mot de passe : <input class = "sign" type="password" name="mdp1" value="" require></p>';

            echo '<p>Confirmer votre mot de passe : <INPUT class ="sign" type="password" name="mdp2" value="" require></p>';

            echo '<p><input type="submit"  class = "sign" value="S\'inscrire"></p>';

            ?>

        </form>
</div>
</body>

</html>