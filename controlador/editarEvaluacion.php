<?php
	$idperiodo=$_POST["txtperiodo"];
	$descripcion=$_POST["txtnombre"];
	$idevaluacion=$_POST["idevaluacion"];

	require_once '../modelo/clsEvaluacion.php';
	$objEvaluacion = new Evaluacion();
	$objEvaluacion->setPeriodo($idperiodo);
	$objEvaluacion->setDescripcion($descripcion);
	if ($objEvaluacion->editarEvaluacion($idevaluacion)) {
		echo true;
	}else{
		echo false;
	}
?>