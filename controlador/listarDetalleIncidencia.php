<?php
	$colaborador=$_POST["idcolaborador"];
	$categoria=$_POST["idcategoria"];
	require_once '../modelo/clsIncidencia.php';
	$objIncidencia = new Incidencia();
	$resultado=$objIncidencia->listarIncidenciaDetalle($categoria,$colaborador);
	echo json_encode($resultado);
?>