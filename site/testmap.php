<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carte</title>
   <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
   <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <link rel="stylesheet" href="Projet-SantEco_Map/Projet-SantEco_Map/map.css">
   <script src="https://cdn.tailwindcss.com"></script>
   <style>
   #map {
      margin: 10px;
      height: 700px;
      /* Set fixed height for map container */
      margin-bottom: 1rem;
      /* Add margin below the map container */
   }

   .legend-key {
      display: inline-block;
      width: 16px;
      height: 16px;
      margin-right: 8px;
      vertical-align: middle;
   }
   </style>
   <?php include("baseD.php"); ?>

</head>
<nav class="bg-stone-800 text-white px-6 rounded-lg mt-4 mx-4">
   <div class="flex items-center justify-between">
      <div class="flex space-x-4">
         <!-- logo -->
         <div class="mx-8">
            <a href=" index.php" class="flex items-center py-5 px-2  hover:text-stone-400">
               <svg class="h-6 w-6 mr-1 text-purple-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
               </svg>
               <span class="text-2xl font-bold">SantÉconomie</span>
            </a>
         </div>

         <!-- primary nav -->
         <div class="hidden md:flex items-center space-x-1">
            <a href="testmap.php" class="bg-stone-100/10 px-4 py-4 border-2 border-stone-800 rounded-md ">Carte</a>
            <a href="comparaison2.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Comparer</a>
            <a href="evolutiontest.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Evolution</a>
            <a href="nos-article.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Nos
               Articles</a>
            <a href="datasets.php"
               class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Datasets</a>
            <?php
            session_start();
            if (!isset($_SESSION['client'])) {
            } else {
               echo '<a href="create.php" class="px-4 py-4 border-2 border-stone-800 rounded-md hover:border-2  hover:border-stone-100/10">Créer</a>';
            } ?>
         </div>
      </div>

      <!-- secondary nav -->
      <div class="hidden md:flex items-center space-x-1">

         <form method="GET" action="recherche.php">
            <div class="relative text-stone-600 focus-within:text-stone-400">
               <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                  <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                     <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                     </svg>
                  </button>
               </span>
               <input type="search" name="q"
                  class="py-2 text-sm text-white bg-stone-900 rounded-md pl-10 focus:outline-none focus:bg-stone-700 focus:text-white"
                  placeholder="Search..." autocomplete="off">
            </div>
         </form>

         <?php
         if (!isset($_SESSION['client'])) {
            echo '            
               <a href="sign-in.php" class="flex items-center py-5 px-4">Sign-in
               <svg class="h-6 w-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                     d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
               </svg>
               </a>
               <a href="sign-up.php"
               class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
               <span
                  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Sign-up
               </span>
            </a>';
         } else {
            echo '<a href="profil.php" class="mx-4"><svg class="h-8 w-8 mx-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                     d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
               </svg></a>';
            echo '<a href="deconnexion.php" class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
               <span
                  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Log-out
               </span></a>';
         }
         ?>

      </div>
   </div>
</nav>

