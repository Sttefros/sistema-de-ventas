<?php

	class Cliente{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

        public function listaCliente(){
			$this->db->query("SELECT * FROM cliente");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function listaSelectCliente(){
			$this->db->query("SELECT id_cliente as id, concat_ws(' - ', nombre_cliente, rut_cliente) as text FROM cliente");

			return json_decode(json_encode($this->db->registros()), true);
			
		}

        public function agregarCliente($datos_agregar){

			$this->db->query("INSERT INTO cliente (`rut_cliente`, `nombre_cliente`, `telefono_cliente`, `direccion_cliente`, `check_fiado`) VALUES (:rut_cliente,:nombre_cliente,:telefono_cliente,:direccion_cliente,:check_fiado)");

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
	}