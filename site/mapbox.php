<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Join local JSON data with vector tile geometries</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <!--<link rel="stylesheet" type="text/css" href="site.css" />-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="Projet-SantEco_Map/Projet-SantEco_Map/map.css">

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
    <style>
    body { margin: 0; padding: 0; }
    #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
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


    <div id="map"></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
    const map = new mapboxgl.Map({
    container: 'map',
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/light-v11',
    center: [12, 50],
    zoom: 2.2
    });
    
    
    const data = [
    { 'code': 'ABW', 'data': 0.811 },
    { 'code': 'AFG', 'data': 0.816 },
    { 'code': 'AGO', 'data': 0.787 },
    { 'code': 'ALB', 'data': 0.855 },
    { 'code': 'ARE', 'data': 0.896 },
    { 'code': 'ARG', 'data': 0.891 },
    { 'code': 'ARM', 'data': 0.933 },
    { 'code': 'ATG', 'data': 0.944 },
    { 'code': 'AUS', 'data': 0.831 },
    { 'code': 'AUT', 'data': 0.888 },
    { 'code': 'AZE', 'data': 0.929 },
    { 'code': 'BDI', 'data': 0.871 },
    { 'code': 'BEL', 'data': 0.92 },
    { 'code': 'BEN', 'data': 0.901 },
    { 'code': 'BFA', 'data': 0.936 },
    { 'code': 'BGD', 'data': 0.87 },
    { 'code': 'BGR', 'data': 0.785 },
    { 'code': 'BHR', 'data': 0.858 },
    { 'code': 'BHS', 'data': 0.908 },
    { 'code': 'BIH', 'data': 0.808 },
    { 'code': 'BLR', 'data': 0.916 },
    { 'code': 'BLZ', 'data': 0.768 },
    { 'code': 'BMU', 'data': 0.813 },
    { 'code': 'BOL', 'data': 0.757 },
    { 'code': 'BRA', 'data': 0.878 },
    { 'code': 'BRB', 'data': 0.7 },
    { 'code': 'BRN', 'data': 0.814 },
    { 'code': 'BTN', 'data': 0.931 },
    { 'code': 'BWA', 'data': 0.953 },
    { 'code': 'CAF', 'data': 0.865 },
    { 'code': 'CAN', 'data': 0.847 },
    { 'code': 'CHE', 'data': 0.838 },
    { 'code': 'CHL', 'data': 0.935 },
    { 'code': 'CHN', 'data': 0.938 },
    { 'code': 'CIV', 'data': 0.88 },
    { 'code': 'CMR', 'data': 0.847 },
    { 'code': 'COD', 'data': 0.916 },
    { 'code': 'COG', 'data': 0.858 },
    { 'code': 'COL', 'data': 0.904 },
    { 'code': 'COM', 'data': 0.751 },
    { 'code': 'CPV', 'data': 0.922 },
    { 'code': 'CRI', 'data': 0.811 },
    { 'code': 'CUW', 'data': 0.816 },
    { 'code': 'CYM', 'data': 0.787 },
    { 'code': 'CYP', 'data': 0.855 },
    { 'code': 'CZE', 'data': 0.896 },
    { 'code': 'DEU', 'data': 0.891 },
    { 'code': 'DJI', 'data': 0.933 },
    { 'code': 'DMA', 'data': 0.944 },
    { 'code': 'DNK', 'data': 0.831 },
    { 'code': 'DOM', 'data': 0.888 },
    { 'code': 'DZA', 'data': 0.929 },
    { 'code': 'ECU', 'data': 0.871 },
    { 'code': 'EGY', 'data': 0.92 },
    { 'code': 'ESP', 'data': 1000 },
    { 'code': 'EST', 'data': 0.936 },
    { 'code': 'ETH', 'data': 0.87 },
    { 'code': 'FIN', 'data': 0.785 },
    { 'code': 'FJI', 'data': 0.858 },
    { 'code': 'FRA', 'data': 800 },
    { 'code': 'FSM', 'data': 0.808 },
    { 'code': 'GAB', 'data': 0.916 },
    { 'code': 'GBR', 'data': 0.768 },
    { 'code': 'GEO', 'data': 0.813 },
    { 'code': 'GHA', 'data': 0.757 },
    { 'code': 'GIN', 'data': 0.878 },
    { 'code': 'GMB', 'data': 0.7 },
    { 'code': 'GNB', 'data': 0.814 },
    { 'code': 'GNQ', 'data': 0.931 },
    { 'code': 'GRC', 'data': 0.953 },
    { 'code': 'GRD', 'data': 0.865 },
    { 'code': 'GTM', 'data': 0.847 },
    { 'code': 'GUY', 'data': 0.838 },
    { 'code': 'HKG', 'data': 0.935 },
    { 'code': 'HND', 'data': 0.938 },
    { 'code': 'HRV', 'data': 0.88 },
    { 'code': 'HTI', 'data': 0.847 },
    { 'code': 'HUN', 'data': 0.916 },
    { 'code': 'IDN', 'data': 0.858 },
    { 'code': 'IND', 'data': 0.904 },
    { 'code': 'IRL', 'data': 0.751 },
    { 'code': 'IRN', 'data': 0.922 },
    { 'code': 'IRQ', 'data': 0.811 },
    { 'code': 'ISL', 'data': 0.816 },
    { 'code': 'ISR', 'data': 0.787 },
    { 'code': 'ITA', 'data': 0.855 },
    { 'code': 'JAM', 'data': 0.896 },
    { 'code': 'JOR', 'data': 0.891 },
    { 'code': 'JPN', 'data': 0.933 },
    { 'code': 'KAZ', 'data': 0.944 },
    { 'code': 'KEN', 'data': 0.831 },
    { 'code': 'KGZ', 'data': 0.888 },
    { 'code': 'KHM', 'data': 0.929 },
    { 'code': 'KIR', 'data': 0.871 },
    { 'code': 'KNA', 'data': 0.92 },
    { 'code': 'KOR', 'data': 0.901 },
    { 'code': 'KWT', 'data': 0.936 },
    { 'code': 'LAO', 'data': 0.87 },
    { 'code': 'LBN', 'data': 0.785 },
    { 'code': 'LBR', 'data': 0.858 },
    { 'code': 'LBY', 'data': 0.908 },
    { 'code': 'LCA', 'data': 0.808 },
    { 'code': 'LKA', 'data': 0.916 },
    { 'code': 'LSO', 'data': 0.768 },
    { 'code': 'LTU', 'data': 0.813 },
    { 'code': 'LUX', 'data': 0.757 },
    { 'code': 'LVA', 'data': 0.878 },
    { 'code': 'MAC', 'data': 0.7 },
    { 'code': 'MAR', 'data': 0.814 },
    { 'code': 'MDA', 'data': 0.931 },
    { 'code': 'MDG', 'data': 0.953 },
    { 'code': 'MDV', 'data': 0.865 },
    { 'code': 'MEX', 'data': 0.847 },
    { 'code': 'MHL', 'data': 0.838 },
    { 'code': 'MKD', 'data': 0.935 },
    { 'code': 'MLI', 'data': 0.938 },
    { 'code': 'MLT', 'data': 0.88 },
    { 'code': 'MMR', 'data': 0.847 },
    { 'code': 'MNE', 'data': 0.916 },
    { 'code': 'MNG', 'data': 0.858 },
    { 'code': 'MOZ', 'data': 0.904 },
    { 'code': 'MRT', 'data': 0.751 },
    { 'code': 'MUS', 'data': 0.922 },
    { 'code': 'MWI', 'data': 0.811 },
    { 'code': 'MYS', 'data': 0.816 },
    { 'code': 'NAM', 'data': 0.787 },
    { 'code': 'NER', 'data': 0.855 },
    { 'code': 'NGA', 'data': 0.896 },
    { 'code': 'NIC', 'data': 0.891 },
    { 'code': 'NLD', 'data': 0.933 },
    { 'code': 'NOR', 'data': 0.944 },
    { 'code': 'NPL', 'data': 0.831 },
    { 'code': 'NRU', 'data': 0.888 },
    { 'code': 'NZL', 'data': 0.929 },
    { 'code': 'OMN', 'data': 0.871 },
    { 'code': 'OWID_KOS', 'data': 0.92 },
    { 'code': 'PAK', 'data': 0.901 },
    { 'code': 'PAN', 'data': 0.936 },
    { 'code': 'PER', 'data': 150 },
    { 'code': 'PHL', 'data': 0.785 },
    { 'code': 'PLW', 'data': 0.858 },
    { 'code': 'PNG', 'data': 0.908 },
    { 'code': 'POL', 'data': 0.808 },
    { 'code': 'PRI', 'data': 0.916 },
    { 'code': 'PRT', 'data': 0.768 },
    { 'code': 'PRY', 'data': 0.813 },
    { 'code': 'PSE', 'data': 0.757 },
    { 'code': 'QAT', 'data': 150 },
    { 'code': 'ROU', 'data': 0.7 },
    { 'code': 'RUS', 'data': 1200 },
    { 'code': 'RWA', 'data': 0.931 },
    { 'code': 'SAU', 'data': 0.953 },
    { 'code': 'SDN', 'data': 0.865 },
    { 'code': 'SEN', 'data': 550 },
    { 'code': 'SGP', 'data': 0.838 },
    { 'code': 'SLB', 'data': 0.935 },
    { 'code': 'SLE', 'data': 0.938 },
    { 'code': 'SLV', 'data': 0.88 },
    { 'code': 'SMR', 'data': 0.847 },
    { 'code': 'SOM', 'data': 0.916 },
    { 'code': 'SRB', 'data': 0.858 },
    { 'code': 'STP', 'data': 0.904 },
    { 'code': 'SUR', 'data': 0.751 },
    { 'code': 'SVK', 'data': 0.922 },
    { 'code': 'SWE', 'data': 0.7 },
    { 'code': 'SWZ', 'data': 0.814 },
    { 'code': 'SXM', 'data': 0.931 },
    { 'code': 'SYC', 'data': 0.953 },
    { 'code': 'TCA', 'data': 0.865 },
    { 'code': 'TCD', 'data': 0.847 },
    { 'code': 'TGO', 'data': 0.838 },
    { 'code': 'THA', 'data': 0.935 },
    { 'code': 'TJK', 'data': 0.938 },
    { 'code': 'TKM', 'data': 0.88 },
    { 'code': 'TLS', 'data': 0.847 },
    { 'code': 'TON', 'data': 0.916 },
    { 'code': 'TTO', 'data': 0.858 },
    { 'code': 'TUN', 'data': 0.904 },
    { 'code': 'TUR', 'data': 0.751 },
    { 'code': 'TUV', 'data': 0.922 },
    { 'code': 'TZA', 'data': 0.7 },
    { 'code': 'UGA', 'data': 0.814 },
    { 'code': 'UKR', 'data': 25 },
    { 'code': 'URY', 'data': 14 },
    { 'code': 'USA', 'data': 250 },
    { 'code': 'UZB', 'data': 0.847 },
    { 'code': 'VCT', 'data': 0.838 },
    { 'code': 'VNM', 'data': 0.935 },
    { 'code': 'VUT', 'data': 0.938 },
    { 'code': 'WSM', 'data': 0.88 },
    { 'code': 'ZAF', 'data': 0.847 },
    { 'code': 'ZMB', 'data': 0.916 },
    { 'code': 'ZWE', 'data': 0.858 },
    ];
    
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
    
    // The mapbox.country-boundaries-v1 tileset includes multiple polygons for some
    // countries with disputed borders.  The following expression filters the
    // map view to show the "US" perspective of borders for disputed countries.
    // Other world views are available, for more details, see the documentation
    // on the "worldview" feature property at
    // https://docs.mapbox.com/data/tilesets/reference/mapbox-countries-v1/#--polygon---worldview-text
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
    
</body>
</html>