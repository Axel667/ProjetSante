<?php

function getBD()
{
    $host = 'database-1.ckmwomwn8pbh.eu-west-3.rds.amazonaws.com';
    $dbname = 'SantEco';
    $username = 'admin';
    $password = 'santeconomie';

    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

    try {
        $bdd = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $bdd;
}
