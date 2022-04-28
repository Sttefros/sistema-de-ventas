<?php

	class ProveedoresController extends Controller{
		public function __construct(){
			$this->proveedorModelo = $this->modelo('Proveedor');
		}

		public function index(){

			$proveedores = $this->proveedorModelo->listaProveedor();

			$datos = ['proveedores' => $proveedores];

			$this->vista('proveedores/inicio', $datos);
		}
		public function agregar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'nombre_proveedor' => trim($_POST['nombre_proveedor']),
					'rut' => trim($_POST['rut']),
					'telefono' => trim($_POST['telefono']),
					'correo' => trim($_POST['correo']),
					'nombre_contacto' => trim($_POST['nombre_contacto']),
					'rol_proveedor' => trim($_POST['rol_proveedor'])



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->proveedorModelo->agregarProveedor($datos_agregar)){
					$arr = ['mensaje' => 'Se a ingreresado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error agregando proveedor', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('proveedores/agregar', $arr);
			} 
		}
		public function editar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'id_proveedor' => trim($_POST['id_proveedor']),
					'nombre_proveedor' => trim($_POST['nombre_proveedor']),
					'rut' => trim($_POST['rut']),
					'telefono' => trim($_POST['telefono']),
					'correo' => trim($_POST['correo']),
					'nombre_contacto' => trim($_POST['nombre_contacto']),
					'rol_proveedor' => trim($_POST['rol_proveedor'])



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->proveedorModelo->editarProveedor($datos_agregar)){
					$arr = ['mensaje' => 'Se a modificado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error editando Proveedor', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('proveedores/agregar', $arr);
			} 
		}
		public function eliminar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$id_prov = trim($_POST['id']);

				if($this->proveedorModelo->eliminarProveedor($id_prov)){
					$arr = ['mensaje' => 'Eliminado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					 echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error', 'titulo' => 'Error', 'status' => '0'];
					 echo json_encode($arr);
				}
			  $this->vista('productos/eliminar', $arr);
			}
		}

	}