<?php

    require_once('../functions/bdd.php');
    
    
    function create($data){
         
        //'birthdate' =>  "1980-01-01",
        $insertData = [
         'firstname' => $data['first_name'],
         'lastname' => $data['last_name'],
         'email' => $data['email'],
         'password' => $data['password'],
         'token' => md5($data['email']),
         'birthdate' =>  $data['year'] . "-" . $data['month'] . "-" .$data['day'],
         'status' => 1
        ];
        
        $dbh = connectDB();
        // Exécute une requête préparée
        $sql = "INSERT INTO `project`.`users` (`id`, `first_name`, `last_name`, `email`, `password`, `token`, `birthdate`, `status`)
        VALUES (NULL, :firstname, :lastname, :email, :password, :token, :birthdate, :status);'";
        /*$sql = "INSERT INTO `project`.`users` (`id`, `first_name`, `last_name`, `birthdate`, `password`, `token`, `email`, `status`)
        VALUES (NULL, 'first_name', 'last_name', '2014-10-15', 'password', '564f56z1d86fg49sdrt49sr42', 'email', '0');'";*/
        $sth = $dbh->prepare($sql);
        
        $sth->execute($insertData);
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
         echo $sth->errorInfo()[2];
        }
        //var_dump($dbh->lastInsertId());
    }
     
    function read($data = NULL){ 
              
        $dbh = connectDB();
        // Exécute une requête préparée
        
        if ($data <> NULL){
            $id = $data;
            $sql = "SELECT * FROM `users` WHERE `id` = ?;";        
            $sth = $dbh->prepare($sql);
            $sth->execute($id);
        }else{
            $sql = "SELECT * FROM `users`;";
            $sth = $dbh->prepare($sql);
            $sth->execute();
        }
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
         echo $sth->errorInfo()[2];
        }else{
        return $sth->fetchAll(PDO::FETCH_ASSOC);    
        }
    }
     
    function update($data){
        $dbh = connectDB();
    }

    function delete($id){
        $dbh = connectDB();
        $sql = "DELETE FROM `users` WHERE id = :id";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('id', $id);
        $sth->execute();
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
            return $sth->errorInfo()[2];
        }
        return TRUE;       
    }
    
    /*
    function checkUser($data){
        $err = array();
        if ($data <> NULL){
            $bool = FALSE;
            
            $email = $data['email'];
            $password = $data['password'];
            
            $dbh = connectDB();
            $sql = "SELECT * FROM `users` WHERE `email` = ?;";
            
            $sth = $dbh->prepare($sql);
            $bool = $sth->execute(array($email));
            
            // si l'utilisateur existe 
            if($bool){
                $user = $sth->fetchAll(PDO::FETCH_ASSOC);
                $birthdate = $user['birthdate'];
                $pwd_crypte_BD = $user['password']; 
                $pwd_crypte = $password . substr(md5($email), 0, 5);
                $pwd_crypte = md5($pwd_crypte);
                if ($pwd_crypte == $pwd_crypte_BD){
                    return $err;              
                }else{
                    $err['authentification'] = "L'email et/ou le mot de passe de connexion n'existe(nt) ou ne corresponde(nt) pas.";
                }
            }else{
                $err['authentification'] = "L'email et/ou le mot de passe de connexion n'existe(nt) ou ne corresponde(nt) pas.";
            }
            return $err;
        }
        $err['authentification'] = "Les email et mot de passe d'authentification n'ont pas été fournis !";
        return $err;
    }
    */
    
    function findByEmail($email){
        $dbh = connectDB();
        $sql = "SELECT id, email, password FROM `users` WHERE email = :email";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':email', $email);
        $sth->execute();
        
        if ($sth->rowCount() > 1){
            // ERREUR FATALE
        }
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    