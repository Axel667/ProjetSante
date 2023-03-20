<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carte</title>
        <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />

        <link rel="stylesheet" href="Projet-SantEco_Map/Projet-SantEco_Map/map.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <?php include("baseD.php"); ?>

        
    </head>
    <body>
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

            $map = $bdd ->query("SELECT * FROM `data` WHERE Annee = '".$année."'" );
            while($m = $map ->fetch()){
                
                $y = $m['Annee'];
                $d = $m[$données];
                $p = $m['Pays'];
            }

            $map ->closeCursor();
            echo '<p>Pour l\'année '.$y.' nous avons :</p>';

            
        }

        ?>

        <div id="map"></div>
        
    </body>
</html>


<script>
// Provide your access token
L.mapbox.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
// Create a map in the div #map
L.mapbox.map('map', 'mapbox.streets');
</script>

<script src="Projet-SantEco_Map/Projet-SantEco_Map/maptest.js"></script>