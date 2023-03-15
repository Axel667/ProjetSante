<?php

    function getBD(){
        
    $bdd = new PDO('mysql:host=localhost;dbname=santeco;charset=utf8',
    'root', '');

    return $bdd;
}