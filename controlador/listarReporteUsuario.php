<?php
	$usuario=$_POST["id_usuario"];
	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$resultado=$objEjecutarEvaluacion->listarReporteUsuario($usuario);
	echo json_encode($resultado);
?>