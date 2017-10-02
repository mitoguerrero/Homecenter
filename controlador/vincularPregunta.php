<?php
	$evaluacion=$_POST["id_evaluacion"];
	$pregunta=$_POST["id_pregunta"];

	require_once '../modelo/clsPreguntaEvaluacion.php';
	$objEvaluacionPregunta = new PreguntaEvaluacion();
	$objEvaluacionPregunta->setEvaluacion($evaluacion);
	$objEvaluacionPregunta->setPregunta($pregunta);

	$resultado=$objEvaluacionPregunta->vincular();
	echo json_encode($resultado);
?>