<?php

    function getBD(){
        
    $bdd = new PDO('mysql:host=localhost;dbname=SantECO;charset=utf8',
    'root', '');

    return $bdd;
}