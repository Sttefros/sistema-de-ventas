<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
<?php  foreach ($datos['lista_usuario'] as $k => $usr){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_usuario<?php echo $k;?>" name="id_usuario<?php echo $k;?>" value="<?php echo $usr['id_usuario'];?>">
                    <input type="hidden" class="hidden" id="nombre_usuario<?php echo $k;?>" name="nombre_usuario<?php echo $k;?>" value="<?php echo $usr['nombre_usuario'];?>">
                    <input type="hidden" class="hidden" id="apellido_usuario<?php echo $k;?>" name="apellido_usuario<?php echo $k;?>" value="<?php echo $usr['apellido_usuario'];?>">
                    <input type="hidden" class="hidden" id="correo_usuario<?php echo $k;?>" name="correo_usuario<?php echo $k;?>" value="<?php echo $usr['correo_usuario'];?>">
                    <input type="hidden" class="hidden" id="rol_usuario<?php echo $k;?>" name="rol_usuario<?php echo $k;?>" value="<?php echo $usr['rol_usuario'];?>">
                    <input type="hidden" class="hidden" id="contrasena_usuario<?php echo $k;?>" name="contrasena_usuario<?php echo $k;?>" value="<?php echo $usr['contrasena_usuario'];?>">

                
                </div>
                          <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nueva_user"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Usuario</button>
	<div class="container-fluid row mb-2">
		<div  class="table">
		<table  id="table_user" class="table table-bordered table-striped">
      		<thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">Nombre</th>
                <th colspan="1">Apellido</th>
                <th colspan="1">Correo</th>
                <th colspan="1">Rol</th>
                <th colspan="1">opciones</th>
              </tr>
          	</thead>
          	<tbody>
             <?php  foreach ($datos['lista_usuario'] as $k => $usr){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $k+1;?></td>
                <td colspan="1"><?php echo $usr['nombre_usuario'];?></td>
                <td colspan="1"><?php echo $usr['apellido_usuario'];?></td>
                <td colspan="1"><?php echo $usr['correo_usuario'];?></td>
                <td colspan="1"><?php echo $usr['rol_usuario'];?></td>
                <td colspan="1">
                  </div>
                      
                  <a onclick="editar(<?php echo $k;?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="Editar"><i class="fa fa-pen"></i></a>
                  <a onclick="borrar(<?php echo $usr['id_usuario'];?>, '<?php echo $usr['nombre_usuario'];?>')" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-danger  btn-outline" data-original-title="Borrar usuario"><i class="fa fa-trash"></i></a>
                        
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
              <h4 class="modal-title">Agregar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="valid_user">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Apellido</label>

                        <div class="col-sm-9">
                            <input class="form-control select2" id="apellido_usuario" name="apellido_usuario" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">correo</label>

                        <div class="col-sm-9">
                            <input class="select2" id="correo_usuario" name="correo_usuario" placeholder="" >
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">rol</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rol_usuario" name="rol_usuario" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Contraseña</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contrasena_usuario" name="contrasena_usuario" placeholder="" >
                        </div>            
                    </div>
                  
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="add_user"  class="btn btn-primary">Guardar</button> 
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
<?php require RUTA_APP .'/views/inc/footer.php';?>
<script>
   function limpiarForm(idForm) {
        var vali = $("#" + idForm).validate();
        vali.resetForm();
        vali.reset();
        $("#" + idForm).trigger('reset');
        $("#" + idForm + " .form-group").removeClass('has-error');
    }
    $("#nueva_user").click(function () {

      limpiarForm('valid_user');


      $("#myModal").modal({
          keyboard: false
      });
      setTimeout(function () {

          $('#nombre_usuario').focus();

      }, 500); });

      $("#add_user").click(function () {
    
  
    
    if ($("#valid_user").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#myModal").modal('hide');
        var nombre_usuario = $("#nombre_usuario").val();
        var apellido_usuario = $("#apellido_usuario").val();
        var correo_usuario = $("#correo_usuario").val();
        var rol_usuario = $("#rol_usuario").val();
        var contrasena_usuario = $("#contrasena_usuario").val();
        
         $.ajax({
             type: "POST",
             url: url,
             data: {nombre_usuario: nombre_usuario, apellido_usuario:apellido_usuario,correo_usuario:correo_usuario,rol_usuario:rol_usuario,contrasena_usuario:contrasena_usuario},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/usuarios/';
                    }, 2500);               
             }
         });
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