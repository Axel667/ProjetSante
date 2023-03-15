<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php // content="text/plain; charset=utf-8"

/*include("baseD.php");

$bdd = getBD();

$gra = $bdd ->query("SELECT * FROM `data` WHERE Pays ='France'" );


foreach ($gra as $data){

    $année[] = $data['espe_vie'];
    $PIB[]= $data['Code'];
}*/

 // content="text/plain; charset=utf-8"
require_once ('jpgraph-4.4.1/src/jpgraph.php');
require_once ('jpgraph-4.4.1/src/jpgraph_pie.php');
require_once ('jpgraph-4.4.1/src/jpgraph_pie3d.php');

// Some data
$data = array(40,60,21,33);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class= new VividTheme;


// Set A title for the plot
$graph->title->Set("test");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->SetTheme("water");
$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeAll();
$graph->Stroke();

?>




</body>
</html>