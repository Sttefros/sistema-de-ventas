<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
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
             <?php  foreach ($datos['proveedores'] as $key):?>
              <tr>
                <td><?php echo $key->nombre;?></td>
                <td><?php echo $key->rut;?></td>
                <td><?php echo $key->nombre_contacto;?></td>
                <td><?php echo $key->telefono;?></td>
                <td><?php echo $key->correo;?></td>
                <td>opciones</td>
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

<?php require RUTA_APP .'/views/inc/footer.php';?>
<script>

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