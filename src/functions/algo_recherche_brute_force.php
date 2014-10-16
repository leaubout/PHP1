<?php

function searchFB($tableau, $nb){
    
    $resultats =[
        "iterations" => 0,  // nb d'itérations
        "tests" => 0,       // nb de tests
        "trouve" => false   // nb trouvé ou pas
    ];
    
    foreach ($tableau AS $valeur){
        $resultats['iterations']++;
        $resultats['tests']++;
        if ($valeur == $nb){
            $resultats['trouve'] = true;
            return $resultats;
        }
    }
    return $resultats;
}

if (isset($_POST['searchFB'])&& ($_POST['searchFB'] == 'submitFB')){
    $nb_recherche = $_POST['number'];
    $tab_res = searchFB($tab, $nb_recherche);
}

?>