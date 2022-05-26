<?php

	class VentasController extends Controller{
		public function __construct(){
			$this->ventaModelo = $this->modelo('Venta');
			$this->detalle_ventaModelo = $this->modelo('Detalle_venta');
			$this->productoModelo = $this->modelo('Producto');
			$this->clienteModelo = $this->modelo('Cliente');
			
		}

		public function index(){

			$lista_venta = $this->ventaModelo->listaVenta();
			


			$datos = ['lista_venta' => $lista_venta];

			$this->vista('ventas/inicio', $datos);
		}

		public function generar_venta(){
			$select_producto = $this->productoModelo->listaSelectProducto();
			$lista_cliente = $this->clienteModelo->listaSelectCliente();
			$select_cliente[0]['id'] = 0;
			$select_cliente[0]['text'] = 'Sin Cliente';
			foreach($lista_cliente as $k => $clien){
				$select_cliente[$k+1]['id'] = $clien['id'];
				$select_cliente[$k+1]['text'] = $clien['text'];
			}
			$datos = ['select_producto' => $select_producto,'select_cliente' => $select_cliente];
		  	$this->vista('ventas/generar_venta', $datos);
			
		}

		public function agregarAlCarrito(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				// exit;
				if (!isset($_POST["id_producto"])) {
	    			return;
				}

				$codigo = $_POST["id_producto"];
				$producto = $this->productoModelo->SelectProducto($codigo);
			
				
				# Si no existe, salimos y lo indicamos
				if (!$producto) {
				    header("Location: ./generar_venta?status=4");
				    exit;
				}
				# Si no hay existencia...
				if ($producto['cantidad'] < 1) {
				    header("Location: ./generar_venta?status=5");
				    exit;
				}
				// session_start();
				# Buscar producto dentro del cartito
				$indice = false;
				for ($i = 0; $i < count($_SESSION['carrito']['producto']); $i++) {
				    if ($_SESSION["carrito"]['producto'][$i]['id_producto'] === $codigo) {
				        $indice = $i;
				        break;
				    }
				}
				# Si no existe, lo agregamos como nuevo
				if ($indice === false) {
				    $producto['cantidad_v'] = 1;

				    $producto['total'] = $producto['precio_venta'];
				    $producto = json_decode(json_encode($producto), true);
				    $_SESSION['carrito']['producto'][] = $producto;
				} else {
					if (!isset($_POST["cant"])) {
	    			 # Si ya existe, se agrega la cantidad
				    # Pero espera, tal vez ya no haya
				    $cantidadExistente = $_SESSION["carrito"]['producto'][$indice]['cantidad_v'];
				    # si al sumarle uno supera lo que existe, no se agrega
				    if ($cantidadExistente + 1 > $producto['cantidad']) {
				        header("Location: ./generar_venta?status=5");
				        exit;
				    }
				    $_SESSION["carrito"]['producto'][$indice]['cantidad_v']++;
				    $_SESSION["carrito"]['producto'][$indice]['total'] = $_SESSION["carrito"]['producto'][$indice]['cantidad_v'] * $_SESSION["carrito"]['producto'][$indice]['precio_venta'];
				} else {
					if ($_POST["cant"] <= 0) {
	    			 # Si ya existe, se agrega la cantidad
				    # Pero espera, tal vez ya no haya
				   
				        header("Location: ./generar_venta?status=5");
				        exit;
				    } else {
				    # si al sumarle uno supera lo que existe, no se agrega
				    if ($_POST["cant"] > $producto['cantidad']) {
				        header("Location: ./generar_venta?status=5");
				        exit;
				    }
				    $_SESSION["carrito"]['producto'][$indice]['cantidad_v']= $_POST["cant"];
				    $_SESSION["carrito"]['producto'][$indice]['total'] = $_SESSION["carrito"]['producto'][$indice]['cantidad_v'] * $_SESSION["carrito"]['producto'][$indice]['precio_venta'];
				    }

				}				   
				}
				header("Location: ./generar_venta");
				}
			}

			public function quitarDelCarrito(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				$indice = $_POST["indice"];
				print_r($indice);
				array_splice($_SESSION["carrito"]['producto'], $indice, 1);
				
				header("Location: ./generar_venta");
				}
			}

			public function cambiarCliente(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				if (!isset($_POST["id_cliente"])) {
	    			return;
				}

				$cliente = $_POST["id_cliente"];
	
				$_SESSION["carrito"]["cliente"] = $cliente;
				
				header("Location: ./generar_venta");
				}
			}

			public function agregarClienteVenta(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				$cliente = [

					'rut_cliente' => $_POST['Nrut_cliente'],
					'nombre_cliente' => $_POST['Nnombre_cliente'],
					'telefono_cliente' => $_POST['Ntelefono_cliente'],
					'direccion_cliente' => $_POST['Ndireccion_cliente'],
					'check_fiado' => $_POST['Ncheck_fiado']
				];
				$cliente = json_decode(json_encode($cliente), true);
				$this->clienteModelo->agregarCliente($cliente);
				$respuesta = $this->clienteModelo->ultimoCliente();
				$idcliente = $respuesta['id_cliente'];
	
				$_SESSION["carrito"]["cliente"] = $idcliente;
				
				header("Location: ./generar_venta");
				}
			}


			public function terminarVenta(){


				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					session_start();
					// exit;

						if(isset($_SESSION['carrito']["cliente"]) && $_SESSION['carrito']["cliente"] != 0){

							$venta = [
								'id_cliente' => $_SESSION['carrito']["cliente"],
								'id_usuario'=> $_SESSION['administrador']['id_usuario'],
								'fecha'=> date("Y-m-d H:i:s"),
								'check_fiado' =>0,
								'fecha_convenio' =>'1000-01-01 00:00:00',
								'total_venta' =>$_SESSION['carrito']["total_venta"] *0.81,
								'total_iva'=> $_SESSION['carrito']["total_venta"] *0.19,
								'total_venta_iva'=> $_SESSION['carrito']["total_venta"] 

							];

						} else {
							$venta = [
								'id_cliente' => 0,
								'id_usuario'=> $_SESSION['administrador']['id_usuario'],
								'fecha'=> date("Y-m-d H:i:s"),
								'check_fiado' =>0,
								'fecha_convenio' =>'1000-01-01 00:00:00',
								'total_venta' =>$_SESSION['carrito']["total_venta"] *0.81,
								'total_iva'=> $_SESSION['carrito']["total_venta"] *0.19,
								'total_venta_iva'=> $_SESSION['carrito']["total_venta"] 

							];
						
							
						}
						$venta = json_decode(json_encode($venta), true);

						$respuesta = $this->ventaModelo->terminarVenta($venta);
						
						if($respuesta == true){
							$respuesta = $this->ventaModelo->ultimaVenta();
							$idVenta = $respuesta['id_venta'];

						}

						foreach ($_SESSION["carrito"]['producto'] as $producto) {
								$this->detalle_ventaModelo->terminarVenta($producto, $idVenta);
								$this->productoModelo->cambiarStock($producto);								
							}
						

					header("Location: ./");
			}

			
		

	}	
	}