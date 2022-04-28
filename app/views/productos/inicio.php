<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
<?php  foreach ($datos['lista_producto'] as $k => $prod){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_producto<?php echo $k;?>" name="id_producto<?php echo $k;?>" value="<?php echo $prod['id_producto'];?>">
                    <input type="hidden" class="hidden" id="id_prod_tipo<?php echo $k;?>" name="id_prod_tipo<?php echo $k;?>" value="<?php echo $prod['id_prod_tipo'];?>">
                    <input type="hidden" class="hidden" id="id_proveedor<?php echo $k;?>" name="id_proveedor<?php echo $k;?>" value="<?php echo $prod['id_proveedor'];?>">
                    <input type="hidden" class="hidden" id="sku<?php echo $k;?>" name="sku<?php echo $k;?>" value="<?php echo $prod['sku'];?>">
                    <input type="hidden" class="hidden" id="nombre_producto<?php echo $k;?>" name="nombre_producto<?php echo $k;?>" value="<?php echo $prod['nombre_producto'];?>">
                    <input type="hidden" class="hidden" id="precio_venta<?php echo $k;?>" name="precio_venta<?php echo $k;?>" value="<?php echo $prod['precio_venta'];?>">
                    <input type="hidden" class="hidden" id="descripcion_producto<?php echo $k;?>" name="descripcion_producto<?php echo $k;?>" value="<?php echo $prod['descripcion_producto'];?>">
                    <input type="hidden" class="hidden" id="cantidad<?php echo $k;?>" name="cantidad<?php echo $k;?>" value="<?php echo $prod['cantidad'];?>">
                    <input type="hidden" class="hidden" id="nombre_proveedor<?php echo $k;?>" name="nombre_proveedor<?php echo $k;?>" value="<?php echo $prod['nombre_proveedor'];?>">
                    <input type="hidden" class="hidden" id="nombre_prod_tipo<?php echo $k;?>" name="nombre_prod_tipo<?php echo $k;?>" value="<?php echo $prod['nombre_prod_tipo'];?>">

                
                </div>
                          <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Productos</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nueva_prod"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Producto</button>
	<div class="container-fluid row mb-2">
		<div  class="table table-responsive">
		<table  id="table_user" class="table table-bordered table-striped">
      		<thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">Tipo</th>
                <th colspan="1">nombre</th>
                <th colspan="1">Proveedor</th>
                <th colspan="1">Cantidad</th>
                <th colspan="1">Precio Venta</th>
                <th colspan="1">opciones</th>
              </tr>
          	</thead>
          	<tbody>
             <?php  foreach ($datos['lista_producto'] as $k => $prod){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $k+1;?></td>
                <td colspan="1"><?php echo $prod['nombre_prod_tipo'];?></td>
                <td colspan="1"><?php echo $prod['nombre_producto'];?></td>
                <td colspan="1"><?php echo $prod['nombre_proveedor'];?></td>
                <td colspan="1"><?php echo $prod['cantidad'];?></td>
                <td colspan="1"><?php echo '$'.$prod['precio_venta'];?></td>
                <td colspan="1">
                  </div>
                      
                        <a onclick="editar(<?php echo $k;?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="Editar"><i class="fa fa-pen"></i></a>
                        
                        <a onclick="borrar(<?php echo $prod['id_producto'];?>, '<?php echo $prod['nombre_producto'];?>')" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-danger  btn-outline" data-original-title="Borrar Usuario"><i class="fa fa-trash"></i></a>
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
              <h4 class="modal-title">Agregar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="valid_prod">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">SKU</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Tipo Producto</label>

                        <div class="col-sm-9">
                            <select class="form-control select2" id="id_prod_tipo" name="id_prod_tipo" placeholder="" ></select>
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Proveedor</label>

                        <div class="col-sm-9">
                            <select class="select2" id="id_proveedor" name="id_proveedor" placeholder="" ></select>
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Cantidad</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Precio Venta</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Descripción Producto</label><sup>Opcional</sup>

                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="" ></textarea>
                        </div>            
                    </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="add_prod"  class="btn btn-primary">Guardar</button> 
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="Evalid_prod">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">SKU</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Esku" name="Esku" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Enombre_producto" name="Enombre_producto" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Tipo Producto</label>

                        <div class="col-sm-9">
                            <select class="form-control select2" id="Eid_prod_tipo" name="Eid_prod_tipo" placeholder="" ></select>
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Proveedor</label>

                        <div class="col-sm-9">
                            <select class="select2" id="Eid_proveedor" name="Eid_proveedor" placeholder="" ></select>
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Cantidad</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="Ecantidad" name="Ecantidad" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Precio Venta</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="Eprecio_venta" name="Eprecio_venta" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Descripción Producto</label><sup>Opcional</sup>

                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="Edescripcion_producto" name="Edescripcion_producto" placeholder="" ></textarea>
                        </div>            
                    </div>
                    <input type="hidden" class="form-control" id="Eid_producto" name="Eid_producto" placeholder="" >

            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="edit_prod"  class="btn btn-primary">Guardar</button> 
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="loading_modal" class="modal fade">
    <div id="load" class="modal-dialog">
        <div class="panel-body">
            <label class="text-primary">Cargando. Por favor espere unos segundos...</label>
            <div class="progress progress-striped active progress-lg" style="height:25px"><div class="progress-bar progress-bar-warning" style="width: 69%;"></div></div>
        </div>
    </div>
</div>
<div id="ModalEliminar" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
<i class="fa fa-exclamation-circle fa-6" aria-hidden="true"></i>
        </div>            
        <h4 class="modal-title w-100">Estas Seguro?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p id="rellenar"></p>
            <input type="hidden" class="form-control" id="id_eliminar" name="id_eliminar" placeholder="" >

      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmar_eliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>  
    
<?php require RUTA_APP .'/views/inc/footer.php';?>
<script>
   function limpiarForm(idForm) {
        var vali = $("#" + idForm).validate();
        vali.resetForm();
        vali.reset();
        $("#" + idForm).trigger('reset');
        $("#" + idForm + " .form-group").removeClass('has-error');
    }

$("#nueva_prod").click(function () {

            limpiarForm('valid_prod');
            
            
            $("#myModal").modal({
                keyboard: false
            });
            setTimeout(function () {

                $('#nombre_producto').focus();

            }, 500); });

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


    function borrar(id_prod, nombre) {
        $('#rellenar').html('seguro quieres eliminar el producto: <b>'+ nombre +'</b>?');
        $('#id_eliminar').val(id_prod);
        $('#ModalEliminar').modal();
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
        
    var lista_prov = <?php echo json_encode($datos['lista_proveedor']) ; ?>;
    $("#id_proveedor").select2({
    data: lista_prov

    })
    $("#Eid_proveedor").select2({
    data: lista_prov

    });
    var lista_prod_tipo = <?php echo json_encode($datos['lista_prod_tipo']) ; ?>;
    $("#id_prod_tipo").select2({
    data: lista_prod_tipo
    });
    $("#Eid_prod_tipo").select2({
    data: lista_prod_tipo
    });
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

    
 
    new $.fn.dataTable.FixedHeader( '#table_user' );
} );
</script>


</body>
</html>