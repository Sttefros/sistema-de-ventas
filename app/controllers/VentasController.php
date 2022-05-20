<?php

	class VentasController extends Controller{
		public function __construct(){
			$this->ventaModelo = $this->modelo('Venta');
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
			$select_cliente = $this->clienteModelo->listaSelectCliente();
			$datos = ['select_producto' => $select_producto,'select_cliente' => $select_cliente];
		  	$this->vista('ventas/generar_venta', $datos);
			
		}

		public function agregarAlCarrito(){
			// $_SESSION = json_decode(json_encode($_SESSION), true);
			session_start();
			var_dump($_SESSION);
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
			for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
			    if ($_SESSION["carrito"][$i]['id_producto'] === $codigo) {
			        $indice = $i;
			        break;
			    }
			}
			# Si no existe, lo agregamos como nuevo
			if ($indice === false) {
			    $producto['cantidad_v'] = 1;

			    $producto['total'] = $producto['precio_venta'];
			    $producto = json_decode(json_encode($producto), true);
			    array_push($_SESSION["carrito"], $producto);
			} else {
			    # Si ya existe, se agrega la cantidad
			    # Pero espera, tal vez ya no haya
			    $cantidadExistente = $_SESSION["carrito"][$indice]['cantidad_v'];
			    # si al sumarle uno supera lo que existe, no se agrega
			    if ($cantidadExistente + 1 > $producto['cantidad']) {
			        header("Location: ./generar_venta?status=5");
			        exit;
			    }
			    $_SESSION["carrito"][$indice]['cantidad_v']++;
			    $_SESSION["carrito"][$indice]['total'] = $_SESSION["carrito"][$indice]['cantidad_v'] * $_SESSION["carrito"][$indice]['precio_venta'];
			}
			header("Location: ./generar_venta");

			
		}

		
	}