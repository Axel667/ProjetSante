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

    ?>

<div>
  <canvas id="graph1"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>

<script>
  var ctx = document.getElementById('graph1').getContext('2d')

  var data = {
    labels : <?php echo $json;?>,
    datasets : [{
      label: "PIB par habitant pour la France",
      //backgroundColor : 'blue',
      borderColor : 'blue',
      data : <?php echo $json2; ?>,
      tension : 0.4,
      fill : true
    },
    {
      label : "Esperance de vie",
      borderColor : 'red',
      data : <?php echo $json3; ?>,
      tension : 0.4,
      fill : true
    },
    {
      label : "Taux d'obésité",
      borderColor : 'green',
      data : <?php echo $json4; ?>,
      tension : 0.4,
      fill : true
    },
    {
      label : "Dépenses santé",
      borderColor : 'purple',
      data : <?php echo $json5; ?>,
      tension : 0.4,
      fill : true
    }]
  }
  var options = {
    responsive: true
  }

  var config = {
    type: 'line',
    data: data,
    options : options
      
    }
  var graph1 = new Chart(ctx, config)
</script>