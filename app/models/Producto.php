<?php

	class Producto{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaProducto(){
			$this->db->query("SELECT prod.*,  prov.nombre_proveedor, prod_tip.nombre_prod_tipo FROM producto prod INNER JOIN proveedor prov on prod.id_proveedor = prov.id_proveedor LEFT JOIN producto_tipo prod_tip ON prod.id_prod_tipo = prod_tip.id_prod_tipo");

			return json_decode(json_encode($this->db->registros()), true);
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