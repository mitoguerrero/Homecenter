<?php
	$evaluacion=$_POST["id_evaluacion"];
	require_once '../modelo/clsPreguntaEvaluacion.php';
	$objPreguntaEvaluacion = new PreguntaEvaluacion();
	$resultado=$objPreguntaEvaluacion->listarVincular($evaluacion);
	echo json_encode($resultado);
?>