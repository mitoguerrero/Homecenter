<?php
	$colaborador=$_POST["idcolaborador"];
	require_once '../modelo/clsIncidencia.php';
	$objIncidencia = new Incidencia();
	$resultado=$objIncidencia->listar($colaborador);
	echo json_encode($resultado);
?>