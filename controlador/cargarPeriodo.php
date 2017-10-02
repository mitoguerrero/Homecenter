<?php
	require_once '../modelo/clsPeriodo.php';
	$objPeriodo = new Periodo();
	$resultado=$objPeriodo->cargarPeriodo();
	echo json_encode($resultado);
?>