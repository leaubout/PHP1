<?php
    //require_once '../functions/checkForm.php';
    require_once '../bdd/articles.php';
    
    $title = "Rédaction d'un article";
    
?>

            <div class="container">
            	<?php
                    if (isset($_POST['signup'])){
                        create($_POST);                    
                    }
            	
/*            	    //Initialisation du tableau d'erreur
                	$err = array();
                    if(isset($_POST['signup'])){
                        $err = checkForm($_POST);
                        if(empty($err)){
                            // je stocke les variables fournies par POST dans une autre variable car je n'ai pas le droit de
                            $data = $_POST;
                            require_once '../functions/password.php';
                            $data['password'] = generatePassword($data['password'], $data['email']);
                            create($data);
                        }
                    }           */
            	?>
                <form class="form-horizontal" action="" method="POST">
                	<fieldset>
                
                		<!-- Form Name -->
                		<legend>Rédaction d'un article</legend>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="titre">Titre</label>
                			<div class="col-md-4">
                				<input id="titre" name="titre" type="text" placeholder="Ecrivez votre titre"
                					class="form-control input-md" value="">
                               <?php /*if(isset($err['last_name'])) {?>
                                    <span class="help-block"><?php echo $err['last_name'];?></span>
                                <?php }*/?>  
                			</div>
                		</div>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="slug">Slug</label>
                			<div class="col-md-4">
                				<input id="slug" name="slug" type="text" placeholder="Saisissez le slug de l'article"
                					class="form-control input-md">
                                <?php /*if(isset($err['email'])) {?>
                                    <span class="help-block"><?php echo $err['email'];?></span>
                                <?php }*/?>  
                			</div>
                		</div>
                
                		<!-- Textarea-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="contenu">Contenu de l'article</label>
                			<div class="col-md-4">
                				<textarea id="contenu" name="contenu" class="form-control" placeholder="Ecrivez votre article" rows="20">
                                </textarea>
                                <?php /* if(isset($err['reemail'])) {?>
                                    <span class="help-block"><?php echo $err['reemail'];?></span>
                                <?php } */?>  
                			</div>
                		</div>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="keywords">Mots-clefs</label>
                			<div class="col-md-4">
                				<input id="keywords" name="keywords" type="text"
                					placeholder="Entrez vos mots clefs séparés par des virgules" class="form-control input-md">
                                <?php /*if(isset($err['password'])) {?>
                                    <div class="help-block">
                                        <ul>
                                        <?php foreach ($err['password'] as $errMessage){
                                            echo '<li>' . $errMessage . '</li>';   
                                         }?>
                                        </ul>
                                   </div>
                                <?php }*/?>  
                			</div>
                		</div>
                
                		<!-- Button -->
                			<div class="form-group">
                				<div class="col-md-4 col-md-offset-4">
                					<input type="reset" class="btn btn-danger">
                				    <button id="signup" type="submit" name="signup" class="btn btn-primary">Poster</button>
                				</div>
                			</div>
                
                		</fieldset>
                	</form>                
                </div>
