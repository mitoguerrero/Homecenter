<?php
	$usuario=$_POST["idusuario"];
	$area=$_POST["txtarea"];
	$nombre=$_POST["txtnombre"];
	$apellido=$_POST["txtapellido"];
	$dni=$_POST["txtdni"];
	$correo=$_POST["txtcorreo"];
	$direccion=$_POST["txtdireccion"];
	$telefono=$_POST["txttelefono"];
	$fechaNacimiento = $_POST["txtfechanacimiento"];
	$fechaIngreso =$_POST["txtfechaingreso"];

	require_once '../modelo/clsColaborador.php';
	$objColaborador = new Colaborador();
	$objColaborador->setUsuario($usuario);
	$objColaborador->setArea($area);
	$objColaborador->setNombre($nombre);
	$objColaborador->setApellido($apellido);
	$objColaborador->setDireccion($direccion);
	$objColaborador->setTelefono($telefono);
	$objColaborador->setFechaNacimiento($fechaNacimiento);
	$objColaborador->setfechaIngreso($fechaIngreso);
	$objColaborador->setDni($dni);
	$objColaborador->setCorreo($correo);
	
	if ($objColaborador->registrarColaborador()) {
		echo true;
	}else{
		echo false;
	}
?>