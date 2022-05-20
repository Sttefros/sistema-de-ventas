<?php

	class Proveedor{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaProveedor(){
			$this->db->query("SELECT * FROM proveedor");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function listaSelectProveedor(){
			$this->db->query("SELECT id_proveedor as id, nombre_proveedor as text FROM proveedor");
			

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function agregarProveedor($datos_agregar){

			$this->db->query("INSERT INTO proveedor (`nombre_proveedor`,`rut`,`telefono`,`correo`,`nombre_contacto`) VALUES (:nombre_proveedor,:rut,:telefono,:correo,:nombre_contacto)");

			$this->db->bind(':nombre_proveedor', $datos_agregar['nombre_proveedor'], null);
			$this->db->bind(':rut', $datos_agregar['rut'], null);
			$this->db->bind(':telefono', $datos_agregar['telefono'], null);
			$this->db->bind(':correo', $datos_agregar['correo'], null);
			$this->db->bind(':nombre_contacto', $datos_agregar['nombre_contacto'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editarProveedor($datos_agregar){

			$this->db->query("UPDATE  proveedor SET `nombre_proveedor`= :nombre_proveedor,`rut` = :rut,`telefono` = :telefono,`correo` = :correo,`nombre_contacto` = :nombre_contacto WHERE id_proveedor = :id_proveedor");

			$this->db->bind(':id_proveedor', $datos_agregar['id_proveedor'], null);
			$this->db->bind(':nombre_proveedor', $datos_agregar['nombre_proveedor'], null);
			$this->db->bind(':rut', $datos_agregar['rut'], null);
			$this->db->bind(':telefono', $datos_agregar['telefono'], null);
			$this->db->bind(':correo', $datos_agregar['correo'], null);
			$this->db->bind(':nombre_contacto', $datos_agregar['nombre_contacto'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function eliminarProveedor($id_eliminar){

			$this->db->query("DELETE FROM proveedor WHERE id_proveedor = :id_eliminar");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}