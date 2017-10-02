<?php
	require_once '../modelo/clsCategoria.php';
	$objCategoria = new Categoria();
	$resultado=$objCategoria->cargarCategoria();
	echo json_encode($resultado);
?>