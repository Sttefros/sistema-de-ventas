<?php

	class Cliente{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

        public function listaCliente(){
			$this->db->query("CALL listaCliente()");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function listaSelectCliente(){
			$this->db->query("CALL listaSelectCliente()");

			return json_decode(json_encode($this->db->registros()), true);
			
		}

        public function agregarCliente($datos_agregar){

			$this->db->query("CALL agregarCliente(:rut_cliente,:nombre_cliente,:telefono_cliente,:direccion_cliente,:check_fiado)");

			$this->db->bind(':rut_cliente', $datos_agregar['rut_cliente'], null);
			$this->db->bind(':nombre_cliente', $datos_agregar['nombre_cliente'], null);
			$this->db->bind(':telefono_cliente', $datos_agregar['telefono_cliente'], null);
			$this->db->bind(':direccion_cliente', $datos_agregar['direccion_cliente'], null);
			$this->db->bind(':check_fiado',$datos_agregar['check_fiado'], null);
            

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editarCliente($datos_agregar){

			$this->db->query("CALL editarCliente(:id_cliente, :rut_cliente, :nombre_cliente, :telefono_cliente, :direccion_cliente, :check_fiado)");

			$this->db->bind(':id_cliente', $datos_agregar['id_cliente'], null);
			$this->db->bind(':rut_cliente', $datos_agregar['rut_cliente'], null);
			$this->db->bind(':nombre_cliente', $datos_agregar['nombre_cliente'], null);
			$this->db->bind(':telefono_cliente', $datos_agregar['telefono_cliente'], null);
			$this->db->bind(':direccion_cliente', $datos_agregar['direccion_cliente'], null);
			$this->db->bind(':check_fiado',$datos_agregar['check_fiado'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function eliminarCliente($id_eliminar){

			$this->db->query("CALL eliminarCliente(:id_eliminar)");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function ultimoCliente(){

			$this->db->query("SELECT * FROM cliente ORDER BY id_cliente desc LIMIT 1");
			return json_decode(json_encode($this->db->registro()), true);
		}
	}