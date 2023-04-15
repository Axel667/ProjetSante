<!DOCTYPE html>
<html lang="fr">

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Document</title>

</head>

<body>

   <?php

include("baseD.php");

$bdd = getBD();

$client = $_POST['mail'];
$mdp = md5($_POST['mdp']);

// Check if the email and password are provided
if (!isset($client) || empty($client) || !isset($mdp) || empty($mdp)) {
    echo '<meta http-equiv="refresh" content="0;url=sign-in.php">';
    exit();
}

// Check if the email and password are correct
$requete = $bdd->prepare("SELECT * FROM `users` WHERE `mail` = :mail AND `mdp` = :mdp");
$requete->execute(array('mail' => $client, 'mdp' => $mdp));
$ligne = $requete->fetch();

if (!$ligne) {
    echo '<meta http-equiv="refresh" content="0;url=sign-in.php">';
    exit();
}

// Start the session and store the user's information
session_start();
$_SESSION['client'] = $ligne;

// Redirect to the main page
echo '<meta http-equiv="refresh" content="0;url=index.php">';
exit();

?>

</body>

</html>