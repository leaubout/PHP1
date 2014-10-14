<?php

    function generatePassword($password, $salt){
        
        $passwordCrypt = md5($password . substr(md5($salt), 0, 5));
        return $passwordCrypt;
    }