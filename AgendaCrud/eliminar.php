<?php 
require_once('conexion.php');

if ($_GET['id']){
	$sql = "delete from contacto where id = " .$_GET['id'];
}

$result = $conn->query($sql);

if (!$result) die('Error en eliminación de datos');

header('Location: index.php');
?>