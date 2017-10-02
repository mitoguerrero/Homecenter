<?php
	require_once '../modelo/clsCategoria.php';
	$objCategoria = new Categoria();
	$resultado=$objCategoria->cargarCategoriaTodos();
	echo json_encode($resultado);
?>