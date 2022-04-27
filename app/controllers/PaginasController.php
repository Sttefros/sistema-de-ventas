<?php

	class PaginasController extends Controller{
		public function __construct(){
			$this->proveedorModelo = $this->modelo('Proveedor');
		}

		public function index(){
			$proveedores = $this->proveedorModelo->listaProveedores();

			$datos = ['proveedores' => $proveedores];

			$this->vista('paginas/inicio', $datos);
		}

		public function proveedor(){
			$this->vista('paginas/proveedor');

		}

		public function actualizar($id){
			$datos = ['id' => $id];
			$this->vista('paginas/actualizar', $datos);
			
		}
	}