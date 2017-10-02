<?php
	$id=$_POST["id_pregunta"];
	require_once '../modelo/clsPregunta.php';
	$objPregunta = new Pregunta();
	$resultado=$objPregunta->cargarPregunta($id);
	echo json_encode($resultado);
?>