<?php

define('DB_HOST', 'localhost');
define('DB_USER', "root");
define('DB_PASS', "Chicho@g4ug4u");
define('DB_NAME', 'eat');

$conn = null;
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Fail: " . $e->getMessage();
}


