<?php
	$usuario=$_POST["usuario"];
	$colaborador=$_POST["idcolaborador"];
	$total=$_POST["txttotal"];
	$resultado=$_POST["resultado"];
	$preguntas=$_POST["preguntas"];
	$evaluacion=$_POST["evaluacion"];

	require_once '../modelo/clsEjecutarEvaluacion.php';
	$objEjecutarEvaluacion = new EjecutarEvaluacion();
	$objEjecutarEvaluacion->setColaborador($colaborador);
	$objEjecutarEvaluacion->setUsuario($usuario);
	$objEjecutarEvaluacion->setPuntajeTotal($total);
	$objEjecutarEvaluacion->setResultado($resultado);
	$objEjecutarEvaluacion->setEvaluacion($evaluacion);

	$objEjecutarEvaluacion->registrarEjecutarEvaluacion();
	$resultados=$objEjecutarEvaluacion->obtenerUltimoId();

	$preguntasarray=explode(";", $preguntas);		
	for ($i=0; $i <count($preguntasarray)-1 ; $i++) { 
		$preguntaarray=explode(",", $preguntasarray[$i]);
		$objEjecutarEvaluacion->setEjecutar($resultados[0]);
		$objEjecutarEvaluacion->setPreguntaEvaluacion($preguntaarray[1]);
		$objEjecutarEvaluacion->setPuntaje($preguntaarray[0]);
		$objEjecutarEvaluacion->registrarDetalleEjecutar();
	}
	$resuelto = array('state' =>1 );	
	echo json_encode($resuelto);
?>