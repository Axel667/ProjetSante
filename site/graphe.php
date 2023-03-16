<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("baseD.php") ?>
</head>
<body>

<?php 
        $bdd = getBD();

        $gra = $bdd ->query("SELECT * FROM `data` WHERE Pays ='France'" );
        
        
        foreach ($gra as $data){

            $année[] = $data['Annee'];
            $PIB[]= $data['PIB par habitant'];
        }

        $json = json_encode($année);
        $json2 = json_encode($PIB);

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
      label: "data test1",
      //backgroundColor : 'blue',
      borderColor : 'blue',
      data : <?php echo $json2; ?>,
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