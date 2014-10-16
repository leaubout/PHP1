<?php

    function connect(){
        $dsn = 'mysql:dbname=project;host=localhost';
        $user = 'project';
        $password = '0000';
        
        try{
            // $dbh : connexion
            $dbh = new PDO($dsn, $user, $password);
        }catch (PDOException $e){
            echo 'Connexion échouée : ' . $e->getMessage();
        }     
        return $dbh;
    }
    
    function insert($data){
        // object qui contient la connexion
        $dbh = connect();

        $sql = "INSERT INTO `project`.`users` (`id`, `first_name`, `last_name`, `email`, `password`, `birthdate`, `token`, `status`) ".
            "VALUES (NULL, :first_name, :last_name, ''2014-10-15, '', '2014-10-01', :token, :status)";
        $sth = $dbh->prepare($sql);
        $sth->execute($data);
        // pas de fetchAll car pas de récupération de données de la BD
    }
    
