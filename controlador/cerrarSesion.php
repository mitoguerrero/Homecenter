<?php
	session_name('usuario');
	session_start();
	session_unset('correo');
	session_unset('idusuario');
	header('location:../index.php');
?>