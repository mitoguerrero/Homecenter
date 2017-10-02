<?php
	$categoria=$_POST["id_categoria"];
	$estado=$_POST["id"];
	require_once '../modelo/clsCategoria.php';
	$objCategoria = new Categoria();
	$resultado=$objCategoria->cambiarEstado($estado,$categoria);
	echo json_encode($resultado);
?>