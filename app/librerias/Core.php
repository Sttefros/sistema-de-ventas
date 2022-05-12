<?php

	/*
	Mapear url ingresada del navegador
	1-controlador
	2-metodo
	3-parametr
	Ejemplo: /proveedor/actualizar/4
	*/

	class Core{
		protected $controladorActual = 'productosController';
		protected $metodoActual = 'index';
		// protected $tablaActual = 'proveedor';
		protected $parametros = [];

		public function __construct(){
			
			$url = $this->getUrl();
			//buscar controlador existente

		 	if(!empty($url[0]) && file_exists('../app/controllers/'.ucwords($url[0]).'Controller.php')){
				
		 		//se setea por controlador default
		 		$this->controladorActual = ucwords($url[0]).'Controller';
		 		// $this->tablaActual = $url[0];
		 		unset($url[0]);

		 	} 

			
		 	require_once '../app/controllers/'. $this->controladorActual. '.php';
			
		 	$this->controladorActual = new $this->controladorActual;

		 	//segunda parte url
		 	if (isset($url[1])) {
		 		if (method_exists($this->controladorActual, $url[1])) {

		 			$this->metodoActual = $url[1];
		 			unset($url[1]);
		 		// code...
		 		}
		 	}
		 	//traer metodo
		 	//echo $this->metodoActual;

		 	//obtener parametros
		 	$this->parametros = $url ? array_values($url) : [];

		 	//llamar callback parametros array
		 	call_user_func_array([$this->controladorActual,$this->metodoActual], $this->parametros);

		 }

		public function getUrl(){
			//echo $_GET['url'];
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			} else {
				print_r ('error url');

			}

		}
	}