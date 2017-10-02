<?php
	$colaborador=$_POST["idcolaborador"];
	$tipo=$_POST["txttipo"];
	$categoria=$_POST["txtcategoria"];
	$descripcion=$_POST["txtdescripcion"];
	$usuario=$_POST["idusuario"];
	$fecha=$_POST["txtfecha"];
	$hora=$_POST["txthora"];
	$minuto=$_POST["txtminutos"];
	$horafinal=$hora.":".$minuto.":00";

	require_once '../modelo/clsIncidencia.php';
	$objIncidencia = new Incidencia();
	$objIncidencia->setTipo($tipo);
	$objIncidencia->setColaborador($colaborador);
	$objIncidencia->setDescripcion($descripcion);
	$objIncidencia->setUsuario($usuario);
	$objIncidencia->setCategoria($categoria);
	$objIncidencia->setFecha($fecha);
	$objIncidencia->setHora($horafinal);

	if ($objIncidencia->registrarIncidencia()) {
		echo true;
	}else{
		echo false;
	}
?>