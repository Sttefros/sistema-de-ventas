<?php

	class Producto_tipo{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaProducto_tipo(){
			$this->db->query("CALL listaProducto_tipo()");

			return json_decode(json_encode($this->db->registros()), true);
			
		}

		public function listaSelectProducto_tipo(){
			$this->db->query("CALL listaSelectProducto_tipo()");

			return json_decode(json_encode($this->db->registros()), true);
			
		}

		public function agregarProducto_tipo($datos_agregar){

			$this->db->query("CALL agregarProducto_tipo(:nombre_prod_tipo)");

			$this->db->bind(':nombre_prod_tipo', $datos_agregar['nombre_prod_tipo'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editarProducto_tipo($datos_agregar){

			$this->db->query("CALL editarProducto_tipo(:id_prod_tipo, :nombre_prod_tipo)");

			$this->db->bind(':id_prod_tipo', $datos_agregar['id_prod_tipo'], null);
			$this->db->bind(':nombre_prod_tipo', $datos_agregar['nombre_prod_tipo'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function eliminarProducto_tipo($id_eliminar){

			$this->db->query("CALL eliminarProducto_tipo(:id_eliminar)");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}