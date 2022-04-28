<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
<?php  foreach ($datos['lista_prod_tipo'] as $k => $prod_tipo){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_prod_tipo<?php echo $k;?>" name="id_prod_tipo<?php echo $k;?>" value="<?php echo $prod_tipo['id_prod_tipo'];?>">
                    <input type="hidden" class="hidden" id="nombre_prod_tipo<?php echo $k;?>" name="nombre_prod_tipo<?php echo $k;?>" value="<?php echo $prod_tipo['nombre_prod_tipo'];?>">
                </div>
                          <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tipo de Productos</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nueva_prod_tipo"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Tipo de Producto</button>
	<div class="container-fluid row mb-2">
		<div  class="table">
		<table  id="table_user" class="table table-bordered table-striped">
      		<thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">Tipo de producto</th>
                <th colspan="1">opciones</th>
              </tr>
          	</thead>
          	<tbody>
             <?php  foreach ($datos['lista_prod_tipo'] as $k => $prod_tipo){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $k+1;?></td>
                <td colspan="1"><?php echo $prod_tipo['nombre_prod_tipo'];?></td>
                <td colspan="1">
                  </div>
                    <a onclick="editar(<?php echo $k;?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="Editar"><i class="fa fa-pen"></i></a>
                    <a onclick="borrar(<?php echo $prod_tipo['id_prod_tipo'];?>, '<?php echo $prod_tipo['nombre_prod_tipo'];?>')" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-danger  btn-outline" data-original-title="Borrar tipo producto"><i class="fa fa-trash"></i></a>   
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
              <h4 class="modal-title">Agregar Tipo de Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="valid_tipo_prod">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre tipo producto</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_tipo_prod" name="nombre_tipo_prod" placeholder="" >
                        </div>            
                    </div>
                    
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="add_tipo_prod"  class="btn btn-primary">Guardar</button> 
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
              <h4 class="modal-title">Editar Tipo de Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="Evalid_prod_tipo">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre Tipo de Producto</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Enombre_prod_tipo" name="Enombre_prod_tipo" placeholder="" >
                        </div>            
                    </div>
                    
                    <input type="hidden" class="form-control" id="Eid_prod_tipo" name="Eid_prod_tipo" placeholder="" >

            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="edit_prod_tipo"  class="btn btn-primary">Guardar</button> 
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
  
  $("#nueva_prod_tipo").click(function () {

    limpiarForm('valid_tipo_prod');


    $("#myModal").modal({
        keyboard: false
      });
    setTimeout(function () {

        $('#nombre_tipo_prod').focus();

    }, 500);
  });


$("#add_tipo_prod").click(function () {
if ($("#valid_tipo_prod").valid()) {
    $("#loading_modal").modal({
        
    });
    $("#myModal").modal('hide');
    var nombre_prod_tipo = $("#nombre_tipo_prod").val();
    var url = "<?php echo  RUTA_URL;?>/productotipo/agregar";
     $.ajax({
         type: "POST",
         url: url,
         data: {nombre_prod_tipo: nombre_prod_tipo},
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
                  window.location.href = '<?php echo  RUTA_URL;?>/productotipo/';
                }, 2500);               
         }
     });
}
});  

function editar(key) {
        console.log(key);
        $("#Eid_prod_tipo").val($("#id_prod_tipo"+key).val());
        console.log($("#Eid_prod_tipo"+key).val());
        $("#Enombre_prod_tipo").val($("#nombre_prod_tipo"+key).val());
        $("#ModalEditar").modal({
                keyboard: false
            });
  }
  $("#edit_prod_tipo").click(function () {
    
  
    
    if ($("#Evalid_prod_tipo").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#ModalEditar").modal('hide');
        var id_prod_tipo = $("#Eid_pord_tipo").val();
        var nombre_prod_tipo = $("#nombre_tipo_prod").val();
        var url = "<?php echo  RUTA_URL;?>/productotipo/editar";
         $.ajax({
             type: "POST",
             url: url,
             data: {nombre_prod_tipo: nombre_prod_tipo},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/productotipo/';
                    }, 2500);               
             }
         });
    }
  });
  $("#edit_prod_tipo").click(function () {
    
  
    
    if ($("#Evalid_prod_tipo").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#ModalEditar").modal('hide');
        var id_prod_tipo = $("#Eid_prod_tipo").val();
        var nombre_prod_tipo = $("#Enombre_prod_tipo").val();
        var url = "<?php echo  RUTA_URL;?>/productotipo/editar";
         $.ajax({
             type: "POST",
             url: url,
             data: {id_prod_tipo: id_prod_tipo,nombre_prod_tipo: nombre_prod_tipo},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/productotipo/';
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

    var url = "<?php echo  RUTA_URL;?>/productotipo/eliminar";
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
                window.location.href = '<?php echo  RUTA_URL;?>/productotipo/';
              }, 2500);               
        }
    });

});
$("#valid_tipo_prod").validate({
            rules: {
                nombre_prod_tipo: {required: true, minlength: 4, maxlength: 50}

            },
            messages: {
              nombre_prod_tipo: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."}
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