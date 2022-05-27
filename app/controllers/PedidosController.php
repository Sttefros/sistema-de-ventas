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

		public function agregarAlPedido(){
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
				    header("Location: ./generar_pedido?status=4");
				    exit;
				}
				# Si no hay existencia...
				if ($producto['cantidad'] < 1) {
				    header("Location: ./generar_pedido?status=5");
				    exit;
				}
				// session_start();
				# Buscar producto dentro del cartito
				$indice = false;
				for ($i = 0; $i < count($_SESSION['pedido']['producto']); $i++) {
				    if ($_SESSION['pedido']['producto'][$i]['id_producto'] === $codigo) {
				        $indice = $i;
				        break;
				    }
				}
				# Si no existe, lo agregamos como nuevo
				if ($indice === false) {
				    $producto['cantidad_v'] = 1;

				    $producto['total'] = $producto['precio_venta'];
				    $producto = json_decode(json_encode($producto), true);
				    $_SESSION['pedido']['producto'][] = $producto;
				} else {
					if (!isset($_POST["cant"])) {
	    			 # Si ya existe, se agrega la cantidad
				    # Pero espera, tal vez ya no haya
				    $cantidadExistente = $_SESSION['pedido']['producto'][$indice]['cantidad_v'];				   
				    $_SESSION['pedido']['producto'][$indice]['cantidad_v']++;
				} else {
					if ($_POST["cant"] <= 0) {
	    			 # Si ya existe, se agrega la cantidad
				    # Pero espera, tal vez ya no haya
				   
				        header("Location: ./generar_pedido?status=5");
				        exit;
				    } else {
						$_SESSION['pedido']['producto'][$indice]['cantidad_v']= $_POST["cant"];
				    }

				}				   
				}
				header("Location: ./generar_pedido");
				}

			
		}

		public function seleccionProveedor(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();

				$id = $_POST['id'];
				$_SESSION['pedido']['proveedor'] = $id;
				$datos = ['listaproductos' => $this->productoModelo->SelectProductoProveedor($id)]  ;
				$datos = json_decode(json_encode($datos), true);
				$this->vista('pedidos/seleccionProveedor',$datos);
			}
		}
		
		public function terminarPedido(){


			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				session_start();
				// var_dump($_SESSION);
				// exit;

					if(isset($_SESSION['pedido']['producto']) ){

						$venta = [
							'id_proveedor' => $_SESSION['pedido']["proveedor"],
							'fecha_pedido'=> date("Y-m-d H:i:s"),
							'fecha_entrega'=> '1000-01-01 00:00:00',
							'estado_entrega' =>0,
							'cant_producto' =>$_SESSION['pedido']['cantidad_total'],
							'precio_total_orden' => 0

						];



					} else {
						
						header("Location: ./generar_pedido");
						
					}
					$venta = json_decode(json_encode($venta), true);

					$respuesta = $this->pedidoModelo->terminarPedido($venta);
					
					if($respuesta == true){
						$respuesta = $this->pedidoModelo->ultimoPedido();
						$idpedido = $respuesta['id_orde_pedido'];

					}
					$_SESSION["pedido"]['producto'] = json_decode(json_encode($_SESSION["pedido"]['producto']), true);
					$_SESSION["pedido"]['producto'] = $venta;
							
					

				header("Location: ./");
		}

		
	

}	
		
}