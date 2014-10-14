<?php
function T($key){
  $tableTranslate = [
      'id' => 'Identifiant',
      'first_name' => 'Prénom',
      'last_name' => 'Nom',
      'password' => 'Mot de passe',
      'email' => 'Email',
      'birthdate' => 'Date de naissance',
      'token' => 'Jeton',
      'status' => 'Status'
  ];
  return $tableTranslate[$key];
}