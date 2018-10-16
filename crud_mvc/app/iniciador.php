<?php 

	//Cargamos librerias
	require_once 'config/configurar.php';
	require_once 'helpers/url_helper.php';
	/*
	require_once 'librerias/Base.php';
	require_once 'librerias/Controlador.php';
	require_once 'librerias/Core.php';
	*/

	//Detecta cuales son los archivos de esta carpeta de clases y poder instanciarlos para no hacerlo manualmente y cargar el codigo de lineas de instancias de estos
	//Autoload php
	spl_autoload_register(function($nombreClase){
		require_once 'librerias/'. $nombreClase . '.php';
	});
?>