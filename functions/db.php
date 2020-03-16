<?php

function dbConnect(): PDO
{
  try {
    $pdo = new PDO(
      "mysql:host=localhost;dbname=greg",
      "root",
      ""
    );
    return $pdo;
  } catch(PDOException $ex) {
    exit("Erreur lors de la connexion à la base de données.");
  }
}
