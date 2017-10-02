<?php
	require_once '../modelo/clsTipo.php';
	$objTipo= new Tipo();
	$resultado=$objTipo->cargarTipo();
	echo json_encode($resultado);
?>