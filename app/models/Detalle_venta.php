<?php

	class Detalle_venta{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function terminarVenta($datos_agregar, $id_venta){

			$this->db->query("INSERT INTO detalle_venta (`id_venta`, `id_producto`, `cantidad_producto`, `precio_producto`, `precio_total_producto`) VALUES (:id_venta,:id_producto,:cantidad_producto,:precio_producto,:precio_total_producto)");

			$this->db->bind(':id_venta', $id_venta, null);
			$this->db->bind(':id_producto', $datos_agregar['id_producto'], null);
			$this->db->bind(':cantidad_producto', $datos_agregar['cantidad_v'], null);
			$this->db->bind(':precio_producto', $datos_agregar['precio_venta'], null);
			$this->db->bind(':precio_total_producto', $datos_agregar['total'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
	}