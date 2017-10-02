<?php
	$email=$_POST["txtemail"];
	$contra=$_POST["txtpassword"];

	require_once '../modelo/clsSesion.php';
	$objSesion = new Sesion();
	$funcion=$objSesion->iniciarSesion($email,$contra);

	echo json_encode($funcion);
?>