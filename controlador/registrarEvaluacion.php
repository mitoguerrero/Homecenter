<?php
	$idperiodo=$_POST["txtperiodo"];
	$descripcion=$_POST["txtnombre"];
	$usuario=$_POST["idusuario"];

	require_once '../modelo/clsEvaluacion.php';
	$objEvaluacion = new Evaluacion();
	$objEvaluacion->setPeriodo($idperiodo);
	$objEvaluacion->setDescripcion($descripcion);
	$objEvaluacion->setUsuario($usuario);
	if ($objEvaluacion->registrarEvaluacion()) {
		echo true;
	}else{
		echo false;
	}
?>