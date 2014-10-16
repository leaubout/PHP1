<?php
require_once '../bdd/users.php';
require_once '../functions/translate.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Affichage des utilisateurs</title>

<!-- Bootstrap -->
<link href="assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="assets/bootflatv2/bootflat/css/bootflat.min.css"
	rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css"
	href="assets/dataTables/media/css/jquery.dataTables.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
      <script src="assets/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php
        /* MOCK : 
        $users = array(
            0 => array('first_name' => '', 'last_name' => '', 'email' => '','birthdate' => ''),
        );
        */
        $users = array();
        // $users contient le jeu d'enregistrement renvoyé par l'exécution de ma requête SELECT
        $users = read();
        //"SELECT`first_name`,`last_name`,`email`,`birthdate`,`token`,`status`
    ?>
    <div class="container">
      
        <h1>Liste d'utilisateurs</h1>
        <?php         
            if (empty($users)){
                echo "<h2>Tableau de données vide !!</h2>";
            }else{
        ?>            
        <table id="table_id" class="display">
        	<thead>
        	   <tr>
                <?php         	
                    $columns = array_keys($users[0]); 
                    foreach($columns as $column){   ?>
                        <th><?= T($column);?></th>
                <?php }?>                
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
        	</thead>
        	<tfoot>
        	</tfoot>
        	<tbody>
                <?php foreach($users as $user){?>
                <tr>
                <?php foreach($user as $champ => $valeur){?>
                    <td><?= $user[$champ];?></td>    
                                            
                <?php }?>
                    <td><button><a href="delete.php?id=<?= $user['id'];?>">Supprimer</a></button></td>
                    <td><button><a href="update.php?id=<?= $user['id'];?>">Mettre à jour</a></button></td>
                </tr>
                <?php }?>
        	</tbody>
        </table>
<?php   }?>      
	</div>

	<!-- jQuery -->
	<script type="text/javascript" charset="utf8"
		src="assets/dataTables/media/js/jquery.js"></script>
	<!-- <script type="text/javascript" charset="utf8" src="assets/jquery/dist/jquery.min.js"></script>OU -->
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8"
		src="assets/dataTables/media/js/jquery.dataTables.js"></script>
	<script>
        $(document).ready(function(){
            $('#table_id').DataTable();
        });
    </script>

</body>
</html>

