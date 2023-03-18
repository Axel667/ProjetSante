<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <?php include("baseD.php");?>
    
</head>

<body>
    
    <?php 

    $bdd=getBD();

    $client = $_POST['mail'];

    $mdp = md5($_POST['mdp']);

    $qu = $bdd->query("select * from users where users.mail= '".$client."' and users.mdp = '".$mdp."'");

    session_start();

    if ($qu->rowCount()==1){

        $ligne = $qu->fetch();

        if ((isset($_POST['mail'])) and empty($_POST['mail']) or (isset($_POST['mdp']) and empty($_POST['mdp']))){
            echo '<meta http-equiv="refresh" content="0;url=sign-in.php">';
        }
        else{

            $_SESSION['client']=$ligne;

        echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }
    }
    else{
        
        echo '<meta http-equiv="refresh" content="0;url=sign-in.php">';
    }

    ?>

</body>

</html>