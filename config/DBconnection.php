<?php

$config = require 'credentials.php';

try {
    $connection = new PDO("mysql:host=".$config['db']['servername']. ";dbname=" . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}