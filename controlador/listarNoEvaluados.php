<?php
	$evaluacion=$_POST["id_evaluacion"];
	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$resultado=$objEjecutarEvaluacion->listarNoEvaluados($evaluacion);
	echo json_encode($resultado);
?>