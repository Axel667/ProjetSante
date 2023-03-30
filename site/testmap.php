<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carte</title>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>

        <style>
            #map { position: relative; top: 20px; bottom: 40px; width: 70%; }
        </style>

        <link rel="stylesheet" href="site.css">

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
      <a class="nav-link active" href="evolutiontest.php">Evolution</a>
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
            $v[]=$m[$données];
            $r[]=$m;
          }
            
          foreach($r as $d){

            $data []= array('code'=>$d['Code'],'data'=>(float)$d[$données]);
                
          }
          ?>
            
          <div id =" data" > <?php $Dmap =json_encode($data);?></div>

          <?php
            
          $map ->closeCursor();
          echo '<p>Pour l\'année '.$année.' nous avons :</p>';
            
          // Récupération des valeurs du tableau
          $valeurs = array_values($v);

          // Tri des valeurs
          sort($valeurs);

          $decile1 = $valeurs[floor(count($valeurs) * 0.1)];
          $decile2 = $valeurs[floor(count($valeurs) * 0.2)];
          $decile3 = $valeurs[floor(count($valeurs) * 0.3)];
          $decile4 = $valeurs[floor(count($valeurs) * 0.4)];
          $decile5 = $valeurs[floor(count($valeurs) * 0.5)];
          $decile6 = $valeurs[floor(count($valeurs) * 0.6)];
          $decile7 = $valeurs[floor(count($valeurs) * 0.7)];
          $decile8 = $valeurs[floor(count($valeurs) * 0.8)];
          $decile9 = $valeurs[floor(count($valeurs) * 0.9)];

        }
      
        ?>

        <div id="map"></div>
        <?php if ((isset($_POST['année']) and !empty($_POST['année']))
        or (isset($_POST['données']) and !empty($_POST['données']))){
        ?>
        <div class='map-overlay' id='features'><h2><?php echo "$données en $année"   ?></h2><div id='pd'><p>Cliquez sur un pays !</p></div></div>
        <div class='map-overlay' id='legend'></div>
        <?php }
        else{

        }?>
        
    </body>
</html>

<script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
      const map = new mapboxgl.Map({
      container: 'map',
      // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
      style: 'mapbox://styles/mapbox/light-v11',
      center: [12, 50],
      zoom: 1.6
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

      const d1 = <?php echo $decile1; ?>;
      const d2 = <?php echo $decile2; ?>;
      const d3 = <?php echo $decile3; ?>;
      const d4 = <?php echo $decile4; ?>;
      const d5 = <?php echo $decile5; ?>;
      const d6 = <?php echo $decile6; ?>;
      const d7 = <?php echo $decile7; ?>;
      const d8 = <?php echo $decile8; ?>;
      const d9 = <?php echo $decile9; ?>;
      
      // Calculate color values for each country based on 'data' value
      for (const row of data) {
      // Convert the range of data values to a suitable color
      const blue = row['data'];
      const color = getColor(blue,d1,d2,d3,d4,d5,d6,d7,d8,d9);
      
      function getColor(e,d1,d2,d3,d4,d5,d6,d7,d8,d9) {
          return e > d9   ? '#2f2f87' :
            e > d8  ? '#203e94' :
              e > d7  ? '#2a90b6' :
              e > d6  ? '#1bad86' :
              e > d5  ? '#43c61f' :
              e > d4   ? '#9fce21' :
              e > d3 ? '#d1d11e' :
              e > d2   ? '#fdbd12' :
              e > d1   ? '#f87e27' :
                          '#be3f07';
      }
      matchExpression.push(row['code'], color);
      }

      const layers = [
        'NA',
        '> '+d1,
        '> '+d2,
        '> '+d3,
        '> '+d4,
        '> '+d5,
        '> '+d6,
        '> '+d7,
        '> '+d8,
        '> '+d9
      ];

      const couleur = [
        '#fff',
        '#be3f07',
        '#f87e27',
        '#fdbd12',
        '#d1d11e',
        '#9fce21',
        '#43c61f',
        '#1bad86',
        '#2a90b6',
        '#203e94',
        '#2f2f87',
      ];

      const legend = document.getElementById('legend');

      layers.forEach((layer, i) => {
        const color2 = couleur[i];
        const item = document.createElement('div');
        const key = document.createElement('span');
        key.className = 'legend-key';
        key.style.backgroundColor = color2;

        const value = document.createElement('span');
        value.innerHTML = `${layer}`;
        item.appendChild(key);
        item.appendChild(value);
        legend.appendChild(item);
      });
      
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
      'id': 'countries',
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
      
      
    map.on('click', (event) => {
      const features = map.queryRenderedFeatures(event.point, { layers: ['countries'] });
      console.log(features);

      if (features.length > 0) {
        const density = features[0].properties.name;
        const name = features[0].properties.name_en;
        const tooltip = `<h3>${name}</h3><p><strong><em>${density}</strong> </em></p>`;

        new mapboxgl.Popup({ offset: 15 })
          .setLngLat(event.lngLat)
          .setHTML(tooltip)
          .addTo(map);
      }


    });


    });

      
  
  </script>