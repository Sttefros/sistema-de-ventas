<?php
	//Cargamos librerias
	require_once ('config/config.php');



	//AUTO LOAD
	spl_autoload_register(function($nombreClase){

		require_once 'librerias/'. $nombreClase.'.php';
	});