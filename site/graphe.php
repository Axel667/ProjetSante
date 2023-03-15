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

            $année[] = $data['espe_vie'];
            $PIB[]= $data['Code'];
        }

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
    labels : ['label 1','label 2','label 3','label 4','label 5'],
    datasets : [{
      label: "data test1",
      //backgroundColor : 'blue',
      borderColor : 'blue',
      data : [50,30,40,70,60],
      tension : 0.4,
      fill : true
    },
    {
      label : "data test2",
      //backgroundColor : 'red',
      borderColor : 'red',
      data :[10,60,30,40,50],
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