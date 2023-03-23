<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carte</title>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>

        <link rel="stylesheet" href="Projet-SantEco_Map/Projet-SantEco_Map/map.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <?php include("baseD.php"); ?>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h2>SantÉconomie</h2></a>
    <ul class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link active" href="testmap.php">Carte</a>
        </li>
    <li class="nav-item">
    <a class="nav-link active" href="comparaison2.php">Comparer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="nos-article.php">Nos Articles</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="datasets.php">Datasets</a>
    </li>
    <?php session_start();

              if (!isset($_SESSION['client'])){
              }
              else{
              echo '<li class="nav-item">
                <a class="nav-link active" href="create.php">Créer</a>
              </li>';
            }?>
    </ul>
    <ul class="navbar-nav ms-auto"></ul>
    <form class="d-flex" method="GET" action="recherche.php">
              <input class="form-control me-2" name="s"  type="search" placeholder="Search">
                <button class="btn btn-secondary"  type="submit">Search</button>
              </form>
              <?php

              if (!isset($_SESSION['client'])){
              echo '<li class="nav-item">
                <a class="nav-link" href="sign-in.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a>
              </li>';
              }
              else{
                echo '<li class="nav-item">
                <a class="nav-link active" href="profil.php"><img src="img/user@2x.png" style="height: 30px; width: 30px;"></a></li>';
                
                echo '<li class="nav-item"><a href="deconnexion.php" class="btn btn-light">Log out</a></li>';
                
              }
              ?>
    </li>
    </ul>
    </div>
    </nav>
        <a href="index.php" class="btn btn-secondary">Back Home</a>
        
        <h2>Carte</h2>

        <form  action="testmap.php" method="post" autocomplete="off">

            Données : <SELECT class="form-group" name="données">
            <OPTION VALUE="PIB par habitant">PIB</OPTION>
            <OPTION VALUE="espe_vie">Espérance de vie</OPTION>
            <OPTION VALUE="tx_obesite(%)">Taux d'obésité</OPTION>
            <OPTION VALUE="depenses_sante($)">Dépenses santé</OPTION>
            </SELECT>

            Année : <SELECT class="form-group" name="année">
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </SELECT>

            <button type="submit" class="btn btn-secondary">Sélectionner</button>
        </form>

        <?php 

        if ((isset($_POST['année']) and !empty($_POST['année']))
        or (isset($_POST['données']) and !empty($_POST['données']))){

            $bdd = getBD();

            $année = $_POST['année'];
            $données = $_POST['données'];

            $map = $bdd ->query("SELECT Code,`$données` FROM `data` WHERE Annee = '".$année."'" );
            while($m = $map ->fetch()){
                
                $r[]=$m;
            }
            
            
            foreach($r as $d){
                $data []= array('code'=>$d['Code'],'data'=>(float)$d[$données]);
            
            }
             
            $Dmap =json_encode($data);
            
            $map ->closeCursor();
            echo '<p>Pour l\'année '.$année.' nous avons :</p>';

            //print_r($Dmap);

        }
        
        ?>

        <div id="map"></div>
        
    </body>
</html>
<script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
      const map = new mapboxgl.Map({
      container: 'map',
      // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
      style: 'mapbox://styles/mapbox/light-v11',
      center: [12, 50],
      zoom: 2.2
      });
    
    
      const data = <?php echo $Dmap;?>
      
      map.on('load', () => {
      
      map.addSource('countries', {
      type: 'vector',
      url: 'mapbox://mapbox.country-boundaries-v1'
      });
      
      // Build a GL match expression that defines the color for every vector tile feature
      // Use the ISO 3166-1 alpha 3 code as the lookup key for the country shape
      const matchExpression = ['match', ['get', 'iso_3166_1_alpha_3']];
      
      // Calculate color values for each country based on 'data' value
      for (const row of data) {
      // Convert the range of data values to a suitable color
      const blue = row['data'];
      const color = getColor(blue);
      
      function getColor(d) {
          return d > 1000 ? 'blue' :
              d > 500  ? 'yellow' :
              d > 200  ? 'orange' :
              d > 100  ? 'green' :
              d > 50   ? 'brown' :
              d > 20   ? 'purple' :
              d > 10   ? 'pink' :
                          'red';
      }
      matchExpression.push(row['code'], color);
      }
      
      // Last value is the default, used where there is no data
      matchExpression.push('rgba(0, 0, 0, 0)');
      
      map.doubleClickZoom.enable();

      const isBoxZoomEnabled = map.boxZoom.isEnabled();
      
      const WORLDVIEW = "US";
      const worldview_filter = [ "all", [ "==", ["get", "disputed"], "false" ], [ "any", [ "==", "all", ["get", "worldview"] ], [ "in", WORLDVIEW, ["get", "worldview"] ] ] ];
      
      // Add layer from the vector tile source to create the choropleth
      // Insert it below the 'admin-1-boundary-bg' layer in the style
      map.addLayer(
      {
      'id': 'countries-join',
      'type': 'fill',
      'source': 'countries',
      'source-layer': 'country_boundaries',
      'paint': {
      'fill-color': matchExpression
      },
      'filter': worldview_filter
      },
      'admin-1-boundary-bg'
      );
      });
    </script>