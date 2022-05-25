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
			$this->db->query("SELECT id_producto as id, concat_ws(' - ', nombre_producto, sku) as text FROM producto");

			return json_decode(json_encode($this->db->registros()), true);
			
		}
		public function SelectProducto($codigo){
			$this->db->query("SELECT * FROM producto WHERE id_producto = :id_producto LIMIT 1");

			$this->db->bind(':id_producto', $codigo, null);

			return json_decode(json_encode($this->db->registro()), true);
			
		}


		public function agregarProducto($datos_agregar){

			$this->db->query("INSERT INTO producto (`id_prod_tipo`,`id_proveedor`,`sku`,`nombre_producto`,`precio_venta`, `descripcion_producto`, `cantidad`) VALUES (:id_prod_tipo,:id_proveedor,:sku,:nombre_producto,:precio_venta,:descripcion_producto,:cantidad)");

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

			$this->db->query("UPDATE  producto SET `id_prod_tipo`= :id_prod_tipo,`id_proveedor` = :id_proveedor,`sku` = :sku,`nombre_producto` = :nombre_producto,`precio_venta` = :precio_venta, `descripcion_producto` = :descripcion_producto, `cantidad` = :cantidad WHERE id_producto = :id_producto");

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

			$this->db->query("DELETE FROM producto WHERE id_producto = :id_eliminar");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}