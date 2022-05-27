<?php

	class Pedido{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listarPedido(){
			$this->db->query("CALL listarPedido()");

			return json_decode(json_encode($this->db->registros()), true);
		}

		public function terminarPedido($datos_agregar){

			$this->db->query("INSERT INTO orden_pedido (`id_proveedor`, `fecha_pedido`, `fecha_entrega`, `estado_entrega`, `cant_producto`, `precio_total_orden`) VALUES (:id_proveedor,:fecha_pedido,:fecha_entrega,:estado_entrega,:cant_producto,:precio_total_orden)");

			$this->db->bind(':id_proveedor', $datos_agregar['id_proveedor'], null);
			$this->db->bind(':fecha_pedido', $datos_agregar['fecha_pedido'], null);
			$this->db->bind(':fecha_entrega', $datos_agregar['fecha_entrega'], null);
			$this->db->bind(':estado_entrega', $datos_agregar['estado_entrega'], null);
			$this->db->bind(':cant_producto', $datos_agregar['cant_producto'], null);
			$this->db->bind(':precio_total_orden', $datos_agregar['precio_total_orden'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		public function ultimoPedido(){

			$this->db->query("SELECT * FROM orden_pedido ORDER BY id_orden_pedido DESC LIMIT 1");

			return json_decode(json_encode($this->db->registro()), true);;

			
			
		}
	}