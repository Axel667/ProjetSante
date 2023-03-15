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
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    
  const ctx = document.getElementById('myChart');


  new Chart(ctx, {
    type: 'bar',
    data: {
      labels:<?php echo json_encode($année) ?>,
      datasets: [{
        label: <?php echo json_encode($année) ?>,
        data:<?php echo json_encode($PIB) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</body>
</html>