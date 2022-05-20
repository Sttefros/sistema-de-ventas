<?php


 require RUTA_APP .'/views/inc/header.php';
 require RUTA_APP .'/views/inc/topbar.php';
 require RUTA_APP .'/views/inc/sidebar.php';

 if(!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];}
$granTotal = 0;?>
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


  
<div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Datos Cliente
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
                <form  class="panel form-horizontal"  id="datos_comprador" accept-charset="utf-8">
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
                           <?php $_SESSION = json_decode(json_encode($_SESSION), true); foreach($_SESSION["carrito"] as $indice => $producto){ 
                        $granTotal += $producto['total'];
                    ?>
                <tr>
                    <td><?php echo $indice+1; ?></td>
                    <td><?php echo $producto['sku']; ?></td>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                    <td><?php echo $producto['precio_venta']; ?></td>
                    <td><?php echo $producto['cantidad_v']; ?></td>
                    <td><?php echo $producto['total']; ?></td>
                    <td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
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
                                    <td><h3><span id="text_precio_final">$ <?php echo $granTotal ;?></span></h3></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>  

                <div class="text-center">
                    <button type="button" id="guarda"  class="disabled btn btn-primary btn-flat btn-lg "><i class="fa fa-hdd-o"></i> Terminar venta</button>
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
    var count2 = 1;
    var fila_incremental = 1;
    function numero_miles(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function precio_general() {
        var precio_general = 0;
        var cantidad_elementos = 0;
        $('.precios').each(function () {
            var precio_vuelta = parseInt($(this).val());
            precio_general = precio_general + precio_vuelta;
            cantidad_elementos++;
        });
        var precio_accesorios = 0;
        $('.accesorio_extras_precio').each(function () {
            var precio_vuelta2 = parseInt($(this).val());
            precio_accesorios += precio_vuelta2;
        });
        $('#cantidad_cortinas').text(cantidad_elementos);
        $('#monto_instalacion_text').text('$ ' + numero_miles(cantidad_elementos * $('#monto_instalacion_cu').val()));
        $('#monto_instalacion').val(cantidad_elementos * $('#monto_instalacion_cu').val());

        $('#text_precio_total').text('$ ' + numero_miles(precio_general + precio_accesorios));
        $('#precio').val(precio_general);
        $('#precio_accesorios').val(precio_accesorios);
    }
    function precio_descuento() {
        var precio_adicional = 0;
        var precio_general = $('#precio').val();
        var descuento = $('#precio_descuento').val() / 100;
        var precio_instalacion = $('#monto_instalacion').val();
        $('.precio-adicional').each(function () {
            var precio_vuelta2 = parseInt($(this).val());
            precio_adicional += precio_vuelta2;
        });
        var precio_accesorios = 0;
        $('.accesorio_extras_precio').each(function () {
            var precio_vuelta2 = parseInt($(this).val());
            precio_accesorios += precio_vuelta2;
        });
        var precio_descuento = Math.round(((parseInt(precio_general) + parseInt(precio_adicional)) * descuento));

        var precio_final = Math.round((parseInt(precio_general) + parseInt(precio_adicional) - parseInt(precio_descuento) + parseInt(precio_instalacion) + parseInt(precio_accesorios)) * 1.19);
        var precio_final_no_iva = Math.round(parseInt(precio_general) + parseInt(precio_adicional) - parseInt(precio_descuento) + parseInt(precio_instalacion) + parseInt(precio_accesorios));
        $('#precio_final').val(precio_final_no_iva);
        $('#text_iva').text('$ ' + numero_miles(precio_final - precio_final_no_iva));
        $('#text_precio_final').text('$ ' + numero_miles(precio_final));
        $('#text_descuento').text('$ ' + numero_miles(parseInt(precio_descuento)));
    }
   
        
       
    function eliminarRow(row) {
        $('.minusbtn').tooltip('destroy');
        if ($(".test >tbody >tr").length == 1) {
            $('.test').addClass('hidden');
            $('#menTabla').removeClass('hidden');
            $('#guarda').addClass('disabled');
        }
        $("#tr" + row).hide(350, function () {
            $("#tr" + row).remove();
            precio_general();
            precio_descuento();
            var numero_fila = 1;
            $('.fila_numero').each(function () {
                $(this).text(numero_fila);
                numero_fila += 1;
            });
        });
        $('[rel=tooltip]').tooltip({container: 'body'});
    }


    
   
    function editarRow(row) {
        var ancho = $('#ancho' + row).val();
        var ancho_min = $('#ancho_min' + row).val();
        var ancho_max = $('#ancho_max' + row).val();
        var alto = $('#alto' + row).val();
        var alto_min = $('#alto_min' + row).val();
        var alto_max = $('#alto_max' + row).val();
        var ubicacion = $('#ubicacion' + row).val();
        $('#anchoedit').val(ancho);
        $('#anchoedit').attr('min', ancho_min);
        $('#anchoedit').attr('max', ancho_max);
        $('#altoedit').val(alto);
        $('#altoedit').attr('min', alto_min);
        $('#altoedit').attr('max', alto_max);
        $('#ubicacionedit').val(ubicacion);
        $('#filaedit').val(row);
        $("#myModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }
    function buscar(row) {

        $('#alerta').hide();
        var index = $(row).parent().parent().index();
        $("#identificador").val(index);
        $("#myModal").modal({
            backdrop: 'static',
            keyboard: false
        });
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

        $("#id_cliente").prepend('<option selected=""></option>').select2({
            data: lista_cli,
            placeholder:'Seleccione Cliente',
            width: 'resolve'}).on("change", function () {

        });
        var lista_prod = <?php echo json_encode($datos['select_producto']); ?>;

        $("#id_producto").prepend('<option selected=""></option>').select2({
            data: lista_prod,
            placeholder:'Seleccione producto',
            width: 'resolve'}).on("change", function () {


    
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

