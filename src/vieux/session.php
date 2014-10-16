<?php

session_start();
$_SESSION['test'] = 1;
$_SESSION['auth'] = TRUE;
$_SESSION['string'] = "chaine";
$_SESSION['tableau'] = array('key1' => 'valeur1');

phpinfo();