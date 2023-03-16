<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comparaison</title>

    <?php include("baseD.php") ?>

</head>

<body>

<h1>Comapraison des PIB entre les USA et la France</h1>

<?php 
        $bdd = getBD();

        $FR = $bdd ->query("SELECT * FROM `data` WHERE Pays ='France'" );
        
        
        foreach ($FR as $data){

            $année[] = $data['Annee'];
            $PIBF[]= $data['PIB par habitant'];
        }

        $year = json_encode($année);
        $pibF = json_encode($PIBF);

        $USA = $bdd ->query("SELECT * FROM `data` WHERE code ='USA'" );

        foreach ($USA as $data2){

            $PIBUSA[]= $data2['PIB par habitant'];
        }
        $pibU = json_encode($PIBUSA);

    ?>

<div>
  <canvas id="comparaison"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>


<script>
  
  var ctx = document.getElementById('comparaison').getContext('2d')

  var data = {
    labels : <?php echo $year;?>,
    datasets : [{
      label: "PIB par habitant pour la France",
      //backgroundColor : 'blue',
      borderColor : 'purple',
      data : <?php echo $pibF; ?>,
      tension : 0.4,
      fill : true
    },
    {
      label : "PIB par habitant pour USA",
      borderColor : 'green',
      data : <?php echo $pibU; ?>,
      tension : 0.4,
      fill : true
    }
    ]
  }

  var options = {
    responsive: true
  }

  var config = {
    type: 'line',
    data: data,
    options : options
  }

  var comparaison = new Chart(ctx, config)
</script>