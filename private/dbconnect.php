<?php
  $servername = "localhost";
  $username = "digidate";
  $password = "qwerty";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=digidate", $username, $password);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }
?>