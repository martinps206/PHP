<?php 
require_once('conexion.php');

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

if (!$_POST['id']){
	$sql = "insert contacto (nombre,telefono,correo) values ('$nombre','$telefono','$correo')";
}
else {
	$sql = "update contacto set nombre = '$nombre', telefono = '$telefono', correo='$correo' where id = " .$_POST['id'];
}

$result = $conn->query($sql);

if (!$result) die('Error en insercion de datos');

$conn->close();

header('Location: index.php');

?>