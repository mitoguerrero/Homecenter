<?php
	$colaborador=$_POST["id_colaborador"];
	$tipo=$_POST["id_tipo"];
	require_once '../modelo/clsIncidencia.php';
	$objIncidencia = new Incidencia();
	$resultado=$objIncidencia->listarIncidenciaPorTipo($colaborador,$tipo);
	echo json_encode($resultado);
?>