<?php
	require_once '../modelo/clsArea.php';
	$objArea = new Area();
	$resultado=$objArea->cargarArea();
	echo json_encode($resultado);
?>