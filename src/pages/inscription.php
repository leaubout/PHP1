<?php
    require_once '../functions/checkForm.php';
    require_once '../bdd/users.php';
    
    $title = "Inscription";
?>

            <div class="container">
            	<?php
            	    //Initialisation du tableau d'erreur
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
                    }
            	?>
                <form class="form-horizontal" action="" method="POST">
                	<fieldset>
                
                		<!-- Form Name -->
                		<legend>Inscription</legend>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="last_name">Nom</label>
                			<div class="col-md-4">
                				<input id="last_name" name="last_name" type="text" placeholder=""
                					class="form-control input-md" value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name'];}?>">
                                <?php if(isset($err['last_name'])) {?>
                                    <span class="help-block"><?php echo $err['last_name'];?></span>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="first_name">Prénom</label>
                			<div class="col-md-4">
                				<input id="first_name" name="first_name" type="text"
                					placeholder="" class="form-control input-md">
                                <?php if(isset($err['first_name'])) {?>
                                    <span class="help-block"><?php echo $err['first_name'];?></span>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="email">Email</label>
                			<div class="col-md-4">
                				<input id="email" name="email" type="text" placeholder=""
                					class="form-control input-md">
                                <?php if(isset($err['email'])) {?>
                                    <span class="help-block"><?php echo $err['email'];?></span>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Text input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="reemail"></label>
                			<div class="col-md-4">
                				<input id="reemail" name="reemail" type="text"
                					placeholder="Votre email" class="form-control input-md">
                                <?php if(isset($err['reemail'])) {?>
                                    <span class="help-block"><?php echo $err['reemail'];?></span>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Password input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="password">Mot de passe</label>
                			<div class="col-md-4">
                				<input id="password" name="password" type="password"
                					placeholder="" class="form-control input-md">
                                <?php if(isset($err['password'])) {?>
                                    <div class="help-block">
                                        <ul>
                                        <?php foreach ($err['password'] as $errMessage){
                                            echo '<li>' . $errMessage . '</li>';   
                                         }?>
                                        </ul>
                                   </div>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Password input-->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="repassword"></label>
                			<div class="col-md-4">
                				<input id="repassword" name="repassword" type="password"
                					placeholder="Votre mot de passe" class="form-control input-md">
                                <?php if(isset($err['repassword'])) {?>
                                    <span class="help-block"><?php echo $err['repassword'];?></span>
                                <?php }?>  
                			</div>
                		</div>
                
                		<!-- Select Basic -->
                		<div class="form-group">
                			<label class="col-md-4 control-label" for="selectbasic">Date de naissance</label>
                			<div class="col-md-1">
                				<select id="day" name="day" class="form-control">
                					<?php 
                					$i = 1;
                					for (;$i <= 31;$i++){
                					   echo "<option value=\"$i\">$i</option>";
                					}?>
                				</select>
                			</div>
                			<div class="col-md-2">
                				<select id="month" name="month" class="form-control">
                					<?php $i = 1;
                					for(;$i <= 12;){
                					    echo "<option value=\"$i\">$i</option>";
                					    $i++;
                					}
                					?>
                				</select>
                			</div>
                			<div class="col-md-1">
                				<select id="year" name="year" class="form-control">
                					<?php 
                					    $i = 1996;
                						for(;;){
                						    if($i >= 1914){
                						        echo "<option value=\"$i\">$i</option>";
                						        $i--;
                						    } else {
                						        break;
                						    }
                						}
                					?>
                				</select>
                			</div>
                		</div>
                
                		<!-- Button -->
                			<div class="form-group">
                				<div class="col-md-4 col-md-offset-4">
                					<input type="reset" class="btn btn-danger">
                				    <button id="signup" type="submit" name="signup" class="btn btn-primary">S'inscrire</button>
                				</div>
                			</div>
                
                		</fieldset>
                	</form>                
                </div>