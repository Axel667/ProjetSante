<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>diagramme en barre</title>

    <?php include("baseD.php"); ?>

</head>

<h1>Comapraison des PIB entre la Russie et la France</h1>

<?php 
        $bdd = getBD();

        $FR = $bdd ->query("SELECT * FROM `data` WHERE Pays ='France'" );
        
        
        foreach ($FR as $data){

            $année[] = $data['Annee'];
            $F[]= $data['depenses_sante($)'];
        }

        $year = json_encode($année);
        $Fr = json_encode($F);

        $russia = $bdd ->query("SELECT * FROM `data` WHERE pays ='Russia'" );

        foreach ($russia as $data2){

            $Russia[]= $data2['depenses_sante($)'];
        }
        $RU = json_encode($Russia);

    ?>

<div>
  <canvas id="comparaison2"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>


<script>
  
  var ctx = document.getElementById('comparaison2').getContext('2d')

  var data = {
    labels : <?php echo $year;?>,
    datasets : [{
      label: "PIB par habitant pour la France",
      backgroundColor : 'blue',
      borderColor : 'blue',
      data : <?php echo $Fr; ?>,
      tension : 0.4,
      fill : true
    },
    {
      label : "PIB par habitant pour la Russie",
      borderColor : 'pink',
      backgroundColor: "cyan",
      data : <?php echo $RU; ?>,
      tension : 0.4,
      fill : true
    }
    ]
  }

  var options = {
    responsive: true
  }

  var config = {
    type: 'bar',
    data: data,
    options : options
  }

  var comparaison2 = new Chart(ctx, config)
</script>