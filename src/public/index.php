<?php
session_start();

if (empty($_GET['page'])){
    $pathPage = '../pages/accueil.php';
}else{
    $pathPage = '../pages/' . $_GET['page'] . '.php';
    if (!file_exists($pathPage)){
        http_response_code(404);    // pour que le code http de la page soit bien 404
        $pathPage = '../404.php';
    }
    // pour récupérer la page active et la fournir dans l'attribut action du form
    $active = "?page=" . $_GET['page'];           
}

$erreur = NULL;
if (isset($_SESSION['erreur'])){
    foreach ($_SESSION['erreur'] as $value){
        $erreur .= '<div class="alert alert-danger" role = "alert">' . $value . '</div>';
    }
    unset($_SESSION['erreur']);
}

ob_start();
    require_once $pathPage;
$buffer = ob_get_clean();

require_once '../layout/header.php'; 
// require_once '../layout/menu.php'; 

echo $erreur;
echo $buffer;

require_once '../layout/footer.php';