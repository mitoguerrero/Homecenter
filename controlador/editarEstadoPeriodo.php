<?php
	$periodo=$_POST["id_periodo"];
	$estado=$_POST["id"];
	require_once '../modelo/clsPeriodo.php';
	$objPeriodo = new Periodo();
	$resultado=$objPeriodo->cambiarEstado($estado,$periodo);
	echo json_encode($resultado);
?>