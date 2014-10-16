<?php 
    require '../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet PHP1</title>

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
    <div class="container">
        <h1><?php echo 'Hello, world!'; ?></h1>
        <?php
            var_dump($_REQUEST);
            var_dump($_GET);
            var_dump($_POST);
        ?>
        
        <form action="" method="post">
            <!--  
            <fieldset>
                <legend>L�gende !</legend>
                <input type="text"> 
            </fieldset>
            -->
            <div class="form-group">
            <label for="name">
                Name : <input id="name" name="name" class="form-control" type="text">
            </label>
            </div>
            <div class="form-group">
            <label for="password">
                Password : <input id="password" name="password" class="form-control" type="password">
            </label>
            </div>
            Sexe : 
            <label class="radio-inline" for="s_homme">
                Homme <input id="s_homme" type="radio" name="sexe">
            </label>
            <label class="radio-inline" for="s_femme">
                Femme <input id="s_femme" type="radio" name="sexe">
            </label>
            <br><br>
            <div class="checkbox">
                <label>
                    QI : <input id="checkQI" type="checkbox" name="test">
                </label>
            </div>
            <div class="checkbox">
                <label>
                    Logique : <input id="checkLog" type="checkbox" name="test">
                </label>                
            </div>
            
            <select name="diplome">
                <optgroup label="Niveau 1">
                    <option value="BAC4">BAC + 4</option>
                    <option value="BAC5">BAC + 5</option>
                </optgroup>
                <optgroup label="Niveau 2">
                    <option>BAC + 3</option>
                    <option>BAC + 2</option>
                </optgroup>                
            </select>
            <select name="voiture" multiple>
                <option>Fiat</option>
                <option>Peugeot</option>
                <option>Lada</option>
                <option>Renault</option>
                <option>Toyota</option>
            </select>
            
            
            <button type="submit">Sign in</button>
            
            <input type="submit" name="save" value="Sauvegarder">
            <input type="reset" value="Suppression">
            
            <textarea rows="5" cols="5"></textarea>
        </form>        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>