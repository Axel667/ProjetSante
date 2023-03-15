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
    
        <form action="users.php" method="post" autocomplete="off">
            <?php
            
            echo '<p>Nom : <input type="text" name="n" value=""/></p>';

            echo '<p>Prénom : <input type="text" name="p" value=""/></p>'; 

            echo '<p>Adresse e-mail : <input type="text" name="mail" value=""/></p>';

            echo '<p>Genre : Homme  <input type="radio" name="genre" value="Mr">
                Femme  <input type="radio" name="genre" value="Mme"><p>';

            echo 
            '<p>Fonction : <SELECT name="fonction">
                <OPTION
                VALUE="enseignant">Enseignant(e)</OPTION>
                <OPTION VALUE="etudiant">Etudiant(e)</OPTION>
                <OPTION VALUE="Statisticien">Statisticien(ne)</OPTION>
                <OPTION VALUE="retraite">Retraité(e)</OPTION>
                <OPTION VALUE="autre">Autre</OPTION>
            </SELECT></p>';
            
            echo '<p>Mot de passe : <input type="password" name="mdp1" value="" require></p>';

            echo '<p>Confirmer votre mot de passe : <INPUT type="password" name="mdp2" value="" require></p>';

            echo '<p><input type="submit" value="Envoyer"></p>';

            ?>

        </form>
</div>
</body>

</html>