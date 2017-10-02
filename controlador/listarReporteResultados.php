<?php
	$resultado=$_POST["id_resultado"];
	$evaluacion=$_POST["id_evaluacion"];
	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$resultado=$objEjecutarEvaluacion->listarReporteResultado($resultado,$evaluacion);
	echo json_encode($resultado);
?>