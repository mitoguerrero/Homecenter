<?php
	$categoria=$_POST["idcategoria"];
	$nombre=$_POST["txtnombre"];
	require_once '../modelo/clsCategoria.php';
	$objCategoria = new Categoria();
	$objCategoria->setNombre($nombre);
	if ($objCategoria->editarCategoria($categoria)) {
		echo true;
	}else{
		echo false;
	}
?>