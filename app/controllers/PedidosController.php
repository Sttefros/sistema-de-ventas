<?php

	class PedidosController extends Controller{
		public function __construct(){
			$this->pedidoModelo = $this->modelo('Pedido');
			$this->productoModelo = $this->modelo('Producto');
			$this->proveedorModelo = $this->modelo('Proveedor');
			
		}

		public function index(){

			$lista_pedido = $this->pedidoModelo->listarPedido();
			


			$datos = ['lista_pedido' => $lista_pedido];

			$this->vista('pedidos/inicio', $datos);
		}

		public function generar_pedido(){
			$select_producto = $this->productoModelo->listaSelectProducto();
			$select_proveedor = $this->proveedorModelo->listaSelectProveedor();
			$datos = ['select_producto' => $select_producto,'select_proveedor' => $select_proveedor];
		  	$this->vista('pedidos/generar_pedido', $datos);
			
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

		public function seleccionProveedor(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$id = $_POST['id'];
				$datos = ['listaproductos' => $this->productoModelo->SelectProductoProveedor($id)]  ;
				$datos = json_decode(json_encode($datos), true);
				$this->vista('pedidos/seleccionProveedor',$datos);
			}
		}
		
	}