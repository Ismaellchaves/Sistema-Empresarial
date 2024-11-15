<?php
$server = 'localhost';
$user = 'root';
$password = '';  // Sem senha
$database = 'empresa';

$connection = new mysqli($server, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
