<?php
	$periodo=$_POST["id_periodo"];
	require_once '../modelo/clsEvaluacion.php';
	$objEvaluacion = new Evaluacion();
	$resultado=$objEvaluacion->cargarEvaluacionPeriodo($periodo);
	echo json_encode($resultado);
?>