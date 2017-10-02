<?php
	$usuario=$_POST["id_usuario"];
	$estado=$_POST["id"];
	require_once '../modelo/clsColaborador.php';
	$objColaborador = new Colaborador();
	$resultado=$objColaborador->cambiarEstado($estado,$usuario);
	echo json_encode($resultado);
?>