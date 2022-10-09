<?php 
require_once('conexion.php');

$id = '';
$nombre = '';
$telefono = '';
$correo = '';

if ( isset($_GET["id"]) ) {
	$sql = "select * from contacto where id = " . $_GET['id'];
	$result = $conn->query($sql);
	$fila = $result->fetch_array();

	$id = $fila['id'];
	$nombre = $fila['nombre'];
	$telefono = $fila['telefono'];
	$correo = $fila['correo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar contacto</title>
</head>
<body>
<h3><?php echo ($id>0) ? 'Modificar ':'Nuevo '; ?> registro</h3>
<form action="procesa.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>" >
	<label>Nombre</label>
	<input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
	<label>Telefono</label>
	<input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
	<label>Correo</label>
	<input type="text" name="correo" value="<?php echo $correo; ?>"><br>
	<input type="submit" value="Enviar">
</form>
</body>
</html>
<?php $conn->close(); ?>