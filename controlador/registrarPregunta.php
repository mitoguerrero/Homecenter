<?php
	$usuario=$_POST["idusuario"];
	$categoria=$_POST["txtcategoria"];
	$pregunta=$_POST["txtpregunta"];
	require_once '../modelo/clsPregunta.php';
	$objPregunta = new Pregunta();
	$objPregunta->setUsuario($usuario);
	$objPregunta->setDescripcion($pregunta);
	$objPregunta->setCategoria($categoria);

	if ($objPregunta->registrarPregunta()) {
		echo true;
	}else{
		echo false;
	}
?>