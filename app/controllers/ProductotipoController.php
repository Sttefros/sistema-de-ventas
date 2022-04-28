<?php

	class ProductotipoController extends Controller{
		public function __construct(){
			$this->producto_tipoModelo = $this->modelo('Producto_tipo');
		}

		public function index(){

			$lista_prod_tipo = $this->producto_tipoModelo->listaProducto_tipo();


			$datos = [ 'lista_prod_tipo' => $lista_prod_tipo];

			$this->vista('producto_tipo/inicio', $datos);
		}
		public function agregar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'nombre_prod_tipo' => trim($_POST['nombre_prod_tipo'])
				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->producto_tipoModelo->agregarProducto_tipo($datos_agregar)){
					$arr = ['mensaje' => 'Se a ingreresado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error agregando tipo producto', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('producto_tipo/agregar', $arr);
			} 
		}
		public function editar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'id_prod_tipo' => trim($_POST['id_prod_tipo']),
					'nombre_prod_tipo' => trim($_POST['nombre_prod_tipo'])

				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->producto_tipoModelo->editarProducto_tipo($datos_agregar)){
					$arr = ['mensaje' => 'Se a modificado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error editando tipo producto', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('producto_tipo/agregar', $arr);
			} 
		}
		public function eliminar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$id_prod_tipo = trim($_POST['id']);

				if($this->producto_tipoModelo->eliminarProducto_tipo($id_prod_tipo)){
					$arr = ['mensaje' => 'Eliminado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					 echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error', 'titulo' => 'Error', 'status' => '0'];
					 echo json_encode($arr);
				}
			  $this->vista('producto_tipo/eliminar', $arr);
			}
		}
	}