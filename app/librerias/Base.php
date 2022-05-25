<?php 
	//clase conectarse a DB y ejecutar consultas PDO
	class Base{
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $nombre_base = DB_NOMBRE;


		private $dbh;
		private $stmt;
		private $error;

		public function __construct(){
			//config conexion
			$dsn = 'mysql:host=' . $this->host . ';dbname='. $this->nombre_base;

			$opciones = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);


			//CREAR INSTANCIA DE PDO
			try{
				$this->bdh =new PDO($dsn, $this->user,$this->pass, $opciones);
				$this->bdh->exec('set names utf8');
			}catch (PDOExecption $e){
				$this->error = $e->getMessage();
				echo $this->error;
			}

		}
		//PREPARAR CONSULTA
		public function query($sql){
			$this->stmt = $this->bdh->prepare($sql);
		}
		//VINCULAR CONSULTA
		public function bind($parametro, $valor, $tipo){
			if(is_null($tipo)){
				switch (true) {
					case is_int($valor):
						$tipo = PDO::PARAM_INT;
						break;
					case is_bool($valor):
						$tipo = PDO::PARAM_BOOL;
						break;
					case is_null($valor):
						$tipo = PDO::PARAM_NULL;
						break;
					default:
						$tipo = PDO::PARAM_STR;
						break;
				}
			}
			$this->stmt->bindValue($parametro, $valor, $tipo);

		}

		//EJECUTA CONSULTA
		public function execute(){
			return $this->stmt->execute();
		}

		//OBTENER REGISTROS CONSULTA
		public function registros(){
			$this->execute();
			$esto = $this->stmt->fetchAll(PDO::FETCH_OBJ);
			$this->stmt->closeCursor();
			return $esto;
		}
		//obtener 1 registro solo
		public function registro(){
			$this->execute();
			$esto = $this->stmt->fetch(PDO::FETCH_OBJ);
			return $esto;
		}
		//obtener cantidad de filas rowCount
		public function regisitros(){
			$this->execute();
			$esto = $this->stmt->rowCount();
			return $esto;
		}
	}