<?php

    require_once('../functions/bdd.php');
    
    
    function create($data){
         
        $insertData = [
         'titre' => $data['titre'],
         'slug' => $data['slug'],
         'contenu' => $data['contenu'],
         'keywords' => $data['keywords'],
         'user_id' => $_SESSION['auth']['id']   
        ];
        
        $dbh = connectDB();
        // Exécute une requête préparée
        $sql = "INSERT INTO `articles` (`id`, `titre`, `slug`, `contenu`, `keywords`, `user_id`, `created_date`, `update_date`) "
            . "VALUES (NULL, :titre, :slug, :contenu, :keywords, :user_id, :created_date, :update_date);";        
        
        $sth = $dbh->prepare($sql);
        
        $dateheure = date('Y-m-d H:i:s');  // format : '2014-10-15 10:26:08'
        $insertData['created_date'] = $dateheure;
        $insertData['update_date'] = $dateheure;
        
        $sth->execute($insertData);
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
            return $sth->errorInfo()[2];
        }
        return TRUE;
        //var_dump($dbh->lastInsertId());
    }
     
    function read($id){ 
              
        $dbh = connectDB();
        // Exécute une requête préparée
        
        if ($data <> NULL){
            $id = $data;
            $sql = "SELECT * FROM `articles` WHERE `id` = ?;";        
            $sth = $dbh->prepare($sql);
            $sth->execute($id);
        }else{
            $sql = "SELECT * FROM `articles`;";
            $sth = $dbh->prepare($sql);
            $sth->execute();
        }
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
            return $sth->errorInfo()[2];
        }else{
            return $sth->fetchAll(PDO::FETCH_ASSOC);    
        }
    }

    function readByTitle($inputSearch){
        
        $dbh = connectDB();
        
        /* SELECT * FROM  `articles`WHERE  `titre` LIKE  'sd%'; */
        $sql = "SELECT id, titre, slug FROM `articles` WHERE `titre` LIKE :input;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array('input' => $inputSearch.'%'));
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($sth->rowCount() == 0){
            return FALSE;
        }
        return $result; 

    }    
    
    
    function update($data){
        $dbh = connectDB();
    }

    function delete($id){
        $dbh = connectDB();
        $sql = "DELETE FROM `articles` WHERE id = :id";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('id', $id);
        $sth->execute();
        if ($sth->errorCode()!== '00000' && $sth->errorCode() !== NULL){
            return $sth->errorInfo()[2];
        }
        return TRUE;       
    }
 