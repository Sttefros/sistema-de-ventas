<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
 <?php  foreach ($datos['lista_venta'] as $k => $vent){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_venta<?php echo $k;?>" name="id_venta<?php echo $k;?>" value="<?php echo $vent['id_venta'];?>">
                    <input type="hidden" class="hidden" id="tipo_pago<?php echo $k;?>" name="tipo_pago<?php echo $k;?>" value="<?php echo $vent['tipo_pago'];?>">
                    <input type="hidden" class="hidden" id="fecha<?php echo $k;?>" name="fecha<?php echo $k;?>" value="<?php echo $vent['fecha'];?>">
                    <input type="hidden" class="hidden" id="id_usuario<?php echo $k;?>" name="id_usuario<?php echo $k;?>" value="<?php echo $vent['id_usuario'];?>">
                    <input type="hidden" class="hidden" id="id_cliente<?php echo $k;?>" name="id_cliente<?php echo $k;?>" value="<?php echo $vent['id_cliente'];?>">
                    <input type="hidden" class="hidden" id="check_fiado<?php echo $k;?>" name="check_fiado<?php echo $k;?>" value="<?php echo $vent['check_fiado'];?>">
                    <input type="hidden" class="hidden" id="fecha_convenio<?php echo $k;?>" name="fecha_convenio<?php echo $k;?>" value="<?php echo $vent['fecha_convenio'];?>">
                    <input type="hidden" class="hidden" id="total_venta<?php echo $k;?>" name="total_venta<?php echo $k;?>" value="<?php echo $vent['total_venta'];?>">
                    <input type="hidden" class="hidden" id="total_iva<?php echo $k;?>" name="total_iva<?php echo $k;?>" value="<?php echo $vent['total_iva'];?>">
                    <input type="hidden" class="hidden" id="total_venta_iva<?php echo $k;?>" name="total_venta_iva<?php echo $k;?>" value="<?php echo $vent['total_venta_iva'];?>">

                
                </div>
                           <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista Ventas</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nueva_venta"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nueva Venta</button>
    <div class="container-fluid row mb-2">
        <div  class="table table-responsive">
        <table  id="table_user" class="table table-bordered table-striped dt-responsive">
            <thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">Fecha</th>
                <th colspan="1">Tipo Pago</th>
                <th colspan="1">Vendedor</th>
                <th colspan="1">Cliente</th>
                <th colspan="1">Fiado</th>
                <th colspan="1">Total Venta</th>
                <th colspan="1">opciones</th>
            </thead>
            <tbody>
             <?php  foreach ($datos['lista_venta'] as $k => $vent){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $k+1;?></td>
                <td colspan="1"><?php echo date("d-m-Y", strtotime($vent['fecha']));?></td>
                <td colspan="1"><?php if ($vent['tipo_pago'] == 1){echo 'Efectivo';} else{ echo 'Fiado';}?></td>
                <td colspan="1"><?php echo $vent['nombre_usuario'];?></td>
                <td colspan="1"><?php if($vent['id_cliente'] != null && $vent['id_cliente'] != 0){ echo $vent['nombre_cliente']; }else { echo 'Sin Cliente';} ?></td>
                <td colspan="1"><?php if($vent['check_fiado'] == 1){echo '<i class="fa fa-check-square text-success" aria-hidden="true"></i>
'; } else { echo '<i class="fa fa-window-close text-danger" aria-hidden="true"></i>
';} ?></td>
                <td colspan="1"><?php echo '$'.$vent['total_venta_iva'];?></td>
                <td colspan="1">
                  </div>
                      
                        <a onclick="detalle_venta(<?php echo $vent['id_venta']; ?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="detalle"><i class="fa fa-pen"></i></a>
                    </div>
                  </td>
              </tr>
             
          <?php } ?>
            </tbody>
              <tfoot>
              
              </tr>
              </tfoot>
        </table>
    </div>
        </div>
    </section>

          
</div>

<?php require RUTA_APP .'/views/inc/usersidebar.php';?>
 
 
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalle Venta</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div id="rellenar" >
                      </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>

          </div>
        </div>
      </div>
    </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
   function limpiarForm(idForm) {
        var vali = $("#" + idForm).validate();
        vali.resetForm();
        vali.reset();
        $("#" + idForm).trigger('reset');
        $("#" + idForm + " .form-group").removeClass('has-error');
    }

$("#nueva_venta").click(function () {
    <?php if(isset($_SESSION['carrito'])) { $_SESSION['carrito'] = []; }?>
window.location.href = " <?php echo  RUTA_URL;?>/ventas/generar_venta";
          });

  $("#add_prod").click(function () {
    
  
    
            if ($("#valid_prod").valid()) {
                $("#loading_modal").modal({
                    
                });
                $("#myModal").modal('hide');
                var sku = $("#sku").val();
                var nombre_producto = $("#nombre_producto").val();
                var id_prod_tipo = $("#id_prod_tipo").val();
                var id_proveedor = $("#id_proveedor").val();
                var cantidad = $("#cantidad").val();
                var precio_venta = $("#precio_venta").val();
                var sku = $("#sku").val();
                var descripcion_producto = $("#descripcion_producto").val();
                var url = "<?php echo  RUTA_URL;?>/productos/agregar";
                 $.ajax({
                     type: "POST",
                     url: url,
                     data: {sku: sku, nombre_producto: nombre_producto, id_proveedor:id_proveedor,id_prod_tipo:id_prod_tipo,cantidad:cantidad,precio_venta:precio_venta,descripcion_producto:descripcion_producto},
                     success: function (data) {
                          console.log('Correctoooo');
                           setTimeout(function(){
                             $("#loading_modal").modal('hide');
                          } , 900);  
                           if (data.status == 1) {
                             toastr.success(data.mensaje,data.titulo, '4000' );

                           } else {
                             toastr.error(data.mensaje,data.titulo, '4000' );
                             console.log(data);

                           }

                            setTimeout(function(){
                              window.location.href = '<?php echo  RUTA_URL;?>/productos/';
                            }, 2500);               
                     }
                 });
            }
        });
  $("#edit_prod").click(function () {
    
  
    
            if ($("#Evalid_prod").valid()) {
                $("#loading_modal").modal({
                    
                });
                $("#ModalEditar").modal('hide');
                var id_producto = $("#Eid_producto").val();
                var sku = $("#Esku").val();
                var nombre_producto = $("#Enombre_producto").val();
                var id_prod_tipo = $("#Eid_prod_tipo").val();
                var id_proveedor = $("#Eid_proveedor").val();
                var cantidad = $("#Ecantidad").val();
                var precio_venta = $("#Eprecio_venta").val();
                var sku = $("#Esku").val();
                var descripcion_producto = $("#Edescripcion_producto").val();
                var url = "<?php echo  RUTA_URL;?>/productos/editar";
                 $.ajax({
                     type: "POST",
                     url: url,
                     data: {id_producto: id_producto,sku: sku, nombre_producto: nombre_producto, id_proveedor:id_proveedor,id_prod_tipo:id_prod_tipo,cantidad:cantidad,precio_venta:precio_venta,descripcion_producto:descripcion_producto},
                     success: function (data) {
                          console.log('Correctoooo');
                           setTimeout(function(){
                             $("#loading_modal").modal('hide');
                          } , 900);  
                           if (data.status == 1) {
                             toastr.success(data.mensaje,data.titulo, '4000' );

                           } else {
                             toastr.error(data.mensaje,data.titulo, '4000' );
                             console.log(data);

                           }

                            setTimeout(function(){
                              window.location.href = '<?php echo  RUTA_URL;?>/productos/';
                            }, 2500);               
                     }
                 });
            }
        });


  $("#confirmar_eliminar").click(function () {
    
                $("#loading_modal").modal({
                    
                });
                $("#ModalEliminar").modal('hide');
                var id_eliminar = $("#id_eliminar").val();

                var url = "<?php echo  RUTA_URL;?>/productos/eliminar";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {id: id_eliminar},
                    success: function (data) {
                          
                          setTimeout(function(){
                            $("#loading_modal").modal('hide');
                          }, 900);  
                          if (data.status == 1) {
                            toastr.success(data.mensaje,data.titulo, '4000' );

                          } else {
                            toastr.error(data.mensaje,data.titulo, '4000' );
                          }

                          setTimeout(function(){
                            window.location.href = '<?php echo  RUTA_URL;?>/productos/';
                          }, 2500);               
                    }
                });
            
        });

    $("#valid_prod").validate({
            rules: {
                nombre_producto: {required: true, minlength: 4, maxlength: 50},
                id_prod_tipo: {required: true},
                id_proveedor: {required: true},
                cantidad: {required: true, min: 1},
                precio_venta: {required: true, min: 1}

            },
            messages: {
                nombre_producto: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres.", maxlength: " Máximo 50 caracteres."},
                id_prod_tipo: {required: "Debe seleccionar un tipo de producto."},
                id_proveedor: {required: "Debe seleccionar un proveedor."},
                cantidad: {required: "Debe ingresar al menos 1 producto.", min: "Mínimo 1 producto."},
                precio_venta: {required: "Debe valer al menos 1 peso.", min: "Mínimo 1 peso."}
            }
        });

    $("#Evalid_prod").validate({
            rules: {
                Enombre_producto: {required: true, minlength: 4, maxlength: 50},
                Eid_prod_tipo: {required: true},
                Eid_proveedor: {required: true},
                Ecantidad: {required: true, min: 1},
                Eprecio_venta: {required: true, min: 1}

            },
            messages: {
                Enombre_producto: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres.", maxlength: " Máximo 50 caracteres."},
                Eid_prod_tipo: {required: "Debe seleccionar un tipo de producto."},
                Eid_proveedor: {required: "Debe seleccionar un proveedor."},
                Ecantidad: {required: "Debe ingresar al menos 1 producto.", min: "Mínimo 1 producto."},
                Eprecio_venta: {required: "Debe valer al menos 1 peso.", min: "Mínimo 1 peso."}
            }
        });


    function detalle_venta(id_prod) {
        var id_eliminar = id_prod;

                var url = "<?php echo  RUTA_URL;?>/ventas/detalle_venta";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {id: id_eliminar},
                    success: function (data) {
                        console.log(data);
                         $('#rellenar').html(data);
                         $('#myModal').modal();
   
                    }
                });
    }
    function editar(key) {
        console.log(key);
        $("#Eid_producto").val($("#id_producto"+key).val());
        console.log($("#id_producto"+key).val());
        $("#Enombre_producto").val($("#nombre_producto"+key).val());
        $("#Eid_prod_tipo").val($("#id_prod_tipo"+key).val()).trigger('change');
        $("#Eid_proveedor").val($("#id_proveedor"+key).val()).trigger('change');
        $("#Ecantidad").val($("#cantidad"+key).val());
        $("#Eprecio_venta").val($("#precio_venta"+key).val());
        $("#Esku").val($("#sku"+key).val());
        $("#Edescripcion_producto").val($("#descripcion_producto"+key).val());
        $("#ModalEditar").modal({
                keyboard: false
            });
    }
        
   
  $(document).ready(function() {




    var a = $('#table_user').dataTable({
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                responsive: true,
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        $('#table_user_wrapper .table-caption').text('Usuarios');
        $('#table_user_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

    
 
} );
</script>


</body>
</html>