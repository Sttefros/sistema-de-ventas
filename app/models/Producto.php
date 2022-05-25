<?php

	class Producto{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaProducto(){
			$this->db->query("CALL listaProducto()");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function listaSelectProducto(){
			$this->db->query("CALL listaSelectProducto()");

			return json_decode(json_encode($this->db->registros()), true);
			
		}
		public function SelectProducto($codigo){
			$this->db->query("CALL SelectProducto(:id_producto)");

			$this->db->bind(':id_producto', $codigo, null);

			return json_decode(json_encode($this->db->registro()), true);
			
		}


		public function agregarProducto($datos_agregar){

			$this->db->query("CALL agregarProducto(:id_prod_tipo, :id_proveedor, :sku, :nombre_producto, :precio_venta, :descripcion_producto, :cantidad)");

			$this->db->bind(':id_prod_tipo', $datos_agregar['id_prod_tipo'], null);
			$this->db->bind(':id_proveedor', $datos_agregar['id_proveedor'], null);
			$this->db->bind(':sku', $datos_agregar['sku'], null);
			$this->db->bind(':nombre_producto', $datos_agregar['nombre_producto'], null);
			$this->db->bind(':precio_venta', $datos_agregar['precio_venta'], null);
			$this->db->bind(':descripcion_producto', $datos_agregar['descripcion_producto'], null);
			$this->db->bind(':cantidad', $datos_agregar['cantidad'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		public function editarProducto($datos_agregar){

			$this->db->query("CALL editarProducto(:id_producto, :id_prod_tipo, :id_proveedor, :sku, :nombre_producto, :precio_venta, :descripcion_producto, :cantidad)");

			$this->db->bind(':id_producto', $datos_agregar['id_producto'], null);
			$this->db->bind(':id_prod_tipo', $datos_agregar['id_prod_tipo'], null);
			$this->db->bind(':id_proveedor', $datos_agregar['id_proveedor'], null);
			$this->db->bind(':sku', $datos_agregar['sku'], null);
			$this->db->bind(':nombre_producto', $datos_agregar['nombre_producto'], null);
			$this->db->bind(':precio_venta', $datos_agregar['precio_venta'], null);
			$this->db->bind(':descripcion_producto', $datos_agregar['descripcion_producto'], null);
			$this->db->bind(':cantidad', $datos_agregar['cantidad'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		public function eliminarProducto($id_eliminar){

			$this->db->query("CALL eliminarProducto(:id_eliminar)");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}