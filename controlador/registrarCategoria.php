<?php
	$nombre=$_POST["txtnombre"];
	require_once '../modelo/clsCategoria.php';
	$objCategoria = new Categoria();
	$objCategoria->setNombre($nombre);
	if ($objCategoria->registrarCategoria()) {
		echo true;
	}else{
		echo false;
	}
?>