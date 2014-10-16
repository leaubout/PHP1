<?php session_start(); ?>
<!DOCTYPE html>
<?php 
// require '../../vendor/autoload.php';
require '../functions/auth.php';
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formulaire d'authentification</title>

<!-- Bootstrap -->
<link href="assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="assets/bootflatv2/bootflat/css/bootflat.min.css"
	rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
      <script src="assets/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
	<?php
	    //Initialisation du tableau d'erreur
    	//$err = array();


	?>
		<form class="form-horizontal" action="" method="POST">
			<fieldset>

				<!-- Form Name -->
				<legend>Authentification</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Nom</label>
					<div class="col-md-4">
						<input id="email" name="email" type="text" placeholder="Entrez votre email"
							class="form-control input-md" value="">
					</div>
				</div>

				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="password">Mot de passe</label>
					<div class="col-md-4">
						<input id="password" name="password" type="password"
							placeholder="Saisissez votre mot de passe" class="form-control input-md">
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<input type="reset" class="btn btn-danger">
					    <button id="login" type="submit" name="login" class="btn btn-primary">S'authentifier</button>
					</div>
				</div>

			</fieldset>
		</form>


	</div>
</body>
</html>
