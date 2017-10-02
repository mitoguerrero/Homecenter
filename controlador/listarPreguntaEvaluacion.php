<?php 
	$evaluacion=$_POST["id_evaluacion"];
	$categoria=$_POST["id_categoria"];
	require_once '../modelo/clsPregunta.php';
	$objPregunta = new Pregunta();
	$resultado=$objPregunta->listarPreguntaPorEvaluacion($evaluacion,$categoria);
	echo json_encode($resultado);
?>