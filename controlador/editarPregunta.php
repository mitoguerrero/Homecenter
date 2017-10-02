<?php
	$idpregunta=$_POST["idpregunta"];
	$categoria=$_POST["txtcategoria"];
	$pregunta=$_POST["txtpregunta"];
	require_once '../modelo/clsPregunta.php';
	$objPregunta = new Pregunta();
	$objPregunta->setDescripcion($pregunta);
	$objPregunta->setCategoria($categoria);

	if ($objPregunta->editarPregunta($idpregunta)) {
		echo true;
	}else{
		echo false;
	}
?>