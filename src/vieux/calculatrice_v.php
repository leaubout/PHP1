<?php 
    require '../../vendor/autoload.php';
    require_once '../functions/calculatrice_fonctions.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calculatrice</title>
    
        <!-- Bootstrap -->
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootflatv2/bootflat/css/bootflat.min.css" rel="stylesheet">
        <style>
            body > div{
            	margin: 20px;
            }
        </style>
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
          <script src="assets/respond/dest/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>     
        <?php
/*  // ancien code pour débugger
                var_dump($_POST);
                var_dump($erreur);
                
                if (isset($_POST) && (!empty($_POST))){  
                    var_dump($tab_op);
                    echo TRUE;
                    if (isset($operande1)){
                        echo "operande1 : $operande1<br>";
                        echo  'is_numeric($operande1) : ' . (is_numeric($operande1)). "<br>";
                    }
                    if (isset($operande2)){
                        echo "operande2 : $operande2<br>";
                        echo 'is_numeric($operande2) : ' ; var_dump(is_numeric($operande2)); echo "<br>";
                    }
                    if (isset($operateur)){
                        echo "operateur : $operateur<br>";
                        echo 'array_key_exists($operateur, $tab_op) : ' . (array_key_exists($operateur, $tab_op)) . "<br>";
                    }
                }
  */                  
        ?>     
        <div class="container">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">Calcul :</label> 
                    <div class="col-sm-10">
                        <label for="operande1">
                            <input id="operande1" name="operande1" type="text">
                        </label>
                        
                        <select name="operateur">
                            <optgroup label="Choix Operateur">
                                <?php
                                    foreach ($tab_op as $cle => $valeur){
                                        echo "<option value='$cle'>$valeur</option>";                       
                                    }
                                ?>                 
                            </optgroup>                
                        </select>
                        
                        <label for="operande2">
                            <input id="operande2" name="operande2" type="text">
                        </label>
                        
                        <button type="submit" name="egal" value="submit">=</button>
                    </div>
                </div>
                <div class="row form-group">                
                    <label class="col-sm-2 control-label">Résultat :</label>
                    <div class="col-sm-10">
                        <input type="text" class="col-sm-10" value="<?php echo $resultat;?>">
                    </div>
                </div>  
                <div class="alert alert-warning" <?php if (empty($erreur)){ echo "hidden"; }?>>
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Attention ! </strong> <?php echo $erreur;?>
                </div>            
            </form>    
        </div>    

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        
    </body>
</html>