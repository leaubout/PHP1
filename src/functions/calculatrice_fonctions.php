<?php
/*
 Déclaration de fonctions
 */
function func_plus($x, $y){
    $res = $x + $y;
    return $res;
}

function func_moins($x, $y){
    $res = $x - $y;
    return $res;
}

function func_multiple($x, $y){
    $res = $x * $y;
    return $res;
}

function func_divide($x, $y){
    if($y != 0){
        $res = $x / $y;
        return $res;
    }
    return '&infin;';
}

$tab_op = [
   "plus" => "+",
   "moins" => "-",
   "divide" => "&divide;",
   "multiple" => "x"
];
$resultat = "";
$erreur = "";

//if (isset($_POST) && (! empty($_POST))) {
// on teste s'il y a eu une soumission du formulaire
if (isset($_POST['egal'])&& $_POST['egal'] == 'submit'){
    $operande1 = $_POST['operande1'];
    $operande2 = $_POST['operande2'];
    $operateur = $_POST['operateur'];
    // on vérifie si les opérandes sont bien numériques et si l'opérateur est défini
    if (is_numeric($operande1) and is_numeric($operande2) and array_key_exists($operateur, $tab_op)) {
        $nom_fonction = "func_".$_POST['operateur'];
        if (function_exists($nom_fonction)){
            // appel dynamique de fonctions
            $resultat = $nom_fonction($operande1, $operande2);
        }                
    } else {
        if (!is_numeric($operande1)) {
            $erreur .= "Vous devez saisir un nombre dans le premier opérande.<br>";
        }
        if (!array_key_exists($operateur, $tab_op)) {
            $erreur .= "Vous devez saisir un opérateur parmi ceux proposés.<br>";
        }
        if (!is_numeric($operande2)) {
            $erreur .= "Vous devez saisir un nombre dans le deuxième opérande.<br>";
        }
    }
}

