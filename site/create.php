<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

    <link rel="stylesheet" type="text/css" href="site.css" />

    <?php include("baseD.php"); ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><h2>SantÉconomie</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="carte.html">Carte</a>
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
              <?php 
              session_start();

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
                <input class="form-control me-2" name="s" id = "search" type="search" placeholder="Search">
                <input type="submit" name="search" id = "envoyer" value= "search">
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
                
                echo '<li class="nav-item"><a class="nav-link active" id = "logout" href="deconnexion.php">Log out</a></li>';
                
              }
              ?>
              
            </ul> 
            </div>
            </div>
            </nav>

    <h2>Créer un article</h2>

    <p>Sur cette page vous pouvez créer un article à partir des des datasets et des graphiques mis à votre disposition sur notre site.<p>
    <?php 

    if (isset($_SESSION['client'])){

    echo '<form method="post" action="enregistrer.php" >';

    if(!isset($_GET['var1'])){
        echo '<p> Titre : <INPUT class = "sign" type="text" name="titre" value=""></p>';
    }
    elseif(isset($_GET['var1'])){
        echo '<p> Titre : <INPUT class = "sign" type="text" name="titre" value='.$_GET['var1'].'></p>';
    }
    if(!isset($_GET['var2'])){
        echo '<p> Auteur : <INPUT class = "sign" type="text" name="auteur" value=""></p>';
    }
    elseif(isset($_GET['var2'])){
        echo '<p> Auteur : <INPUT class = "sign" type="text" name="auteur" value='.$_GET['var2'].'></p>';
    }
    echo'
        <p>Pays :  <SELECT class = "sign" name="pays">
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
        <OPTION VALUE="Cote d\'Ivoire">Cote d\'Ivoire</OPTION>
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
        </SELECT></p>';
    if(!isset($_GET['var4'])){

        echo '<p> Article : <br/><TEXTAREA  class ="sign" rows="20" cols="170" name="art">
        Ecrivez votre article ici
        </TEXTAREA></p>';
    }
    elseif(isset($_GET['var4'])){
        echo '<p> Article : <br/><TEXTAREA  class ="sign" rows="20" cols="170" name="art">
        '.$_GET['var4'].'
        </TEXTAREA></p>';
    }

    echo '<p><input type="submit"  class = "sign" value="Enregistrer"></p>

    </form>';
    }
    else{
        echo '<p>Veuillez vous connecter afin créer un article</p>';
    }
    ?>

    <a href="index.php" class="btn btn-secondary">Back Home</a>

</body>
</html>