<?php
require '../../vendor/autoload.php';
require_once '../functions/generate_random_array.php';

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tris</title>

        <!-- Bootstrap -->
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootflatv2/bootflat/css/bootflat.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
        <script src="assets/respond/dest/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <h1>Tri</h1>

        <form action="" method="POST">
            <input type="text" name="rangeL"> - 
            <input type="text" name="rangeR"><br>
            <br>
            <input type="text" name="number">
            <button type="submit" name="searchFB" value="submitFB">Recherche par force brute</button>
            <button type="submit" name="searchD" value="submitD">Recherche dichotomique</button>
        </form>        
        
        <h2>Tri à bulles</h2>
        <p></p>
        <p>
            <?php 
            ?>
        </p>
  
        <h2>Tri rapide</h2>
        <p></p>   
        <p>
            <?php 
         
            ?>
        </p>      
  
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>