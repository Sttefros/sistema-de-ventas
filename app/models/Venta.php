<?php

	class Venta{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listaVenta(){
			$this->db->query("CALL listaVenta()");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function terminarVenta($datos_agregar){

			$this->db->query("CALL terminarVenta(:tipo_pago,:fecha,:id_usuario,:id_cliente,:check_fiado,:fecha_convenio,:total_venta,:total_iva,:total_venta_iva)");

			$this->db->bind(':tipo_pago', 1, null);
			$this->db->bind(':id_cliente', $datos_agregar['id_cliente'], null);
			$this->db->bind(':id_usuario', $datos_agregar['id_usuario'], null);
			$this->db->bind(':fecha', $datos_agregar['fecha'], null);
			$this->db->bind(':check_fiado', $datos_agregar['check_fiado'], null);
			$this->db->bind(':fecha_convenio', $datos_agregar['fecha_convenio'], null);
			$this->db->bind(':total_venta', $datos_agregar['total_venta'], null);
			$this->db->bind(':total_iva', $datos_agregar['total_iva'], null);
			$this->db->bind(':total_venta_iva', $datos_agregar['total_venta_iva'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		public function ultimaVenta(){

			$this->db->query("CALL ultimaVenta()");

			return json_decode(json_encode($this->db->registro()), true);;

			
			
		}
		
	}