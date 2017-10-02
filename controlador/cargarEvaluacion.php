<?php
	require_once '../modelo/clsEvaluacion.php';
	$objEvaluacion = new Evaluacion();
	$resultado=$objEvaluacion->cargarEvaluacion();
	echo json_encode($resultado);
?>