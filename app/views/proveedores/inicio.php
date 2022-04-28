<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">

<?php  foreach ($datos['proveedores'] as $k => $prov){ ?>
             
         
             <div class="hidden" id="div<?php echo $k; ?>">
                <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                <input type="hidden" class="hidden" id="id_proveedor<?php echo $k;?>" name="id_proveedor<?php echo $k;?>" value="<?php echo $prov['id_proveedor'];?>">
                <input type="hidden" class="hidden" id="nombre_proveedor<?php echo $k;?>" name="nombre_proveedor<?php echo $k;?>" value="<?php echo $prov['nombre_proveedor'];?>">
                <input type="hidden" class="hidden" id="rut<?php echo $k;?>" name="rut<?php echo $k;?>" value="<?php echo $prov['rut'];?>">
                <input type="hidden" class="hidden" id="telefono<?php echo $k;?>" name="telefono<?php echo $k;?>" value="<?php echo $prov['telefono'];?>">
                <input type="hidden" class="hidden" id="correo<?php echo $k;?>" name="correo<?php echo $k;?>" value="<?php echo $prov['correo'];?>">
                <input type="hidden" class="hidden" id="nombre_contacto<?php echo $k;?>" name="nombre_contacto<?php echo $k;?>" value="<?php echo $prov['nombre_contacto'];?>">
                <input type="hidden" class="hidden" id="rol_proveedor<?php echo $k;?>" name="rol_proveedor<?php echo $k;?>" value="<?php echo $prov['rol_proveedor'];?>">
            </div>
                      <?php } ?>

 
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Proveedores</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
<section class="content">
<button id="nueva_prov"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Proveedor</button>
	<div class="container-fluid row mb-2">
		<div class="table table-responsive">
		<table id="table_user" class="table table-bordered table-striped dt-responsive">
      		<thead>
              <tr>
                <th>nombre</th>
                <th>rut</th>
                <th>nombre contacto</th>
                <th>numero contacto</th>
                <th>correo contacto</th>
                <th>opciones</th>
              </tr>
          	</thead>
          	<tbody>
             <?php  foreach ($datos['proveedores'] as $k => $prov):?>
              <tr>
                <td><?php echo $prov['nombre_proveedor'];?></td>
                <td><?php echo $prov['rut'];?></td>
                <td><?php echo $prov['nombre_contacto'];?></td>
                <td><?php echo $prov['telefono'];?></td>
                <td><?php echo $prov['correo'];?></td>
                <td colspan="1">
                  </div>
                      
                        <a onclick="editar(<?php echo $k;?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="Editar"><i class="fa fa-pen"></i></a>
                        <a onclick="borrar(<?php echo $prov['id_proveedor'];?>, '<?php echo $prov['nombre_proveedor'];?>')" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-danger  btn-outline" data-original-title="Borrar proveedor"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
              </tr>
          <?php endforeach;?>
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
              <h4 class="modal-title">Agregar Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="valid_prov">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">RUT</label>

                        <div class="col-sm-9">
                            <input  type="text" class="form-control"id="rut" name="rut" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">telefono</label>

                        <div class="col-sm-9">
                            <input  type="text" class="form-control" id="telefono" name="telefono" placeholder="" >
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">correo</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre Contacto</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Rol Proveedor</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rol_proveedor" name="rol_proveedor" placeholder="" >
                        </div>            
                    </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="add_prov"  class="btn btn-primary">Guardar</button> 
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
              <h4 class="modal-title">Editar Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="Evalid_prov">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Enombre_proveedor" name="Enombre_proveedor" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">RUT</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Erut" name="Erut" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Telefono</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Etelefono" name="Etelefono" placeholder="" >
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Correo</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Ecorreo" name="Ecorreo" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre de contacto</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Enombre_contacto" name="Enombre_contacto" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Tipo del proveedor</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Erol_proveedor" name="Erol_proveedor" placeholder="" >
                        </div>            
                    </div>
                    <input type="hidden" class="form-control" id="Eid_proveedor" name="Eid_proveedor" placeholder="" >

            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="edit_prov"  class="btn btn-primary">Guardar</button> 
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </form>
          </div>
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
<div id="loading_modal" class="modal fade">
    <div id="load" class="modal-dialog">
        <div class="panel-body">
            <label class="text-primary">Cargando. Por favor espere unos segundos...</label>
            <div class="progress progress-striped active progress-lg" style="height:25px"><div class="progress-bar progress-bar-warning" style="width: 69%;"></div></div>
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

