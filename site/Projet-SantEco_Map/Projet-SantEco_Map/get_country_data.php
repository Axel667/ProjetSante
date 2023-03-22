<?php
include("../baseD.php");
// Connexion à la base de données
$bdd = getBD();

// Récupération du nom du pays envoyé en POST
$pays = $_POST['name'];

// Requête SQL pour récupérer les données du pays correspondant
$req = $bdd->prepare('SELECT * FROM `data` WHERE `Pays` = :pays');
$req->execute(array('name' => $pays));

// Récupération des données sous forme de tableau associatif
$data = $req->fetch(PDO::FETCH_ASSOC);

// Envoi des données au format JSON
echo json_encode($data);
?>