<body class="bg-gray-100">
   <div class="container mx-auto px-4 py-8">
      <div class="bg-white rounded-lg p-6 shadow">
         <form action="testmap.php" method="post" autocomplete="off" class="space-y-4">
            <div class="flex items-center space-x-4">
               <label for="données" class="block text-gray-700 text-sm font-bold mb-2">Données:</label>
               <select class="form-select block mt-1" name="données">
                  <option value="PIB par habitant">PIB</option>
                  <option value="espe_vie">Espérance de vie</option>
                  <option value="tx_obesite(%)">Taux d'obésité</option>
                  <option value="depenses_sante($)">Dépenses santé</option>
               </select>

               <label for="année" class="block text-gray-700 text-sm font-bold mb-2">Année:</label>
               <select class="form-select block mt-1" name="année">
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
               </select>

               <button type="submit"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sélectionner</button>

               <span class="font-bold">
                  <?php
                  if (isset($données) && isset($année)) {
                     echo "<h2>$données en $année</h2>";
                     echo "<div id='pd'><p>Cliquez sur un pays !</p></div>";
                  }
                  ?>
               </span>

            </div>
         </form>
      </div>

      <?php

      if ((isset($_POST['année']) and !empty($_POST['année']))
         or (isset($_POST['données']) and !empty($_POST['données']))
      ) {

         $bdd = getBD();

         $année = $_POST['année'];
         $données = $_POST['données'];

         $map = $bdd->query("SELECT Code,`$données` FROM `data` WHERE Annee = '" . $année . "'");
         while ($m = $map->fetch()) {
            $v[] = $m[$données];
            $r[] = $m;
         }

         $toto = [];
         foreach ($r as $d) {

            $data[] = array('code' => $d['Code'], 'data' => (float)$d[$données]);
            $toto[$d['Code']] = (float)$d[$données];
         }

         //a montrer a mme bringuay
         // echo json_encode($toto);
         echo "<script> var toto=" . json_encode($toto) . ";</script>";

      ?>

      <div id=" data"> <?php $Dmap = json_encode($data); ?></div>

      <?php

         $map->closeCursor();

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
         or (isset($_POST['données']) and !empty($_POST['données']))
      ) {
      ?>
      <div class='map-overlay' id='features'>
      </div>
      <div class="absolute bottom-0 right-0 bg-white rounded-lg p-4 mb-4 mr-4 shadow z-10">
         <div id="legend" class="flex flex-col space-y-2"></div>
      </div>
      <?php } else {
      } ?>
   </div>
</body>

</html>

<script>
const année = <?php echo json_encode($année); ?>;
mapboxgl.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
const map = new mapboxgl.Map({
   container: 'map',
   // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
   style: 'mapbox://styles/mapbox/light-v11',
   center: [12, 50],
   zoom: 1.6
});

const data = <?php echo $Dmap; ?>

map.on('load', () => {

   map.addSource('countries', {
      type: 'vector',
      url: 'mapbox://mapbox.country-boundaries-v1',
      data: data
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
      const color = getColor(blue, d1, d2, d3, d4, d5, d6, d7, d8, d9);

      function getColor(e, d1, d2, d3, d4, d5, d6, d7, d8, d9) {
         return e > d9 ? '#2f2f87' :
            e > d8 ? '#203e94' :
            e > d7 ? '#2a90b6' :
            e > d6 ? '#1bad86' :
            e > d5 ? '#43c61f' :
            e > d4 ? '#9fce21' :
            e > d3 ? '#d1d11e' :
            e > d2 ? '#fdbd12' :
            e > d1 ? '#f87e27' :
            '#be3f07';
      }
      matchExpression.push(row['code'], color);
   }

   const layers = [
      `Pour l'année ${année} nous avons :`,
      '> ' + d1,
      '> ' + d2,
      '> ' + d3,
      '> ' + d4,
      '> ' + d5,
      '> ' + d6,
      '> ' + d7,
      '> ' + d8,
      '> ' + d9,
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
   const worldview_filter = ["all", ["==", ["get", "disputed"], "false"],
      ["any", ["==", "all", ["get", "worldview"]],
         ["in", WORLDVIEW, ["get", "worldview"]]
      ]
   ];

   // Add layer from the vector tile source to create the choropleth
   // Insert it below the 'admin-1-boundary-bg' layer in the style
   map.addLayer({
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
      const features = map.queryRenderedFeatures(event.point, {
         layers: ['countries']
      });
      console.log(features);

      if (features.length > 0) {
         const name = features[0].properties.name_en;
         const maj = features[0].properties.iso_3166_1_alpha_3;
         const donnee = toto[maj];
         const tooltip =
            `<h3>${name}</h3><p><?php echo "$données : "; ?><strong><em>${donnee}</strong></em></p>`;
         new mapboxgl.Popup({
               offset: 15
            })
            .setLngLat(event.lngLat)
            .setHTML(tooltip)
            .addTo(map);
      }
   });
});
</script>