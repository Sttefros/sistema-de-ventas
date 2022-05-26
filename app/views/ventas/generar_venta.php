<?php


 require RUTA_APP .'/views/inc/header.php';
 require RUTA_APP .'/views/inc/topbar.php';
 require RUTA_APP .'/views/inc/sidebar.php';

 if(!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
    $_SESSION["carrito"]['cliente'] = '0';
    }
    // var_dump($_SESSION["carrito"]);
$granTotal = 0;
?>
<section class="content-wrapper">
<?php
            if(isset($_GET["status"])){
                if($_GET["status"] === "1"){
                    ?>
                        <div class="alert alert-success">
                            <strong>¡Correcto!</strong> Venta realizada correctamente
                        </div>
                    <?php
                }else if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>Venta cancelada</strong>
                        </div>
                    <?php
                }else if($_GET["status"] === "3"){
                    ?>
                    <div class="alert alert-info">
                            <strong>Ok</strong> Producto quitado de la lista
                        </div>
                    <?php
                }else if($_GET["status"] === "4"){
                    ?>
                    <div class="alert alert-warning">
                            <strong>Error:</strong> El producto que buscas no existe
                        </div>
                    <?php
                }else if($_GET["status"] === "5"){
                    ?>
                    <div class="alert alert-danger">
                            <strong>Error: </strong>El producto está agotado
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger">
                            <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                        </div>
                    <?php
                }
            }
        ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Generar Venta</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


 <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Cliente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Nuevo Cliente</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Datos Cliente
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
                <form  class="panel form-horizontal"  id="datos_comprador2" accept-charset="utf-8" method="post" action="terminarVenta">
            <div class="form-horizontal text-center">
                <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label">Rut</label>
                    <div class="col-sm-2 ">
                        <select name="id_cliente" id="id_cliente"></select>
                    </div>
                </div>
                
            </div>
        </form>
            </div>
            <!-- /.col-12 -->
           
            <!-- /.row -->
          </div>                     
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                   
                   <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Nuevo Cliente
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
                <form  class="panel form-horizontal"  id="datos_comprador" accept-charset="utf-8" method="post" action="agregarClienteVenta">
            <div class="form-horizontal text-center">
                <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Rut</label>
                    <div class="col-sm-4 ">
                            <input type="text" class="form-control" id="Nrut_cliente" name="Nrut_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Nombre</label>
                    <div class="col-sm-4 ">
                            <input class="form-control" id="Nnombre_cliente" name="Nnombre_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Telefono</label>
                    <div class="col-sm-4 ">
                            <input class="form-control" type="number" id="Ntelefono_cliente" name="Ntelefono_cliente" placeholder="" >
                        </div>            
                    </div>

                    <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Dirección</label>
                    <div class="col-sm-4 ">
                            <input type="text" class="form-control" id="Ndireccion_cliente" name="Ndireccion_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right" >Fiado</label>
                    <div class="col-sm-4 text-left">
                            <input type="checkbox" class="form-control " id="Ncheck_fiado" name="Ncheck_fiado" placeholder="" data-off-text="NO" data-on-text="SI" >
                        </div>            
                    </div>

                <hr>
                    <button type="submit" class="btn btn-block btn-primary btn-flat">Primary</button>
        </form>
            </div>
            <!-- /.col-12 -->
           
            <!-- /.row -->
          </div>

                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div> 


