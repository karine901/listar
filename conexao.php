<?php
$host = 'localhost';
$user = 'root';  
$password = 'root'; 
$dbname = 'usuarios';
 

$conn = new mysqli($host, $user, $password, $dbname);
 

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
 