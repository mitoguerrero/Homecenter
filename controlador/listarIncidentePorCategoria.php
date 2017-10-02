<?php
	$colaborador=$_POST["id_colaborador"];
	$categoria=$_POST["id_categoria"];
	require_once '../modelo/clsIncidencia.php';
	$objIncidencia = new Incidencia();
	$resultado=$objIncidencia->listarIncidenciaPorCategoria($colaborador,$categoria);
	echo json_encode($resultado);
?>