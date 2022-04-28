<?php

	class ClientesController extends Controller{
		public function __construct(){
			$this->clienteModelo = $this->modelo('Cliente');
		}

		public function index(){

			$lista_cliente = $this->clienteModelo->listaCliente();
	

			$datos = ['lista_cliente' => $lista_cliente];

			$this->vista('clientes/inicio', $datos);
		}
        public function agregar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'rut_cliente' => trim($_POST['rut_cliente']),
					'nombre_cliente' => trim($_POST['nombre_cliente']),
					'telefono_cliente' => trim($_POST['telefono_cliente']),
					'direccion_cliente' => trim($_POST['direccion_cliente']),
					'check_fiado' => trim($_POST['check_fiado'])


				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->clienteModelo->agregarCliente($datos_agregar)){
					$arr = ['mensaje' => 'Se ha ingresado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error agregando cliente', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('clientes/agregar', $arr);
			} 
		}
		public function editar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$datos_agregar = [

					'id_cliente' => trim($_POST['id_cliente']),
					'rut_cliente' => trim($_POST['rut_cliente']),
					'nombre_cliente' => trim($_POST['nombre_cliente']),
					'telefono_cliente' => trim($_POST['telefono_cliente']),
					'direccion_cliente' => trim($_POST['direccion_cliente']),
					'check_fiado' => trim($_POST['check_fiado'])



				];
				$datos_agregar = json_decode(json_encode($datos_agregar), true);
				if($this->clienteModelo->editarCliente($datos_agregar)){
					$arr = ['mensaje' => 'Se a modificado correctamente', 'titulo' => 'Correcto', 'status' => '1'];
					echo json_encode($arr);
				} else {
					$arr = ['mensaje' => 'Error editando cliente', 'titulo' => 'Error', 'status' => '0'];
					echo json_encode($arr);

				}
			  $this->vista('clientes/agregar', $arr);
			} 
		}
		
	}