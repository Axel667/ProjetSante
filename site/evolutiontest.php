<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SantEconomie</title>
   <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white flex flex-col min-h-screen">
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
               <a href="testmap.php" class="px-4 py-2">Carte</a>
               <a href="comparaison2.php" class="px-4 py-2">Comparer</a>
               <a href="evolutiontest.php" class="px-4 py-2">Evolution</a>
               <a href="nos-article.php" class="px-4 py-2">Nos Articles</a>
               <a href="datasets.php" class="px-4 py-2">Datasets</a>
               <?php
               session_start();
               if (!isset($_SESSION['client'])) {
               } else {
                  echo '<a href="create.php" class="mx-2">Créer</a>';
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

   <a href="index.php" class="btn btn-secondary">Back Home</a>

   <br />

   <body>

      <h2>Evolution d'un pays : </h2>

      <br />

      <form action="evolutiontest.php" method="post" autocomplete="off">
         Pays 1: <SELECT class="form-group" name="Pays">
            <OPTION VALUE="Aruba">Aruba</OPTION>
            <OPTION VALUE="Afghanistan">Afghanistan</OPTION>
            <OPTION VALUE="Angola">Angola</OPTION>
            <OPTION VALUE="Albania">Albania</OPTION>
            <OPTION VALUE="United Arab Emirates">United Arab Emirates</OPTION>
            <OPTION VALUE="Argentina">Argentina</OPTION>
            <OPTION VALUE="Armenia">Armenia</OPTION>
            <OPTION VALUE="Antigua and Barbuda">Antigua and Barbuda</OPTION>
            <OPTION VALUE="Australia">Australia</OPTION>
            <OPTION VALUE="Austria">Austria</OPTION>
            <OPTION VALUE="Azerbaijan">Azerbaijan</OPTION>
            <OPTION VALUE="Burundi">Burundi</OPTION>
            <OPTION VALUE="Belgium">Belgium</OPTION>
            <OPTION VALUE="Benin">Benin</OPTION>
            <OPTION VALUE="Burkina Faso">Burkina Faso</OPTION>
            <OPTION VALUE="Bangladesh">Bangladesh</OPTION>
            <OPTION VALUE="Bulgaria">Bulgaria</OPTION>
            <OPTION VALUE="Bahrain">Bahrain</OPTION>
            <OPTION VALUE="Bahamas">Bahamas</OPTION>
            <OPTION VALUE="Bosnia and Herzegovina">Bosnia and Herzegovina</OPTION>
            <OPTION VALUE="Belarus">Belarus</OPTION>
            <OPTION VALUE="Belize">Belize</OPTION>
            <OPTION VALUE="Bermuda">Bermuda</OPTION>
            <OPTION VALUE="Bolivia">Bolivia</OPTION>
            <OPTION VALUE="Brazil">Brazil</OPTION>
            <OPTION VALUE="Barbados">Barbados</OPTION>
            <OPTION VALUE="Brunei">Brunei</OPTION>
            <OPTION VALUE="Bhutan">Bhutan</OPTION>
            <OPTION VALUE="Botswana">Botswana</OPTION>
            <OPTION VALUE="Central African Republic">Central African Republic</OPTION>
            <OPTION VALUE="Canada">Canada</OPTION>
            <OPTION VALUE="Switzerland">Switzerland</OPTION>
            <OPTION VALUE="Chile">Chile</OPTION>
            <OPTION VALUE="China">China</OPTION>
            <OPTION VALUE="Cote d'Ivoire">Cote d'Ivoire</OPTION>
            <OPTION VALUE="Cameroon">Cameroon</OPTION>
            <OPTION VALUE="Democratic Republic of Congo">Democratic Republic of Congo</OPTION>
            <OPTION VALUE="Congo">Congo</OPTION>
            <OPTION VALUE="Colombia">Colombia</OPTION>
            <OPTION VALUE="Comoros">Comoros</OPTION>
            <OPTION VALUE="Cape Verde">Cape Verde</OPTION>
            <OPTION VALUE="Costa Rica">Costa Rica</OPTION>
            <OPTION VALUE="Curacao">Curacao</OPTION>
            <OPTION VALUE="Cayman Islands">Cayman Islands</OPTION>
            <OPTION VALUE="Cyprus">Cyprus</OPTION>
            <OPTION VALUE="Czechia">Czechia</OPTION>
            <OPTION VALUE="Germany">Germany</OPTION>
            <OPTION VALUE="Djibouti">Djibouti</OPTION>
            <OPTION VALUE="Dominica">Dominica</OPTION>
            <OPTION VALUE="Denmark">Denmark</OPTION>
            <OPTION VALUE="Dominican Republic">Dominican Republic</OPTION>
            <OPTION VALUE="Algeria">Algeria</OPTION>
            <OPTION VALUE="Ecuador">Ecuador</OPTION>
            <OPTION VALUE="Egypt">Egypt</OPTION>
            <OPTION VALUE="Spain">Spain</OPTION>
            <OPTION VALUE="Estonia">Estonia</OPTION>
            <OPTION VALUE="Ethiopia">Ethiopia</OPTION>
            <OPTION VALUE="Finland">Finland</OPTION>
            <OPTION VALUE="Fiji">Fiji</OPTION>
            <OPTION VALUE="France">France</OPTION>
            <OPTION VALUE="Micronesia (country)">Micronesia (country)</OPTION>
            <OPTION VALUE="Gabon">Gabon</OPTION>
            <OPTION VALUE="United Kingdom">United Kingdom</OPTION>
            <OPTION VALUE="Georgia">Georgia</OPTION>
            <OPTION VALUE="Ghana">Ghana</OPTION>
            <OPTION VALUE="Guinea">Guinea</OPTION>
            <OPTION VALUE="Gambia">Gambia</OPTION>
            <OPTION VALUE="Guinea-Bissau">Guinea-Bissau</OPTION>
            <OPTION VALUE="Equatorial Guinea">Equatorial Guinea</OPTION>
            <OPTION VALUE="Greece">Greece</OPTION>
            <OPTION VALUE="Grenada">Grenada</OPTION>
            <OPTION VALUE="Guatemala">Guatemala</OPTION>
            <OPTION VALUE="Guyana">Guyana</OPTION>
            <OPTION VALUE="Hong Kong">Hong Kong</OPTION>
            <OPTION VALUE="Honduras">Honduras</OPTION>
            <OPTION VALUE="Croatia">Croatia</OPTION>
            <OPTION VALUE="Haiti">Haiti</OPTION>
            <OPTION VALUE="Hungary">Hungary</OPTION>
            <OPTION VALUE="Indonesia">Indonesia</OPTION>
            <OPTION VALUE="India">India</OPTION>
            <OPTION VALUE="Ireland">Ireland</OPTION>
            <OPTION VALUE="Iran">Iran</OPTION>
            <OPTION VALUE="Iraq">Iraq</OPTION>
            <OPTION VALUE="Iceland">Iceland</OPTION>
            <OPTION VALUE="Israel">Israel</OPTION>
            <OPTION VALUE="Italy">Italy</OPTION>
            <OPTION VALUE="Jamaica">Jamaica</OPTION>
            <OPTION VALUE="Jordan">Jordan</OPTION>
            <OPTION VALUE="Japan">Japan</OPTION>
            <OPTION VALUE="Kazakhstan">Kazakhstan</OPTION>
            <OPTION VALUE="Kenya">Kenya</OPTION>
            <OPTION VALUE="Kyrgyzstan">Kyrgyzstan</OPTION>
            <OPTION VALUE="Cambodia">Cambodia</OPTION>
            <OPTION VALUE="Kiribati">Kiribati</OPTION>
            <OPTION VALUE="Saint Kitts and Nevis">Saint Kitts and Nevis</OPTION>
            <OPTION VALUE="South Korea">South Korea</OPTION>
            <OPTION VALUE="Kuwait">Kuwait</OPTION>
            <OPTION VALUE="Laos">Laos</OPTION>
            <OPTION VALUE="Lebanon">Lebanon</OPTION>
            <OPTION VALUE="Liberia">Liberia</OPTION>
            <OPTION VALUE="Libya">Libya</OPTION>
            <OPTION VALUE="Saint Lucia">Saint Lucia</OPTION>
            <OPTION VALUE="Sri Lanka">Sri Lanka</OPTION>
            <OPTION VALUE="Lesotho">Lesotho</OPTION>
            <OPTION VALUE="Lithuania">Lithuania</OPTION>
            <OPTION VALUE="Luxembourg">Luxembourg</OPTION>
            <OPTION VALUE="Latvia">Latvia</OPTION>
            <OPTION VALUE="Macao">Macao</OPTION>
            <OPTION VALUE="Morocco">Morocco</OPTION>
            <OPTION VALUE="Moldova">Moldova</OPTION>
            <OPTION VALUE="Madagascar">Madagascar</OPTION>
            <OPTION VALUE="Maldives">Maldives</OPTION>
            <OPTION VALUE="Mexico">Mexico</OPTION>
            <OPTION VALUE="Marshall Islands">Marshall Islands</OPTION>
            <OPTION VALUE="North Macedonia">North Macedonia</OPTION>
            <OPTION VALUE="Mali">Mali</OPTION>
            <OPTION VALUE="Malta">Malta</OPTION>
            <OPTION VALUE="Myanmar">Myanmar</OPTION>
            <OPTION VALUE="Montenegro">Montenegro</OPTION>
            <OPTION VALUE="Mongolia">Mongolia</OPTION>
            <OPTION VALUE="Mozambique">Mozambique</OPTION>
            <OPTION VALUE="Mauritania">Mauritania</OPTION>
            <OPTION VALUE="Mauritius">Mauritius</OPTION>
            <OPTION VALUE="Malawi">Malawi</OPTION>
            <OPTION VALUE="Malaysia">Malaysia</OPTION>
            <OPTION VALUE="Namibia">Namibia</OPTION>
            <OPTION VALUE="Niger">Niger</OPTION>
            <OPTION VALUE="Nigeria">Nigeria</OPTION>
            <OPTION VALUE="Nicaragua">Nicaragua</OPTION>
            <OPTION VALUE="Netherlands">Netherlands</OPTION>
            <OPTION VALUE="Norway">Norway</OPTION>
            <OPTION VALUE="Nepal">Nepal</OPTION>
            <OPTION VALUE="Nauru">Nauru</OPTION>
            <OPTION VALUE="New Zealand">New Zealand</OPTION>
            <OPTION VALUE="Oman">Oman</OPTION>
            <OPTION VALUE="Kosovo">Kosovo</OPTION>
            <OPTION VALUE="Pakistan">Pakistan</OPTION>
            <OPTION VALUE="Panama">Panama</OPTION>
            <OPTION VALUE="Peru">Peru</OPTION>
            <OPTION VALUE="Philippines">Philippines</OPTION>
            <OPTION VALUE="Palau">Palau</OPTION>
            <OPTION VALUE="Papua New Guinea">Papua New Guinea</OPTION>
            <OPTION VALUE="Poland">Poland</OPTION>
            <OPTION VALUE="Puerto Rico">Puerto Rico</OPTION>
            <OPTION VALUE="Portugal">Portugal</OPTION>
            <OPTION VALUE="Paraguay">Paraguay</OPTION>
            <OPTION VALUE="Palestine">Palestine</OPTION>
            <OPTION VALUE="Qatar">Qatar</OPTION>
            <OPTION VALUE="Romania">Romania</OPTION>
            <OPTION VALUE="Russia">Russia</OPTION>
            <OPTION VALUE="Rwanda">Rwanda</OPTION>
            <OPTION VALUE="Saudi Arabia">Saudi Arabia</OPTION>
            <OPTION VALUE="Sudan">Sudan</OPTION>
            <OPTION VALUE="Senegal">Senegal</OPTION>
            <OPTION VALUE="Singapore">Singapore</OPTION>
            <OPTION VALUE="Solomon Islands">Solomon Islands</OPTION>
            <OPTION VALUE="Sierra Leone">Sierra Leone</OPTION>
            <OPTION VALUE="El Salvador">El Salvador</OPTION>
            <OPTION VALUE="San Marino">San Marino</OPTION>
            <OPTION VALUE="Somalia">Somalia</OPTION>
            <OPTION VALUE="Serbia">Serbia</OPTION>
            <OPTION VALUE="Sao Tome and Principe">Sao Tome and Principe</OPTION>
            <OPTION VALUE="Suriname">Suriname</OPTION>
            <OPTION VALUE="Slovakia">Slovakia</OPTION>
            <OPTION VALUE="Slovenia">Slovenia</OPTION>
            <OPTION VALUE="Sweden">Sweden</OPTION>
            <OPTION VALUE="Eswatini">Eswatini</OPTION>
            <OPTION VALUE="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</OPTION>
            <OPTION VALUE="Seychelles">Seychelles</OPTION>
            <OPTION VALUE="DenmTurks and Caicos Islandsark">Turks and Caicos Islands</OPTION>
            <OPTION VALUE="Chad">Chad</OPTION>
            <OPTION VALUE="Togo">Togo</OPTION>
            <OPTION VALUE="Thailand">Thailand</OPTION>
            <OPTION VALUE="Tajikistan">Tajikistan</OPTION>
            <OPTION VALUE="Turkmenistan">Turkmenistan</OPTION>
            <OPTION VALUE="Timor">Timor</OPTION>
            <OPTION VALUE="Tonga">Tonga</OPTION>
            <OPTION VALUE="Trinidad and Tobago">Trinidad and Tobago</OPTION>
            <OPTION VALUE="Tunisia">Tunisia</OPTION>
            <OPTION VALUE="Turkey">Turkey</OPTION>
            <OPTION VALUE="Tuvalu">Tuvalu</OPTION>
            <OPTION VALUE="Tanzania">Tanzania</OPTION>
            <OPTION VALUE="Uganda">Uganda</OPTION>
            <OPTION VALUE="Ukraine">Ukraine</OPTION>
            <OPTION VALUE="Uruguay">Uruguay</OPTION>
            <OPTION VALUE="United States">United States</OPTION>
            <OPTION VALUE="Uzbekistan">Uzbekistan</OPTION>
            <OPTION VALUE="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</OPTION>
            <OPTION VALUE="Vietnam">Vietnam</OPTION>
            <OPTION VALUE="Vanuatu">Vanuatu</OPTION>
            <OPTION VALUE="Samoa">Samoa</OPTION>
            <OPTION VALUE="South Africa">South Africa</OPTION>
            <OPTION VALUE="Zambia">Zambia</OPTION>
            <OPTION VALUE="Zimbabwe">Zimbabwe</OPTION>
            <OPTION VALUE="World">World</OPTION>
         </SELECT>

         Type de graphique : <SELECT class="form-group" name="type">
            <OPTION VALUE="bar">Barre</OPTION>
            <OPTION VALUE="line">Line</OPTION>
            <OPTION VALUE="scatter">Nuage de points</OPTION>
            <OPTION VALUE="radar">Radar</OPTION>
         </SELECT>

         PIB : <SELECT class="form-group" name="pib">
            <OPTION VALUE="PIB par habitant">PIB</OPTION>
         </SELECT>

         Données : <SELECT class="form-group" name="donnée">
            <OPTION VALUE="espe_vie">Espérance de vie</OPTION>
            <OPTION VALUE="tx_obesite(%)">Taux d'obésité</OPTION>
            <OPTION VALUE="depenses_sante($)">Dépenses santé</OPTION>
         </SELECT>

         <button type="submit" class="btn btn-secondary">Voir l'évolution</button>

      </form>

      <?php

      if (
         (isset($_POST['Pays']) and !empty($_POST['Pays']))
         or (isset($_POST['type']) and !empty($_POST['type']))
         or (isset($_POST['pib']) and !empty($_POST['pib']))
         or (isset($_POST['donnée']) and !empty($_POST['donnée']))
      ) {
         include("baseD.php");
         $bdd = getBD();

         $p = $_POST['Pays'];
         $pib = $_POST['pib'];
         $type = $_POST['type'];
         $donnée = $_POST['donnée'];
         $result = $bdd->query("SELECT * FROM `data` WHERE Pays = '" . $p . "'");
         while ($pays = $result->fetch()) {

            $année[] = $pays["Annee"];
            $datapib[] = $pays["PIB par habitant"];
            $PAYS[] = $pays[$donnée];
         }

         $year = json_encode($année);
         $data1 = json_encode($datapib);
         $data0 = json_encode($PAYS);



         $result->closeCursor();
      } else {
         echo "Veuillez saisir tous les champs.";
      }

      ?>
      <div>
         <canvas id="evolution"></canvas>

      </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


      <script>
      var ctx = document.getElementById('evolution').getContext('2d')
      var evolution = new Chart(ctx, {
         type: '<?php echo $type ?>',
         data: {
            labels: <?php echo $year ?>,
            datasets: [{
               label: "<?php echo "PIB de " . $p . "" ?>",
               data: <?php echo $data1; ?>,
               backgroundColor: '#58508d',
               borderColor: '#58508d',
               tension: 0.4,

               yAxisID: 'y-axis-1'
            }, {
               label: '<?php echo "" . $donnée . " de " . $p . "" ?>',
               data: <?php echo $data0; ?>,
               backgroundColor: '#bc5090',
               borderColor: '#bc5090',
               tension: 0.4,

               yAxisID: 'y-axis-2'
            }]
         },
         options: {
            scales: {
               yAxes: [{
                  id: 'y-axis-1',
                  position: 'right',
                  ticks: {
                     beginAtZero: true
                  }
               }, {
                  id: 'y-axis-2',
                  position: 'left',
                  ticks: {
                     beginAtZero: true
                  }
               }]
            }
         }
      });
      </script>


   </body>

</html>