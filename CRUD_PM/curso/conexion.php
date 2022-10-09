<?php
	
	$mysqli = new mysqli('localhost', 'root', 'mysql', 'datospersona');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>