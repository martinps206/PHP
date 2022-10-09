<?php 	
require_once('conexion.php');

$sql = 'select * from contacto';
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
	$conta = 0;
	echo "<table>";
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
	echo "</table>";
}
else{
	echo '<p> No existen registros</p>';
}

$conn->close();
?>