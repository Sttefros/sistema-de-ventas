<?php

	class Usuario{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

        public function listaUsuario(){
			$this->db->query("CALL listaUsuario()");

			return json_decode(json_encode($this->db->registros()), true);
		}

        public function agregarUsuario($datos_agregar){

			$this->db->query("CALL agregarUsuario(:nombre_usuario,:apellido_usuario,:correo_usuario,:rol_usuario,:contrasena_usuario)");

			$this->db->bind(':nombre_usuario', $datos_agregar['nombre_usuario'], null);
			$this->db->bind(':apellido_usuario', $datos_agregar['apellido_usuario'], null);
			$this->db->bind(':correo_usuario', $datos_agregar['correo_usuario'], null);
			$this->db->bind(':rol_usuario', $datos_agregar['rol_usuario'], null);
			$this->db->bind(':contrasena_usuario',$datos_agregar['contrasena_usuario'], null);
            

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editarUsuario($datos_agregar){

			$this->db->query("CALL editarUsuario(:nombre_usuario,:apellido_usuario,:correo_usuario,:rol_usuario,:contrasena_usuario,:id_usuario)");

			$this->db->bind(':id_usuario', $datos_agregar['id_usuario'], null);
			$this->db->bind(':nombre_usuario', $datos_agregar['nombre_usuario'], null);
			$this->db->bind(':apellido_usuario', $datos_agregar['apellido_usuario'], null);
			$this->db->bind(':correo_usuario', $datos_agregar['correo_usuario'], null);
			$this->db->bind(':rol_usuario', $datos_agregar['rol_usuario'], null);
			$this->db->bind(':contrasena_usuario',$datos_agregar['contrasena_usuario'], null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function eliminarUsuario($id_eliminar){

			$this->db->query("CALL eliminarUsuario(:id_eliminar)");

			$this->db->bind(':id_eliminar', $id_eliminar, null);

			
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

        public function getUsuarioCorreo($correo_usuario, $contrasena_usuario) {
			$sql = "SELECT * FROM usuario WHERE correo_usuario = '$correo_usuario' LIMIT 1";

			$resultado = $this->db->query($sql);
			$resultado = $this->db->execute($sql);
			
			$resultado1 = $this->db->registro($sql);
			$row = json_decode(json_encode($resultado1), true);
			
            if($resultado == true){

				if($row == true){
					//comparar la contrasena del $usuario columna 'contrasena_usuario'
					$verify = password_verify($contrasena_usuario, $row['contrasena_usuario']);
									
					// verificar el resultado de la validacion de la password
					if($verify == true){
						if($row['rol_usuario'] == 1 ){
							$_SESSION['administrador'] = $row;
							$_SESSION['time'] = time();
							return $_SESSION['administrador'];
						}else if($row['rol_usuario'] == 2){
							$_SESSION['vendedor'] = $row;
							$_SESSION['time'] = time();
							return $_SESSION['vendedor'];
						}             
					}else{
						//si algo falla enviar sesion con el fallo de verificacion de contraseña
						$_SESSION['error_login'] = '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-ban"></i> Alerta!</h5>
						Correo o contraseña incorrecta
						</div>';
						return $_SESSION['error_login'];
					}
				}else{
					//si algo falla enviar sesion con el fallo de verificacion de correo
					$_SESSION['error_login'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-ban"></i> Alerta!</h5>
					Correo o contraseña incorrecta
					</div>';
					return $_SESSION['error_login'];
				}
                
            }else{
                //si algo falla enviar sesion con el fallo de verificacion de correo
                $_SESSION['error_login'] = "dato incorrecto";
                return $_SESSION['error_login'];
            }
			
        }
	}