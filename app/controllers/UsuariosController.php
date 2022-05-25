<?php

	class UsuariosController extends Controller{
		public function __construct(){
			$this->usuarioModelo = $this->modelo('Usuario');
			$this->rolModelo = $this->modelo('Rol');
		}

		public function index(){

			$lista_usuario = $this->usuarioModelo->listaUsuario();
			$lista_rol = $this->rolModelo->listaRol();
	

			$datos = ['lista_usuario' => $lista_usuario, 'lista_rol' => $lista_rol];

			$this->vista('usuarios/inicio', $datos);
		}
        public function agregar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$password_segura = password_hash(trim($_POST['contrasena_usuario']),PASSWORD_BCRYPT,['cost'=>4]); 
				$datos_agregar = [

					'nombre_usuario' => trim($_POST['nombre_usuario']),
					'apellido_usuario' => trim($_POST['apellido_usuario']),
					'correo_usuario' => strtoupper(trim($_POST['correo_usuario'])),
					'rol_usuario' => $_POST['rol_usuario'],
					'contrasena_usuario' => $password_segura
					
					

				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->usuarioModelo->agregarUsuario($datos_agregar)){
					$arr = ['mensaje' => 'Se ha ingresado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error agregando usuario', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('usuarios/agregar', $arr);
			} 
		}
		public function editar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$password_segura = password_hash(trim($_POST['contrasena_usuario']),PASSWORD_BCRYPT,['cost'=>4]); 
				$datos_agregar = [

					'id_usuario' => trim($_POST['id_usuario']),
					'nombre_usuario' => trim($_POST['nombre_usuario']),
					'apellido_usuario' => trim($_POST['apellido_usuario']),
					'correo_usuario' => strtoupper(trim($_POST['correo_usuario'])),
					'rol_usuario' => trim($_POST['rol_usuario']),
					'contrasena_usuario' => $password_segura



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->usuarioModelo->editarUsuario($datos_agregar)){
					$arr = ['mensaje' => 'Se a modificado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error editando usuario', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('usuarios/agregar', $arr);
			} 
		}
		
		public function eliminar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$id_usr = trim($_POST['id']);

				if($this->usuarioModelo->eliminarUsuario($id_usr)){
					$arr = ['mensaje' => 'Eliminado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					 echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error', 'titulo' => 'Error', 'status' => '0'];
					 echo json_encode($arr);
				}
			  $this->vista('usuarios/eliminar', $arr);
			}
		}

		public function login(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				$correo_usuario = strtoupper($_POST["correo_usuario"]);
				$contrasena_usuario = $_POST["contrasena_usuario"];

				$this->usuarioModelo->getUsuarioCorreo($correo_usuario,$contrasena_usuario);
				

				if(isset($_SESSION['error_login'])){

					$this->vista('usuarios/login');

					unset($_SESSION['error_login']);
					session_destroy();

				}else{
					if(isset($_SESSION['administrador'])){
					
						header('Location: '.RUTA_URL);
	
					}else if(isset($_SESSION['vendedor'])){
						
						header('Location: '.RUTA_URL);
	
					}
				}
			}
			$this->vista('usuarios/login');
		}

		public function logout() {
			session_start();
			if(isset($_SESSION['administrador'])){
				unset($_SESSION['administrador']);
				session_destroy();
			}else if(isset($_SESSION['vendedor'])){
				unset($_SESSION['vendedor']);
				session_destroy();
			
			}
			header('Location: '.RUTA_URL."/usuarios/login");
		}
	}