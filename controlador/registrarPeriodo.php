<?php
	$periodo=$_POST["txtperiodo"];
	$semestre=$_POST["txtsemestre"];
	$anio=$_POST["txtanio"];
	$nombre=$periodo." ".$semestre." ".$anio;
	require_once '../modelo/clsPeriodo.php';
	$objPeriodo = new Periodo();
	$objPeriodo->setNombre($nombre);
	if ($objPeriodo->registrarPeriodo()) {
		echo true;
	}else{
		echo false;
	}
?>