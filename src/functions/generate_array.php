<?php
// on construit un tableau entre deux bornes entières avec un pas de un.
function generate_array($debut, $fin){
    $tab = array();
    $nb = $fin - $debut;
    for($i=0 ; $i <= $nb ;$i++){
        $tab[$i] = $debut + $i;
    }
    return $tab;
}

if ( (isset($_POST['searchFB'])&& ($_POST['searchFB'] == 'submitFB'))
     OR (isset($_POST['searchD'])&& ($_POST['searchD'] == 'submitD')) ){
    // valeur de début de notre tableau
    $nb_debut = $_POST['rangeL'];
    // valeur de fin de notre tableau
    $nb_fin = $_POST['rangeR'];
    
    $tab = generate_array($nb_debut,$nb_fin);
}

?>