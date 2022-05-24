<?php

	class Rol{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

        public function listaRol(){
			$this->db->query("SELECT * FROM rol");

			return json_decode(json_encode($this->db->registros()), true);
		}

        
	}