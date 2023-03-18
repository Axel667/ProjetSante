<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" type="text/css" href="site.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <h4><a href = "index.php">Back home</a></h4>


    <?php

        include("baseD.php");

        session_start();

        $bdd = getBD();
        
        if (isset($_GET['s']) and !empty($_GET['s'])){

            $rech = htmlspecialchars($_GET['s']);
            $data = $bdd->query('select * from Data where Pays LIKE "%'.$rech.'%" ORDER by Pays DESC');

            if ($data->rowCount() > 0 and (!empty($data))){

                echo'<table style="border: 3px solid black;">';
                echo '<tr>
                <th style="border: 3px solid black;">Pays</th>
                <th style="border: 3px solid black;">Code Pays</th>
                <th style="border: 3px solid black;">Année</th>
                <th style="border: 3px solid black;">PIB par habitant</th>
                <th style="border: 3px solid black;">Espérance de vie</th>
                <th style="border: 3px solid black;">Taux d\'obésité(%)</th>
                <th style="border: 3px solid black;">Dépenses en santé($)</th>
                </tr>';

                while($d = $data->fetch()){

                    echo "<tr>";
                    echo "<td style='border: 3px solid black;'>" .$d['Pays']. "</td>";
                    echo "<td style='border: 3px solid black;'>" .$d['Code'] . "</td>";
                    echo "<td style='border: 3px solid black;'>" .$d['Annee'] . "</td>";
                    echo "<td style='border: 3px solid black;'>".$d['PIB par habitant']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['espe_vie']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['tx_obesite(%)']."</td>";
                    echo "<td style='border: 3px solid black;'>".$d['depenses_sante($)']."</td>";
                    echo "</tr>";
                    
                }

                echo '</table>';
                $data ->closeCursor(); 

            }
            else{
                echo "<p>Aucune correspondance pour votre recherchre</p>";
            }
        }
        else{
            echo "<p>Veuillez saisir une champ dans la barre de recherche</p>";
        }
    ?>
    </>
</body>
</html>