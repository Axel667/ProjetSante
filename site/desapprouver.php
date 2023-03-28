<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>désapprouver</title>
</head>
<body>
    <?php

        include("baseD.php");

        function désapprouver($ap){
            
            $bdd = getBD();

            $upd = $bdd -> prepare("UPDATE sourcer SET approuve = 0 WHERE `sourcer`.`id_article` = $ap");

            $update = $upd ->execute();
            
        }

        if (isset($_GET['id_article'])  and !empty($_GET['id_article'])){
            désapprouver($_GET['id_article']);
            echo '<meta http-equiv="refresh" content="0;url=article.php?id_article='.$_GET['id_article'].'">';
        }
        
    ?>
    
</body>
</html>