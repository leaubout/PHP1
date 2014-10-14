<?php

    /*
    if (isset($_POST['signup'])){
        $bool = TRUE;
        $bool = checkUser($_POST);
        
    }
    */
    
    function init($data){
        if (checkForm($data, $err)){
            if (checkUser($data, $err)){
                //sessionSave($data);
            }
        }
    }
    
    function checkForm($data, &$err){
        if (isset($data['email']) && isset($data['password'])){
            return TRUE;
        }else{
            $err['requiredEmpty'] = "Champs de saisie vide.";
            return FALSE;
        }
    }
    
    function checkUser($data, &$err){
        
        require_once '../bdd/users.php';
        require_once '../functions/password.php';
        
        $result = findByEmail($data['email']);
        $pass = generatePassword($data['password'], $data['email']);
        
        if($pass == $result['password']){
            sessionSave($result);
            return TRUE;
        }
        $err['invalidPassword'] = 'Identifiant et/ou Mot de passe incorrect(s) !!';
        return FALSE;
    }
    /**
     * Sauvegarde de la session
     */
    function sessionSave($data){
        unset($data['password']);
        $_SESSION['auth'] = $data;       
    }
    
    if (!empty($_POST) && isset($_POST['login'])){
        init($_POST);
    }