<?php

function conectar(){
    $host_name = 'db-pdo-notas';
    $database = 'proba';
    $user_name = 'usuario';
    $password = 'abc123.';
    $pdo = null;
  try {
    $pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    return $pdo;

  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
}
?>