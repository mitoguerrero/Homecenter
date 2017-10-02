<?php
	$evaluacion=$_POST["id_evaluacion"];
	$estado=$_POST["id"];
	require_once '../modelo/clsEvaluacion.php';
	$objEvaluacion = new Evaluacion();
	$resultado=$objEvaluacion->cambiarEstado($estado,$evaluacion);
	echo json_encode($resultado);
?>