$("#nueva_prov").click(function () {

limpiarForm('valid_prov');


$("#myModal").modal({
    keyboard: false
});
setTimeout(function () {

    $('#nombre_proveedor').focus();

}, 500); });

$("#add_prov").click(function () {



if ($("#valid_prov").valid()) {
    $("#loading_modal").modal({
        
    });
    $("#myModal").modal('hide');
    var nombre_proveedor = $("#nombre_proveedor").val();
    var rut = $("#rut").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var nombre_contacto = $("#nombre_contacto").val();
    var rol_proveedor = $("#rol_proveedor").val();
    var url = "<?php echo  RUTA_URL;?>/proveedores/agregar";
     $.ajax({
         type: "POST",
         url: url,
         data: {nombre_proveedor: nombre_proveedor, rut:rut,telefono:telefono,correo:correo,nombre_contacto:nombre_contacto,rol_proveedor:rol_proveedor},
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
                  window.location.href = '<?php echo  RUTA_URL;?>/proveedores/';
                }, 2500);               
         }
     });
}
});

  function editar(key) {
        console.log(key);
        $("#Eid_proveedor").val($("#id_proveedor"+key).val());
        console.log($("#Eid_proveedor"+key).val());
        $("#Enombre_proveedor").val($("#nombre_proveedor"+key).val());
        $("#Erut").val($("#rut"+key).val());
        $("#Etelefono").val($("#telefono"+key).val());
        $("#Ecorreo").val($("#correo"+key).val());
        $("#Enombre_contacto").val($("#nombre_contacto"+key).val());
        $("#Erol_proveedor").val($("#rol_proveedor"+key).val());
        $("#ModalEditar").modal({
                keyboard: false
            });
  }
  $("#edit_prov").click(function () {
    
  
    
    if ($("#Evalid_prov").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#ModalEditar").modal('hide');
        var id_proveedor = $("#Eid_proveedor").val();
        var nombre_proveedor = $("#Enombre_proveedor").val();
        var rut = $("#Erut").val();
        var telefono = $("#Etelefono").val();
        var correo = $("#Ecorreo").val();
        var nombre_contacto = $("#Enombre_contacto").val();
        var rol_proveedor = $("#Erol_proveedor").val();
        var url = "<?php echo  RUTA_URL;?>/proveedores/editar";
         $.ajax({
             type: "POST",
             url: url,
             data: {id_proveedor: id_proveedor,nombre_proveedor: nombre_proveedor, rut:rut,telefono:telefono,correo:correo,nombre_contacto:nombre_contacto,rol_proveedor:rol_proveedor},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/proveedores/';
                    }, 2500);               
             }
         });
    }
  });
  function borrar(id_prov, nombre) {
        $('#rellenar').html('seguro quieres eliminar el proveedor: <b>'+ nombre +'</b>?');
        $('#id_eliminar').val(id_prov);
        $('#ModalEliminar').modal();
    }
    $("#confirmar_eliminar").click(function () {
    
    $("#loading_modal").modal({
        
    });
    $("#ModalEliminar").modal('hide');
    var id_eliminar = $("#id_eliminar").val();

    var url = "<?php echo  RUTA_URL;?>/proveedores/eliminar";
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
                window.location.href = '<?php echo  RUTA_URL;?>/proveedores/';
              }, 2500);               
        }
    });

});
  $("#valid_prov").validate({
            rules: {
                nombre_proveedor: {required: true, minlength: 4, maxlength: 50}

            },
            messages: {
              nombre_proveedor: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."}
            }
        });
  $("#valid_prov").validate({
            rules: {
                nombre_proveedor: {required: true, minlength: 4, maxlength: 50}

            },
            messages: {
              nombre_proveedor: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."}
            }
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
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        $('#table_user_wrapper .table-caption').text('Usuarios');
        $('#table_user_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>


</body>
</html>