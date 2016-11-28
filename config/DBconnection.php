<?php

$dsn = 'mysql:host=localhost;dbName=billiards;';
$user = "root";
$password = "";

try {
    $connection = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
