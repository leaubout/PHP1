<?php

function separer($tab, $val, &$tab1, &$tab2, &$resultats){
    var_dump($tab);
    $longueur = count($tab);

    $resultats['tests']++;
    if ($longueur % 2 == 0){
        $moitie = $longueur / 2;        
    }else{
        $moitie = ($longueur + 1)/2;
    }
    //array_slice(array,start,length,preserve)
    $tab1 = array_slice($tab, 0, $moitie);
    $tab2 = array_slice($tab, $moitie);
}

function appartenir($tab1, $tab2, $val, &$resultats){
    $der_index = count($tab1) - 1;
    $resultats['tests']++;
    if ($der_index <> 0){   // plus d'un élément par tableau
        $resultats['tests']++;
        if ($val <= $tab1[$der_index]){
            return $tab1;
        }else{
            return $tab2;
        }
    }else{
        $resultats['trouve'] = true;
    }
}


function searchD($tableau, $nb, &$resultats){
    $tableau1 = array();
    $tableau2 = array();
    $tab = array();
    
    while (!$resultats['trouve']){
        $resultats['iterations']++;
        separer($tableau, $nb, $tableau1, $tableau2, $resultats);
        $tab = appartenir($tableau1, $tableau2, $nb, $resultats);
        $bool = $resultats['trouve'];
        $resultats['tests']++;
        if (!$bool){
            searchD($tab, $nb, $resultats);
        }
    }
}

if (isset($_POST['searchD'])&& ($_POST['searchD'] == 'submitD')){

    $tab_res =[
        "iterations" => 0,
        "tests" => 0,       // nb de tests
        "trouve" => false   // nb trouvé ou pas
    ];
    
    $nb_recherche = $_POST['number'];
    searchD($tab, $nb_recherche, $tab_res);

}

?>