<?php

function generateArray($debut, $fin){
        $array = array();
        for($i = $debut ; $i < $fin; $i++){
            $array[$i] = $i;
            // crée des valeurs de tableaux avec des clés égales aux valeurs
        }
        return $array;
}

$iterateDichotomie = 0;
$timerDicho = 0;

if (isset($_POST['search']) && ($_POST['search'] == 'submit')){

    // déclarations
    $debut = $_POST['rangeL'];
    $fin = $_POST['rangeR'];
    $val = $_POST['number'];

    $t = generateArray($debut, $fin);  
    // je n'utilise pas la fonction que j'ai créée moi car la sienne est mieux faite.
    $trouve = FALSE; 
    
    // do while car le test s'éxecute dans la boucle : on veut le faire au moins une fois
    do {
        $iterateDichotomie++;
        $timerStart = microtime();
        $mil = floor(($debut+ $fin)/2); // floor prend la partie entière
        if ($t[$mil] = $val){
            $trouve = TRUE;
        }elseif ($val > $t[$mil]){
            $debut = ++$mil;
        }else{
            $debut = --$mil;
        }
    }while($trouve == FALSE && $debut <= $fin);
    $timerEnd = microtime();
    $timerDicho = $timerEnd - $timerStart;
}