<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enregistrement</title>

</head>

<body>

    <?php 

    include("baseD.php");

    function enregistrer($nom, $prenom, $mail, $genre,$fonction, $mdp) {

        // Connexion à la base de données
        $bdd =  getBD();
        
        // Préparation de la requête d'insertion
        $requete = $bdd->prepare("INSERT INTO `users` ( `nom`, `prenom`, `mail`,`genre`,`fonction`, `mdp`) VALUES ( '$nom', '$prenom', '$mail','$genre','$fonction', '$mdp')");
        
        // Exécution de la requête avec les paramètres donnés
        $requete->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'mail'=>$mail,'genre'=> $genre,'fonction' => $fonction, 'mdp'=> $mdp));
    }

    if ((isset($_POST['n']) and empty($_POST['n']))
    or (isset($_POST['p']) and empty($_POST['p']))
    or (isset($_POST['mail']) and empty($_POST['mail']))
    or (isset($_POST['genre']) and empty($_POST['genre']))
    or (isset($_POST['fonction']) and empty($_POST['fonction']))
    or (isset($_POST['mdp1']) and empty($_POST['mdp1']))
    or (isset($_POST['mdp2']) and empty($_POST['mdp2']))
    or($_POST['mdp1']!= $_POST['mdp2'])){
        echo '<meta http-equiv="refresh" content="0;url=sign-up.php?var1='.$_POST['n'].'&var2='.$_POST['p'].'&var3='.$_POST['mail'].'&var4='.$_POST['genre'].'&var5='.$_POST['fonction'].'">';
        }
    else{
        enregistrer($_POST['n'], $_POST['p'], $_POST['mail'], $_POST['genre'],$_POST['fonction'], md5($_POST['mdp2']));
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }

    ?>
    
</body>

</html>