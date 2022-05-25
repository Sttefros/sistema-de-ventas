<?php

	class Pedido{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function listarPedido(){
			$this->db->query("SELECT * FROM orden_pedido");

			return json_decode(json_encode($this->db->registros()), true);
		}

		
	}