    	<?php
    	   require '../functions/auth.php';
    	   $title = "Login";    	    
    	?>
        <?php 
            if (isset($_SESSION['auth'])){
                $_SESSION['erreur'][] = "Vous êtes déjà authentifié !";
                header("Location:/");
            }
         
        ?>
        <div class="container">
    		<form class="form-horizontal" action="<?= $active; ?>" method="POST">
    		<!--  fonctionne avec action vide aussi -->
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
