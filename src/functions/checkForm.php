<?php

function checkForm($data){
    $err = array();
    $required = array('last_name', 'first_name', 'email', 'reemail', 'password', 'repassword');
    $errRequired = checkRequired($data, $required);
    $errEmail = checkEmail($data['email']);
    $errPassword = checkPassword($data['password']);
    
    if(! checkIdenticate($data['password'], $data['repassword'])){
        $err['repassword'] = "Mot de passe non identique";
    }
    
    if(! checkIdenticate($data['email'], $data['reemail'])){
        $err['reemail'] = "Email non identique";
    }
    
    $errDate = checkFormDate($data['day'], $data['month'], $data['year']);
    $err = array_merge($err, $errRequired, $errEmail, $errPassword, $errDate);
    
    return $err;
}
/**
 * Fonction qui check les élements requis par le formulaire
 * avec les données.
 *
 * @param array $data
 * @param array $required
 * @return array
 */
function checkRequired($data, $required)
{
    $err = array();
    foreach ($required as $inputName) {
        // Condition qui verifie si la variable
        // $_POST à l'index last_name est vide
        // Si TRUE alors Ajout dand le tableau d'erreur
        // à l'index last_name le message d'erreur.
        if (empty($data[$inputName])) {
            $err[$inputName] = "Champ de saisie requis";
        }
    }
    return $err;
}

/**
 * Fonction qui valide un email
 *
 * @param string $email            
 */
function checkEmail($email)
{
    $err = array();
    $valid = FALSE;
    // Transformation de l'email en Minuscule
    $email = strtolower($email);
    // Vérif des caractère autorisé dans l'email
    if (preg_match("#^[a-z0-9._@-]*$#", $email)) {
        $explodeEmail = explode("@", $email);
        // Vérif que l'email n'a qu'un @
        if (count($explodeEmail) == 2) {
            $name = $explodeEmail[0];
            $domain = $explodeEmail[1];
            // Vérif de la taille de name
            if (strlen($name) > 2) {
                $explodeDomain = explode(".", $domain);
                // Vérif du domain
                if (count($explodeDomain) == 2 && strlen($explodeDomain[0]) > 2 && strlen($explodeDomain[1]) >= 2) {
                    $valid = TRUE;
                }
            }
        }
    }
    if (! $valid) {
        $err['email'] = "Email invalide";
    }
    return $err;
}

function checkPassword($password)
{
    $err = array();
    if (strlen($password) < 8) {
        $err['password'][] = "Password trop court";
    }
    if (strpbrk($password, "@-#|$^%") === FALSE) {
        $err['password'][] = "Votre password doit contenir au moins '@-#|$^%'";
    }
    
    $charLower = FALSE;
    $charUpper = FALSE;
    $charNumeric = FALSE;
    
    for ($i = 0; $i < strlen($password); $i ++) {
        $char = $password[$i];
        if ($char >= 'a' && $char <= 'z') {
            $charLower = TRUE;
            continue;
        }
        if ($char >= 'A' && $char <= 'Z') {
            $charUpper = TRUE;
            continue;
        }
        if ($char >= '0' && $char <= '9') {
            $charNumeric = TRUE;
        }
    }
    
    if (! ($charLower && $charUpper && $charNumeric)) {
        $err['password'][] = "Votre password doit contenir au moins une minuscule et une majucule et un chiffre";
    }
    return $err;
}

function checkIdenticate($original, $copie)
{
    if ($original !== $copie) {
        return FALSE;
    }
    return TRUE;
}

function checkFormDate($day, $month, $year)
{
    $err = array();
//     if ($day > 28) {
//         $nbr = date('t', mktime(0, 0, 0, $month, 1, $year));
//         if ($day > $nbr) {
//             $err['date'] = "Erreur de date";
//         }
//     }

    if(! (is_numeric($month) && 
        is_numeric($day) &&
        is_numeric($year))) {
        $err['date'] = "Uniquement des numériques";
    } else {
        $day = str_pad($day, 2, 0, STR_PAD_LEFT);
        $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        if (checkdate($month, $day, $year)) {
            $birthdate = $year . $month . $day;
            $time = date("Ymd");
            if ($time - $birthdate < 180000) {
                $err['date'] = "Mineur interdit";
            }
        } else {
            $err['date'] = "Date invalide";
        }
    }
   
    return $err;
}



