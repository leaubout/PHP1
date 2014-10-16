<?php

    require_once('../bdd/users.php');
/*
    $id = $_GET['id'];
    
    echo $id;
    $res = delete($id);
    //echo "Resultat : " . $res;
    $chemin = "http://www.project.dev/list.php?id=" . $id;
    header('Location: ' . $chemin);
    */
    
    /*correction*/

    if(!empty($_GET) && isset($_GET['id'])){
        $id = (int) $_GET['id'];
        if (delete($id) != TRUE){
            echo "Suppression invalide";
        }
    }
    header('Location:/list.php');
 
 
