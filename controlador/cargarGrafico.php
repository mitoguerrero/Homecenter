<?php
	$colaborador=$_POST["id_colaborador"];
	$periodo=$_POST["id_periodo"];
	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$resultado=$objEjecutarEvaluacion->listarGrafico($colaborador,$periodo);
	echo json_encode($resultado);
?>