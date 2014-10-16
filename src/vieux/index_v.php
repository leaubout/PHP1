<?php
session_start();

require_once '../layout/header.php';

if (isset($_GET['page'])){
    $page = $_GET['page'];
    switch $
    
    require_once $_GET['page']. "_body";
}

ob_start();
require_once $pathPage

require_once '../layout/footer.php';

?>