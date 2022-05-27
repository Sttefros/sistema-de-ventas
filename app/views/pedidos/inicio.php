<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
 <?php  foreach ($datos['lista_pedido'] as $k => $ped){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_orden_pedido<?php echo $k;?>" name="id_orden_pedido<?php echo $k;?>" value="<?php echo $ped['id_orden_pedido'];?>">
                    <input type="hidden" class="hidden" id="id_proveedor<?php echo $k;?>" name="id_proveedor<?php echo $k;?>" value="<?php echo $ped['id_proveedor'];?>">
                    <input type="hidden" class="hidden" id="fecha_pedido<?php echo $k;?>" name="fecha_pedido<?php echo $k;?>" value="<?php echo $ped['fecha_pedido'];?>">
                    <input type="hidden" class="hidden" id="fecha_entrega<?php echo $k;?>" name="fecha_entrega<?php echo $k;?>" value="<?php echo $ped['fecha_entrega'];?>">
                    <input type="hidden" class="hidden" id="estado_entrega<?php echo $k;?>" name="estado_entrega<?php echo $k;?>" value="<?php echo $ped['estado_entrega'];?>">
                    <input type="hidden" class="hidden" id="precio_total_orden<?php echo $k;?>" name="precio_total_orden<?php echo $k;?>" value="<?php echo $ped['precio_total_orden'];?>">
                   
                
                </div>
                           <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado Ordenes de Compra</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nuevo_pedido"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Pedido</button>
    <div class="container-fluid row mb-2">
        <div  class="table table-responsive">
        <table  id="table_user" class="table table-bordered table-striped dt-responsive">
            <thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">Proveedor</th>
                <th colspan="1">Fecha Pedido</th>
                <th colspan="1">Fecha Entrega</th>
                <th colspan="1">Estado Entrega</th>
                <th colspan="1">Costo Pedido</th>
                <th colspan="1">opciones</th>
              </tr>
            </thead>
            <tbody>
             <?php  foreach ($datos['lista_pedido'] as $k => $ped){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $ped['id_orden_pedido'];?></td>
                <td colspan="1"><?php echo $ped['id_proveedor'];?></td>
                <td colspan="1"><?php echo date("d-m-Y H:i", strtotime($ped['fecha_pedido']));?></td>
                <td colspan="1"><?php echo date("d-m-Y H:i", strtotime($ped['fecha_entrega']));?></td>
                <td colspan="1"><?php echo $ped['estado_entrega'];?></td>
                <td colspan="1"><?php echo '$'.$ped['precio_total_orden'];?></td>
                <td colspan="1">
                  </div>
                      
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

    $("#nuevo_pedido").click(function () {
    <?php if(isset($_SESSION['pedido'])) { $_SESSION['pedido'] = []; }?>
window.location.href = " <?php echo  RUTA_URL;?>/pedidos/generar_pedido";
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

    
 
} );
</script>


</body>
</html>