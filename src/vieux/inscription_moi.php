<?php 
    require '../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Page d'inscription</title>
    
        <!-- Bootstrap -->
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootflatv2/bootflat/css/bootflat.min.css" rel="stylesheet">
        <style>
            body > div.container {
            	width: 40%;
            	background-color : #99CC99;
            	margin: 20px 30%;
            }
            
            form{
            	margin: 20px;
            }
            
            form div.
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
          <script src="assets/respond/dest/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h1>Inscription</h1>
            <form action="" method="post" role="form">
                <div class="form-group">
                    <label for="nom">
                        Nom : <input id="nom" name="nom" class="form-control" type="text">
                    </label>
                </div>
                <div class="form-group">
                    <label for="prenom">
                        Prénom : <input id="prenom" name="prenom" class="form-control" type="text">
                    </label>            
                </div>
                <div class="form-group">
                    <label for="mdp1">
                        Mot de passe : <input id="mdp1" name="mdp2" class="form-control" type="password">
                    </label>
                </div>
                <div class="form-group">
                    <label for="mdp2">
                        Saisissez à nouveau votre mot de passe : <input id="mdp1" name="mdp2" class="form-control" type="password">
                    </label>
                </div>
                <div class="form-group">
                    <label for="mail">
                        Email : <input id="email" name="email" class="form-control" type="text">
                    </label>
                </div>
                <div class="form-group">
                    <select name="jour">
                    <?php
                        for ($i=1; $i<=31; $i++){
                            echo "<option>$i</option>";
                        } 
                    ?>
                    </select>
                    <select name="mois">
                    <?php
                        $tab_mois = [
                            'janvier', 
                            'février', 
                            'mars', 
                            'avril', 
                            'mai', 
                            'juin', 
                            'juillet', 
                            'août', 
                            'septembre',
                            'octobre',
                            'novembre',
                            'décembre'
                        ];
                        foreach($tab_mois AS $mois){
                            echo "<option>$mois</option>";
                        }
                    ?>
                    </select>
                    <select name="annee">
                    <?php
                        $annee_courante = date('Y');
                        $annee_debut = $annee_courante - 120;
                        $annee_fin = $annee_courante - 18;
                        for($i = $annee_fin; $i > $annee_debut; $i--){
                            echo "<option>$i</option>";
                        } 
                    ?>
                    </select>
                </div><br>
                <div class="form-group">
                    <button type="submit" name="save" value="submit">S'inscrire</button>
                    <button type="reset" name="save" value="submit">Remettre à zéro</button>
                </div>
            </form>
        </div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>