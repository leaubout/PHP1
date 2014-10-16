<?php
require '../../vendor/autoload.php';
require_once '../functions/generate_array.php';
require_once '../functions/algo_recherche_brute_force.php';
require_once '../functions/algo_recherche_dichotomique.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recherches</title>

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

        <h1><?php echo 'Recherche !'; ?></h1>

        <form action="" method="POST">
            <input type="text" name="rangeL"> - 
            <input type="text" name="rangeR"><br>
            <br>
            <input type="text" name="number">
            <button type="submit" name="searchFB" value="submitFB">Recherche par force brute</button>
            <button type="submit" name="searchD" value="submitD">Recherche dichotomique</button>
        </form>        
        
        <h2>Recherche par force brute !</h2>
        <p>On dit qu'un algorithme est de recherche par force brute lorsque toutes les entrées sont vérifiées une à une.</p>
        <p>
            <?php 
            if (isset($_POST['searchFB'])&& ($_POST['searchFB'] == 'submitFB')){

                echo "On recherche le nombre " . $_POST['number'] 
                    . " dans l'intervalle de " . $_POST['rangeL']. " à " .$_POST['rangeR'] . " :<br>";
                
                echo "Itération : " . $tab_res['iterations'] ."<br>";

                echo "Nb Test : ". $tab_res['tests'] ."<br>";
            } 
            ?>
        </p>
  
        <h2>Recherche Dichotomique !</h2>
        <p>La dichotomie (« couper en deux » en grec) est, en algorithmique, un processus itératif ou récursif de recherche 
        où, à chaque étape, on coupe en deux parties (pas forcément égales) un espace de recherche qui devient restreint 
        à l'une de ces deux parties..</p>   
          <p>
            <?php 
            if (isset($_POST['searchD'])&& ($_POST['searchD'] == 'submitD')){
                
                echo "On recherche le nombre " . $_POST['number']
                . " dans l'intervalle de " . $_POST['rangeL']. " à " .$_POST['rangeR'] . " :<br>";                
                
                echo "Itération : " . $tab_res['iterations'] ."<br>";
            
                echo "Nb Test : ". $tab_res['tests'] ."<br>";
            } 
            ?>
        </p>      
  
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>