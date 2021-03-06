<?php

	class Proveedor{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaProveedor(){
			$this->db->query("CALL listaProveedor()");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function listaSelectProveedor(){
			$this->db->query("CALL listaSelectProveedor()");
			

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function agregarProveedor($datos_agregar){

			$this->db->query("CALL agregarProveedor(:nombre_proveedor,:rut,:telefono,:correo,:nombre_contacto,:direccion_proveedor)");

			$this->db->bind(':nombre_proveedor', $datos_agregar['nombre_proveedor'], null);
			$this->db->bind(':rut', $datos_agregar['rut'], null);
			$this->db->bind(':telefono', $datos_agregar['telefono'], null);
			$this->db->bind(':correo', $datos_agregar['correo'], null);
			$this->db->bind(':nombre_contacto', $datos_agregar['nombre_contacto'], null);
			$this->db->bind(':direccion_proveedor', $datos_agregar['direccion_proveedor'], null);
			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editarProveedor($datos_agregar){

			$this->db->query("CALL editarProveedor(:nombre_proveedor,:rut,:telefono,:correo,:nombre_contacto,:direccion_proveedor,:id_proveedor)");

			
			$this->db->bind(':nombre_proveedor', $datos_agregar['nombre_proveedor'], null);
			$this->db->bind(':rut', $datos_agregar['rut'], null);
			$this->db->bind(':telefono', $datos_agregar['telefono'], null);
			$this->db->bind(':correo', $datos_agregar['correo'], null);
			$this->db->bind(':nombre_contacto', $datos_agregar['nombre_contacto'], null);
			$this->db->bind(':direccion_proveedor', $datos_agregar['direccion_proveedor'], null);
			$this->db->bind(':id_proveedor', $datos_agregar['id_proveedor'], null);

			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function eliminarProveedor($id_eliminar){

			$this->db->query("CALL eliminarProveedor(:id_eliminar)");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}