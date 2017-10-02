<?php
	$pregunta=$_POST["id_pregunta"];
	$evaluacion=$_POST["id_evaluacion"];
	require_once '../modelo/clsPreguntaEvaluacion.php';
	$objPreguntaEvaluacion = new PreguntaEvaluacion();
	$resultado=$objPreguntaEvaluacion->desvincular($evaluacion,$pregunta);
	echo json_encode($resultado);

?>