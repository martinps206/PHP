<?php 	
require_once('conexion.php');

$sql = 'select * from contacto';
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista contactos</title>
</head>
<body>
	<h1>Lista de contactos</h1>
	<a href="editar.php">Nuevo</a>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
			if ($result->num_rows > 0) {		
				$conta = 0;
				while ($fila = $result->fetch_array()){
					echo "<tr>";
					echo '<td>' . ++$conta . '</td>';	
					echo '<td>' . $fila['nombre'] . '</td>';
					echo '<td>' . $fila['telefono'] . '</td>';
					echo '<td>' . $fila['correo'] . '</td>';
					echo '<td><a href="editar.php?id='. $fila['id'] . '">Modificar</a></td>'; 
					echo '<td><a href="eliminar.php?id='. $fila['id'] . '" onclick="return confirm(\'Esta seguro\')">Eliminar</a></td>';
					echo "</tr>";
				}	
			}
			else{
				echo '<p> No existen registros</p>';
			}
		?>
	</table>
</body>
</html>
<?php 
$conn->close();
?>