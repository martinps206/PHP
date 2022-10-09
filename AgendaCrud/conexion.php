<?php 
$host = 'localhost';
$user = 'root';
$pass = 'mysql';
$bdat = 'agedadb';

// Crear una instacia de msqli
$conn = new mysqli($host, $user, $pass, $bdat);

if ($conn->connect_error > 0){
	die('Error de conexion [' . $conn->connect_error.']');
}
?>