<?php
 require RUTA_APP .'/views/inc/header.php';
 require RUTA_APP .'/views/inc/topbar.php';
 require RUTA_APP .'/views/inc/sidebar.php';

 if(!isset($_SESSION["pedido"])) {
    $_SESSION["pedido"] = [];}
$granTotal = 0;?>
<section class="content-wrapper">

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Generar Pedido</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


  
<div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Datos Proveedor
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
                <form  class="panel form-horizontal"  id="datos_comprador" accept-charset="utf-8">
            <div class="form-horizontal text-center">
                <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label">Seleccione un proveedor</label>
                    <div class="col-sm-2 ">
                        <select name="id_proveedor" id="id_proveedor"></select>
                    </div>
                </div>
                
            </div>
        </form>
            </div>
            <!-- /.col-12 -->
           
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
</div>

<div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Añadir Producto
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
                <form  class="panel form-horizontal"  id="Generarmedida2" accept-charset="utf-8" method="post" action="agregarAlPedido">

            <div id="select_rellenar"></div>
                             
                <div>
                    <div class="bg-light text-right">
                        <button type="submit"  class="btn btn-success btn-flat btn-sm ">Añadir Producto</button>
                    </div>
                </div>
        </form>
            </div>
            <hr>

            <div class="card">
                <div class="panel-heading text-center">
                    <span class="panel-title">Lista Productos Agregados</span>
                </div>

              
                <div class="panel-body table-responsive">


                         <!--<table  class="test table table-striped  table-primary table-responsive">-->
                    <table class="test table table-striped " id="tabla_guardar">                        
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>SKU</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php $_SESSION = json_decode(json_encode($_SESSION), true);
                            if(isset($_SESSION['pedido']['producto'])){ foreach($_SESSION['pedido']['producto'] as $indice => $producto){ 
                        $granTotal += $producto['total'];
                    ?>
                <tr>
                    <td><?php echo $indice+1; ?></td>
                    <td><?php echo $producto['sku']; ?></td>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                    <td>
                        <div class="btn-group">
                        <button type="button " class="btn btn-default col-2 menos" id="menos<?php echo $producto['id_producto'] ;?>">
                          <i class="fas fa-minus"></i>
                        </button>
                       <input class="number cant_vent col-2 text-center" disabled id="cantidad_venta<?php echo $producto['id_producto'] ;?>" name="cantidad_venta<?php echo $producto['id_producto'] ;?>" placeholder="" value="<?php echo $producto['cantidad_v']; ?>">
                        </button>
                        <button type="button" class="btn btn-default col-2 mas" id="mas<?php echo $producto['id_producto'] ;?>">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                        </td>
                    <td><a class="btn btn-danger"  onclick="quitar(<?php echo $indice; ?>)"> <input type="hidden" id="quitarid" value="<?php echo $indice; ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card-default color-palette-box">
                    
                    <div class="col-md-4">

                    </div>
                </div>


                <div class="row center-block">

                    <div class="col-md-4">

                    </div>
                    <div class="card card-default color-palette-box">

                       
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>  

                <div class="text-center">
                    <button type="button" id="guarda"  class="disabled btn btn-primary btn-flat btn-lg "><i class="fa fa-hdd-o"></i> Terminar Pedido</button>
                </div>
            </div>
            </div>
            <!-- /.col-12 -->
            <div class="row">
         
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
</section>
    <hr>
    
<?php require RUTA_APP .'/views/inc/footer.php';?>

<script>
    var total_full = <?php echo $granTotal ; ?>;
    $("#Ncheck_fiado").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'))
    });
    $(".mas").on('click', function(){
        var idv = this.id.substr(3, 100);
        var cantidad_venta = parseInt($("#cantidad_venta"+idv).val()) + 1;
            $('#loadinggg').addClass("overlay dark");

       console.log(idv);
       console.log(cantidad_venta);

            var url = "<?php echo  RUTA_URL;?>/ventas/agregarAlCarrito";
            $.ajax({
                type: "POST",
                url: url,
                data: {id_producto: idv, cant: cantidad_venta},
                loading: function () {
                },
                success: function (datos) {//success
                window.location.href = '<?php echo  RUTA_URL;?>/pedidos/generar_pedido';

                }//success
            });
    });
    $("#paga_con").on('keyup', function(){
        var vuelto = parseInt($(this).val()) - parseInt(total_full);
        console.log(vuelto);
        if(vuelto < 0){
            $('#guardar').addClass('disabled');
            $('#text_vuelto').html('$0');
        } else {
            $('#text_vuelto').html('$'+ vuelto);
            $('#guardar').removeClass('disabled');

        }
        
    });
    $(".menos").on('click', function(){
        var idv = this.id.substr(5, 100);
        var cantidad_venta = parseInt($("#cantidad_venta"+idv).val()) - 1;
            $('#loadinggg').addClass("overlay dark");
            var url = "<?php echo  RUTA_URL;?>/ventas/agregarAlCarrito";
            $.ajax({
                type: "POST",
                url: url,
                data: {id_producto: idv, cant: cantidad_venta},
                loading: function () {
                },
                success: function (datos) {//success
                window.location.href = '<?php echo  RUTA_URL;?>/pedidos/generar_pedido';

                }//success
            });
    });
    $("#guardar").on('click', function(){
        var paga = $("#paga_con").val();
        if(paga >= total_full){
            document.getElementById("datos_comprador2").submit();
        } else {
            toastr.error('Por favor verificar con cuanto paga.','Falta Dinero', '4000' );
            $("#paga_con").focus();
        }
        
    });
    function quitar(id){
        var idv = id;
        
            var url = "<?php echo  RUTA_URL;?>/ventas/quitarDelCarrito";
            $.ajax({
                type: "POST",
                url: url,
                data: {indice: idv},
                loading: function () {
                },
                success: function (datos) {//success
                window.location.href = '<?php echo  RUTA_URL;?>/pedidos/generar_pedido';

                }//success
            });
    };

    var count2 = 1;
    var fila_incremental = 1;
    function numero_miles(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
   
// $("#datos_comprador").validate({
        //     rules: {
        //         'nombre_cliente': {required: true},
        //         'fono_cliente': {number: true, required: true, minlength: 9, maxlength: 9},
        //         'correo_cliente': {email: true, required: true, minlength: 6, maxlength: 50},
        //         'username': {required: true}
        //     },
        //     messages: {
        //         'nombre_cliente': {required: "Debe ingresar un nombre .", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."},
        //         'fono_cliente': {required: "Debe ingresar un numero .", number: "Ingrese Solo Numeros.", minlength: "Ingrese un numero de 9 digitos.", maxlength: " Ingrese un numero de 9 digitos."},
        //         'correo_cliente': {required: "Debe ingresar un email de contacto", email: "El email no tiene un formato valido.", minlength: "Mínimo 6 caracteres"},
        //         'username': {required: "Debe ingresar un email de contacto"}
        //     }
        // });
        // $("#Generarmedida2").validate({
        //     rules: {
        //         'ubicacion2': {required: true},
        //         'validar_alto': {number: true, required: true},
        //         'validar_ancho': {number: true, required: true},
        //         'cortina_rev': {required: true},
        //         'opacidad_rev': {required: true},
        //         'color_rev': {required: true},
        //         'tela_rev': {required: true}
        //     },
        //     messages: {
        //         'ubicacion2': {required: "Debe ingresar una ubicación."},
        //         'validar_alto': {required: "Debe ingresar un numero.", number: "Debe ingresar solo numeros.", min: "Debe ingresar una medida mayor o igual a {0}", max: "Debe ingresar una medida menor o igual a {0}"},
        //         'validar_ancho': {required: "Debe ingresar un numero.", number: "Debe ingresar solo numeros.", min: "Debe ingresar una medida mayor o igual a {0}", max: "Debe ingresar una medida menor o igual a {0}"},
        //         'cortina_rev': {required: "Seleccione tipo de cortina."},
        //         'opacidad_rev': {required: "Seleccione una opacidad"},
        //         'color_rev': {required: "Seleccione un color."},
        //         'tela_rev': {required: "Seleccione un tipo de tela."}

        //     }
        // });
        // $("#revisaredit").validate({
        //     rules: {
        //         'anchoedit': {number: true, required: true},
        //         'altoedit': {number: true, required: true, },
        //         'ubicacionedit': {required: true}
        //     },
        //     messages: {
        //         'anchoedit': {required: "Debe ingresar un nombre .", min: "Debe ingresar una medida mayor o igual a {0}", max: "Debe ingresar una medida menor o igual a {0}"},
        //         'altoedit': {required: "Debe ingresar un numero .", number: "Ingrese Solo Numeros.", min: "Debe ingresar una medida mayor o igual a {0}", max: "Debe ingresar una medida menor o igual a {0}"},
        //         'ubicacionedit': {required: "Ingrese una ubicación."},
        //     }
        // });
         var lista_prov = <?php echo json_encode($datos['select_proveedor']); ?>;

        $("#id_proveedor").select2({
            data: lista_prov,
            placeholder:'Seleccione proveedor',
            width: 'resolve'});
        var id_prov_a = <?php if(isset($_SESSION['pedido']['proveedor'])){echo $_SESSION['pedido']['proveedor'];} else {echo 0;} ?>;
        $("#id_proveedor").val(id_prov_a);
        $("#id_proveedor").trigger("change");
        $("#id_proveedor").on("change", function () {
            
            var id = $(this).val();
            
            var url = "<?php echo  RUTA_URL;?>/pedidos/seleccionProveedor";
            $.ajax({
                type: "POST",
                url: url,
                data: {id: id},
                loading: function () {
                },
                success: function (datos) {//success
                    $('#select_rellenar').html(datos);

                }//success
            });
        });
        var lista_prod = <?php echo json_encode($datos['select_producto']); ?>;

        $("#id_producto").prepend('<option selected=""></option>').select2({
            data: lista_prod,
            placeholder:'Seleccione producto',
            width: 'resolve'});

 $( document ).ready(function() {
   

   $("#id_proveedor").trigger("change");

});
    

   

    
</script>

            
    </body>
</html>