<div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Añadir Producto
            </h3>
          </div>
          <div class="card-body overlay-wrapper" >
            <div class="col-12">
                <form  class="panel form-horizontal"  id="Generarmedida2" accept-charset="utf-8" method="post" action="agregarAlCarrito">

            
                <div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Producto</label>
                    <div class="col-sm-4 ">
                        <select name="id_producto" id="id_producto" ></select>
                        <!-- <select class="select2" id="id_producto" name="id_producto" placeholder="Seleccione producto"></select> -->
                    </div>
                </div>                
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
                                <th>Precio Venta</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php $_SESSION = json_decode(json_encode($_SESSION), true);
                            if(isset($_SESSION['carrito']['producto'])){ foreach($_SESSION['carrito']['producto'] as $indice => $producto){ 
                        $granTotal += $producto['total'];
                    ?>
                <tr>
                    <td><?php echo $indice+1; ?></td>
                    <td><?php echo $producto['sku']; ?></td>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                    <td><?php echo $producto['precio_venta']; ?></td>
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
                    <td><?php echo $producto['total']; ?></td>
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

                        <table class="table table-borderless table-responsive-sm">
                            <tbody>
                                <tr>
                                    <td><h4>Precio :</h4><input id="precio" class="oculto" type="hidden" name="precio_total" value="0"><input id="precio_accesorios" class="oculto" type="hidden" name="precio_accesorios_total" value="0"></td>
                                    <td><h4><span id="text_precio_total"> $<?php echo $granTotal* 0.81 ;?></span></h4></td>
                                </tr>
                               <tr>
                                    <td><h4>IVA :</h4></td>
                                    <td><h4><span id="text_iva">$<?php echo $granTotal * 0.19 ;?></span></h4></td>
                                </tr>
                                <tr>
                                    <td><h3>Precio Final + IVA :</h3><input id="precio_final" class="oculto" type="hidden" name="precio_final" value="0"></td>
                                    <td><h3><span id="text_precio_final">$ <?php echo $granTotal ; $_SESSION['carrito']['total_venta'] = $granTotal ;?></span></h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Paga con :</h3><input id="precio_final" class="oculto" type="hidden" name="precio_final" value="0"></td>
                                    <td><h3><input type="number" class="form-control" name="" id="paga_con"></h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Vuelto :</h3><input id="precio_final" class="oculto" type="hidden" name="precio_final" value="0"></td>
                                    <td><h3><span id="text_vuelto">$0</span></h3></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>  

                <div class="text-center">
                    <button type="button" id="guardar" class=" btn btn-primary btn-flat btn-lg "><i class="fa fa-hdd-o"></i> Terminar venta</button>
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
                window.location.href = '<?php echo  RUTA_URL;?>/ventas/generar_venta';

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
                window.location.href = '<?php echo  RUTA_URL;?>/ventas/generar_venta';

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
                window.location.href = '<?php echo  RUTA_URL;?>/ventas/generar_venta';

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
        var lista_cli = <?php echo json_encode($datos['select_cliente']); ?>;

        $("#id_cliente").select2({
            data: lista_cli,
            placeholder:'Seleccione Cliente',
            width: 'resolve'});
        var id_cliente_a = <?php if(isset($_SESSION['carrito']['cliente'])){echo $_SESSION['carrito']['cliente'];} else {echo 0;} ?>;
        $("#id_cliente").val(id_cliente_a);
        $("#id_cliente").trigger("change");
        $("#id_cliente").on("change", function () {
            var id = $(this).val();
            if(id != id_cliente_a){
            var url = "<?php echo  RUTA_URL;?>/ventas/cambiarCliente";
            $.ajax({
                type: "POST",
                url: url,
                data: {id_cliente: id},
                loading: function () {
                },
                success: function (datos) {//success
                    window.location.href = '<?php echo  RUTA_URL;?>/ventas/generar_venta';

                }//success
            });}
        });
        var lista_prod = <?php echo json_encode($datos['select_producto']); ?>;

        $("#id_producto").prepend('<option selected=""></option>').select2({
            data: lista_prod,
            placeholder:'Seleccione producto',
            width: 'resolve'}).on("change", function () {
            $('#loadinggg').addClass("overlay dark");


    
            var id = $(this).val();
            var url = "/luvetec/cotizaciones/tipo_tela";
            // $.ajax({
            //     type: "POST",
            //     url: url,
            //     data: {id: id},
            //     loading: function () {
            //     },
            //     success: function (datos) {//success
            //         $("#lista_telas").html("");
            //         $("#lista_telas").html(datos);
            //         $("#telas_div").removeAttr('hidden');
            //         $("#color_div").attr('hidden', 'hidden');
            //         $("#opacidad_div").attr('hidden', 'hidden');
            //         $('#opacidad').val(null).trigger('change');
            //         $("#ancho_div").attr('hidden', 'hidden');
            //         $("#ancho").val('');
            //         $("#alto_div").attr('hidden', 'hidden');
            //         $("#alto").val('');
            //         $("#telas_div").removeAttr('hidden');
            //         LoadHideCacl('toodo2');
            //     }//success
            // });
        });

 
    
</script>

            
    </body>
</html>

