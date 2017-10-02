<?php
	$evaluacion=$_POST["id_evaluacion"];
	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$resultado=$objEjecutarEvaluacion->listarEvaluados($evaluacion);
	echo json_encode($resultado);
?>