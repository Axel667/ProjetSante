<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Graphe FRANCE</title>

    <?php include("baseD.php") ?>

</head>

<body>

  <h1> Test de graphe</h1>

  <p>Réussite d'un premier graphe avec Charts Js en liaison avec une requête de la base de données</p>

<?php 
        $bdd = getBD();

        $gra = $bdd ->query("SELECT * FROM `data` WHERE Pays ='France'" );
        
        
        foreach ($gra as $data){

            $année[] = $data['Annee'];
            $PIB[]= $data['PIB par habitant'];
            $espe[] = $data['espe_vie'];
            $tx[]= $data['tx_obesite(%)'];
            $dep[]= $data['depenses_sante($)'];
        }

        $json = json_encode($année);
        $json2 = json_encode($PIB);
        $json3 = json_encode($espe);
        $json4 = json_encode($tx);
        $json5 = json_encode($dep);

        $data = array(
          array('code' => 'ABW', 'data' => 0.811),
          array('code' => 'AFG', 'data' => 0.816)
      );
      print_r($data);
      // afficher le tableau
      echo json_encode($data);

    ?>



</body>
</html>

