<?php
    function connectDB(){
        $dsn = 'mysql:host=127.0.0.1;dbname=project';
        $user = 'project';
        $password = '0000';
       
        try {   //dbh data base host
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        
        return $dbh;
    }


    function cleanPOST(array $data){
        $dataClean = array();
        foreach($data as $key => $value){
            $keyClean = htmlentities(strip_tags($key)); 
            $valueClean = htmlentities(strip_tags($value));
            $dataClean[$keyClean] = $valueClean;
        }
        return $dataClean;
    }

  
    
    
    
    