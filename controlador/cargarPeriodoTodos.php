<?php
	require_once '../modelo/clsPeriodo.php';
	$objPeriodo = new Periodo();
	$resultado=$objPeriodo->cargarPeriodoTodos();
	echo json_encode($resultado);
?>