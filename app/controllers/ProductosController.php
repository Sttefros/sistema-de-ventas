<?php

	class ProductosController extends Controller{
		public function __construct(){
			$this->productoModelo = $this->modelo('Producto');
			$this->proveedorModelo = $this->modelo('Proveedor');
			$this->Producto_tipoModelo = $this->modelo('Producto_tipo');
		}

		public function index(){

			$lista_producto = $this->productoModelo->listaProducto();
			$lista_proveedor = $this->proveedorModelo->listaSelectProveedor();
			$lista_prod_tipo = $this->Producto_tipoModelo->listaSelectProducto_tipo();


			$datos = ['lista_producto' => $lista_producto, 'lista_proveedor' => $lista_proveedor, 'lista_prod_tipo' => $lista_prod_tipo];

			$this->vista('productos/inicio', $datos);
		}

		public function agregar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'nombre_producto' => trim($_POST['nombre_producto']),
					'id_proveedor' => trim($_POST['id_proveedor']),
					'id_prod_tipo' => trim($_POST['id_prod_tipo']),
					'cantidad' => trim($_POST['cantidad']),
					'precio_venta' => trim($_POST['precio_venta']),
					'descripcion_producto' => trim($_POST['descripcion_producto']),
					'sku' => trim($_POST['sku'])



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->productoModelo->agregarProducto($datos_agregar)){
					$arr = ['mensaje' => 'Se ha ingresado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error agregando Producto', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('productos/agregar', $arr);
			} 
		}
		public function editar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'id_producto' => trim($_POST['id_producto']),
					'nombre_producto' => trim($_POST['nombre_producto']),
					'id_proveedor' => trim($_POST['id_proveedor']),
					'id_prod_tipo' => trim($_POST['id_prod_tipo']),
					'cantidad' => trim($_POST['cantidad']),
					'precio_venta' => trim($_POST['precio_venta']),
					'descripcion_producto' => trim($_POST['descripcion_producto']),
					'sku' => trim($_POST['sku'])



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->productoModelo->editarProducto($datos_agregar)){
					$arr = ['mensaje' => 'Se ha modificado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error editando Producto', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('productos/agregar', $arr);
			} 
		}
		public function eliminar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$id_prod = trim($_POST['id']);

				if($this->productoModelo->eliminarProducto($id_prod)){
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