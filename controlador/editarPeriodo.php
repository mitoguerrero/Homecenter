<?php
	$periodo=$_POST["idperiodo"];
	$nombre=$_POST["txtnombre"];
	require_once '../modelo/clsPeriodo.php';
	$objPeriodo = new Periodo();
	$objPeriodo->setNombre($nombre);
	if ($objPeriodo->editarPeriodo($periodo)) {
		echo true;
	}else{
		echo false;
	}
?>