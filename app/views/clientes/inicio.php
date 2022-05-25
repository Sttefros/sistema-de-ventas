<?php require RUTA_APP .'/views/inc/header.php';?>
<?php require RUTA_APP .'/views/inc/topbar.php';?>
<?php require RUTA_APP .'/views/inc/sidebar.php';?>
<div class="content-wrapper">
  <div id="alerta_rellenar"></div>
<?php  foreach ($datos['lista_cliente'] as $k => $cli){ ?>
             
         
                 <div class="hidden" id="div<?php echo $k; ?>">
                    <input type="hidden" class="hidden" id="key<?php echo $k;?>" name="key<?php echo $k;?>" value="<?php echo $k;?>" >
                    <input type="hidden" class="hidden" id="id_cliente<?php echo $k;?>" name="id_cliente<?php echo $k;?>" value="<?php echo $cli['id_cliente'];?>">
                    <input type="hidden" class="hidden" id="rut_cliente<?php echo $k;?>" name="rut_cliente<?php echo $k;?>" value="<?php echo $cli['rut_cliente'];?>">
                    <input type="hidden" class="hidden" id="nombre_cliente<?php echo $k;?>" name="nombre_cliente<?php echo $k;?>" value="<?php echo $cli['nombre_cliente'];?>">
                    <input type="hidden" class="hidden" id="telefono_cliente<?php echo $k;?>" name="telefono_cliente<?php echo $k;?>" value="<?php echo $cli['telefono_cliente'];?>">
                    <input type="hidden" class="hidden" id="direccion_cliente<?php echo $k;?>" name="direccion_cliente<?php echo $k;?>" value="<?php echo $cli['direccion_cliente'];?>">
                    <input type="hidden" class="hidden" id="check_fiado<?php echo $k;?>" name="check_fiado<?php echo $k;?>" value="<?php echo $cli['check_fiado'];?>">

                
                </div>
                          <?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
<button id="nueva_cli"  data-target="#smallModal" class="btn btn-labeled btn-success"><span class="btn-label icon fa fa-plus"></span> Nuevo Cliente</button>
	<div class="container-fluid row mb-2">
		<div  class="table">
		<table  id="table_user" class="table table-bordered table-striped dt-responsive">
      		<thead>
              <tr>
                <th colspan="1">N°</th>
                <th colspan="1">rut</th>
                <th colspan="1">Nombre</th>
                <th colspan="1">Telefono</th>
                <th colspan="1">Direccion</th>
                <th colspan="1">check fiado</th>
                <th colspan="1">opciones</th>
              </tr>
          	</thead>
          	<tbody>
             <?php  foreach ($datos['lista_cliente'] as $k => $cli){?>
             
              <tr>
                 
                <td colspan="1"><?php echo $k+1;?></td>
                <td colspan="1"><?php echo $cli['rut_cliente'];?></td>
                <td colspan="1"><?php echo $cli['nombre_cliente'];?></td>
                <td colspan="1"><?php echo $cli['telefono_cliente'];?></td>
                <td colspan="1"><?php echo $cli['direccion_cliente'];?></td>
                <td colspan="1"><?php if($cli['check_fiado'] == 1){echo '<i class="fa fa-check-square text-success" aria-hidden="true"></i>
'; } else { echo '<i class="fa fa-window-close text-danger" aria-hidden="true"></i>
';}?></td>
                <td colspan="1">
                  </div>
                      
                  <a onclick="editar(<?php echo $k;?>)" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-info  btn-outline" data-original-title="Editar"><i class="fa fa-pen"></i></a>
                  <a onclick="borrar(<?php echo $cli['id_cliente'];?>, '<?php echo $cli['nombre_cliente'];?>')" rel="tooltip" href="#" type="button" data-container="body" class="btn  btn-danger  btn-outline" data-original-title="Borrar cliente"><i class="fa fa-trash"></i></a>
                        
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
              <h4 class="modal-title">Agregar Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="valid_cli">
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Rut</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rut_cliente" name="rut_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">telefono</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="" >
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Direccion</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Check Fiado</label>

                        <div class="col-sm-9">
                            <input type="checkbox" class="form-control check_fiado" id="check_fiado" name="check_fiado" placeholder="" data-off-text="NO" data-on-text="SI" >
                        </div>            
                    </div>
                  
            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="add_cli"  class="btn btn-primary">Guardar</button> 
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
              <h4 class="modal-title">Editar Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="Evalid_cli">
                <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Rut</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Erut_cliente" name="Erut_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input class="form-control select2" id="Enombre_cliente" name="Enombre_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">telefono</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="Etelefono_cliente" name="Etelefono_cliente" placeholder="" >
                        </div>            
                    </div>

                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Direccion</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Edireccion_cliente" name="Edireccion_cliente" placeholder="" >
                        </div>            
                    </div>
                    <div class="form-group dark">
                        <label for="nombre" class="col-sm-3 control-label">Habilitado para fiar</label>

                        <div class="col-sm-9">
                            <input type="checkbox" class="form-control check_fiado" id="Echeck_fiado" name="Echeck_fiado" placeholder="" data-off-text="NO" data-on-text="SI" >
                        </div>            
                    </div>
                    <input type="hidden" class="form-control" id="Eid_cliente" name="Eid_cliente" placeholder="" >

            <div class="modal-footer justify-content-between">
              <button type="button" id="loading-example-tn"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" id="edit_cli"  class="btn btn-primary">Guardar</button> 
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
(function ($)
    {
        jQuery.fn.Rut = function (options)
        {
            var defaults = {
                digito_verificador: null,
                on_error: function () {},
                on_success: function () {},
                validation: true,
                format: true,
                format_on: 'change'
            };
            var opts = $.extend(defaults, options);
            return this.each(function () {

                if (defaults.format)
                {
                    jQuery(this).bind(defaults.format_on, function () {
                        jQuery(this).val(jQuery.Rut.formatear(jQuery(this).val(), defaults.digito_verificador == null));
                    });
                }
                if (defaults.validation)
                {
                    if (defaults.digito_verificador == null)
                    {
                        jQuery(this).bind('blur', function () {
                            var rut = jQuery(this).val();
                            if (jQuery(this).val() != "" && !jQuery.Rut.validar(rut))
                            {
                                defaults.on_error();
                            } else if (jQuery(this).val() != "")
                            {
                                defaults.on_success();
                            }
                        });
                    } else
                    {
                        var id = jQuery(this).attr("id");
                        jQuery(defaults.digito_verificador).bind('blur', function () {
                            var rut = jQuery("#" + id).val() + "-" + jQuery(this).val();
                            if (jQuery(this).val() != "" && !jQuery.Rut.validar(rut))
                            {
                                defaults.on_error();
                            } else if (jQuery(this).val() != "")
                            {
                                defaults.on_success();
                            }
                        });
                    }
                }
            });
        }
    })(jQuery);
    /**
     Funciones
     */


    jQuery.Rut = {
        formatear: function (Rut, digitoVerificador)
        {
            var sRut = new String(Rut);
            var sRutFormateado = '';
            sRut = jQuery.Rut.quitarFormato(sRut);
            if (digitoVerificador) {
                var sDV = sRut.charAt(sRut.length - 1);
                sRut = sRut.substring(0, sRut.length - 1);
            }
            while (sRut.length > 3)
            {
                sRutFormateado = "." + sRut.substr(sRut.length - 3) + sRutFormateado;
                sRut = sRut.substring(0, sRut.length - 3);
            }
            sRutFormateado = sRut + sRutFormateado;
            if (sRutFormateado != "" && digitoVerificador)
            {
                sRutFormateado += "-" + sDV;
            } else if (digitoVerificador)
            {
                sRutFormateado += sDV;
            }

            return sRutFormateado;
        },
        quitarFormato: function (rut)
        {
            var strRut = new String(rut);
            while (strRut.indexOf(".") != -1)
            {
                strRut = strRut.replace(".", "");
            }
            while (strRut.indexOf("-") != -1)
            {
                strRut = strRut.replace("-", "");
            }

            return strRut;
        },
        digitoValido: function (dv)
        {
            if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4'
                    && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9'
                    && dv != 'k' && dv != 'K')
            {
                return false;
            }
            return true;
        },
        digitoCorrecto: function (crut)
        {
            largo = crut.length;
            if (largo < 2)
            {
                return false;
            }
            if (largo > 2)
            {
                rut = crut.substring(0, largo - 1);
            } else
            {
                rut = crut.charAt(0);
            }
            dv = crut.charAt(largo - 1);
            jQuery.Rut.digitoValido(dv);
            if (rut == null || dv == null)
            {
                return 0;
            }

            dvr = jQuery.Rut.getDigito(rut);
            if (dvr != dv.toLowerCase())
            {
                return false;
            }
            return true;
        },
        getDigito: function (rut)
        {
            var dvr = '0';
            suma = 0;
            mul = 2;
            for (i = rut.length - 1; i >= 0; i--)
            {
                suma = suma + rut.charAt(i) * mul;
                if (mul == 7)
                {
                    mul = 2;
                } else
                {
                    mul++;
                }
            }
            res = suma % 11;
            if (res == 1)
            {
                return 'k';
            } else if (res == 0)
            {
                return '0';
            } else
            {
                return 11 - res;
            }
        },
        validar: function (texto)
        {
            texto = jQuery.Rut.quitarFormato(texto);
            largo = texto.length;
            // rut muy corto
            if (largo < 2)
            {
                return false;
            }

            // verifica que los numeros correspondan a los de rut
            for (i = 0; i < largo; i++)
            {
                // numero o letra que no corresponda a los del rut
                if (!jQuery.Rut.digitoValido(texto.charAt(i)))
                {
                    return false;
                }
            }

            var invertido = "";
            for (i = (largo - 1), j = 0; i >= 0; i--, j++)
            {
                invertido = invertido + texto.charAt(i);
            }
            var dtexto = "";
            dtexto = dtexto + invertido.charAt(0);
            dtexto = dtexto + '-';
            cnt = 0;
            for (i = 1, j = 2; i < largo; i++, j++)
            {
                if (cnt == 3)
                {
                    dtexto = dtexto + '.';
                    j++;
                    dtexto = dtexto + invertido.charAt(i);
                    cnt = 1;
                } else
                {
                    dtexto = dtexto + invertido.charAt(i);
                    cnt++;
                }
            }

            invertido = "";
            for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
            {
                invertido = invertido + dtexto.charAt(i);
            }

            if (jQuery.Rut.digitoCorrecto(texto))
            {
                return true;
            }
            return false;
        }
    };
   function limpiarForm(idForm) {
        var vali = $("#" + idForm).validate();
        vali.resetForm();
        vali.reset();
        $("#" + idForm).trigger('reset');
        $("#" + idForm + " .form-group").removeClass('has-error');
    }
    $("#nueva_cli").click(function () {

      limpiarForm('valid_cli');


      $("#myModal").modal({
          keyboard: false
      });
      setTimeout(function () {

          $('#nombre_producto').focus();

      }, 500); });

      $("#add_cli").click(function () {
    
  
    
    if ($("#valid_cli").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#myModal").modal('hide');
        var rut_cliente = $("#rut_cliente").val();
        var nombre_cliente = $("#nombre_cliente").val();
        var telefono_cliente = $("#telefono_cliente").val();
        var direccion_cliente = $("#direccion_cliente").val();
        if ($("input#check_fiado").is(':checked')) {
          var check_fiado = 1;
        }else{
          var check_fiado = 0;
        }
        var url = "<?php echo  RUTA_URL;?>/clientes/agregar";
         $.ajax({
             type: "POST",
             url: url,
             data: {rut_cliente: rut_cliente, nombre_cliente:nombre_cliente,telefono_cliente:telefono_cliente,direccion_cliente:direccion_cliente,check_fiado:check_fiado},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/clientes/';
                    }, 2500);               
             }
         });
    }
});

function editar(key) {
        console.log(key);
        $("#Eid_cliente").val($("#id_cliente"+key).val());
        console.log($("#Eid_cliente"+key).val());
        $("#Erut_cliente").val($("#rut_cliente"+key).val());
        $("#Enombre_cliente").val($("#nombre_cliente"+key).val());
        $("#Etelefono_cliente").val($("#telefono_cliente"+key).val());
        $("#Edireccion_cliente").val($("#direccion_cliente"+key).val());
        $("#Echeck_fiado").val($("#check_fiado"+key).val());
        console.log($("#check_fiado"+key).val());
        if(($("#check_fiado"+key).val()) == 1){
          $('#Echeck_fiado').bootstrapSwitch('state', true);
        }else{
          $('#Echeck_fiado').bootstrapSwitch('state', false);
        }
        $("#ModalEditar").modal({
                keyboard: false
            });
  }
  $("#edit_cli").click(function () {
    
  
    
    if ($("#Evalid_cli").valid()) {
        $("#loading_modal").modal({
            
        });
        $("#ModalEditar").modal('hide');
        var id_cliente = $("#Eid_cliente").val();
        var rut_cliente = $("#Erut_cliente").val();
        var nombre_cliente = $("#Enombre_cliente").val();
        var telefono_cliente = $("#Etelefono_cliente").val();
        var direccion_cliente = $("#Edireccion_cliente").val();
        // var check_fiado = $("#Echeck_fiado").val();
        if ($("input#Echeck_fiado").is(':checked')) {
          var check_fiado = 1;
        }else{
          var check_fiado = 0;
        }
        var url = "<?php echo  RUTA_URL;?>/clientes/editar";
         $.ajax({
             type: "POST",
             url: url,
             data: {id_cliente: id_cliente,rut_cliente: rut_cliente, nombre_cliente:nombre_cliente,telefono_cliente:telefono_cliente,direccion_cliente:direccion_cliente,check_fiado:check_fiado},
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
                      window.location.href = '<?php echo  RUTA_URL;?>/clientes/';
                    }, 2500);               
             }
         });
    }
  });

  function borrar(id_cli, nombre) {
        $('#rellenar').html('seguro quieres eliminar el cliente: <b>'+ nombre +'</b>?');
        $('#id_eliminar').val(id_cli);
        $('#ModalEliminar').modal();
    }
    $("#confirmar_eliminar").click(function () {
    
    $("#loading_modal").modal({
        
    });
    $("#ModalEliminar").modal('hide');
    var id_eliminar = $("#id_eliminar").val();

    var url = "<?php echo  RUTA_URL;?>/clientes/eliminar";
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
                window.location.href = '<?php echo  RUTA_URL;?>/clientes/';
              }, 2500);               
        }
    });

});

     var re = /^[ A-Za-z0-9_@./#&+-]*$/;
        $.validator.addMethod("loginRegex", function (value, element) {
            return this.optional(element) || re.test(value);
        }, "Solo puesdes ingresar letras o numeros.");
        $.validator.addMethod("rut", function (value, element) {
            return this.optional(element) || $.Rut.validar(value);
        }, "Este campo debe ser un rut valido.");

    
    $("#valid_cli").validate({
            rules: {
                
                rut_cliente: {required: true, rut: true, maxlength: 12},
                nombre_cliente: {required: true, minlength: 4, maxlength: 50},
                telefono_cliente: {required: true, minlength: 9, maxlength: 9},
                direccion_cliente: {required: true, minlength: 4, maxlength: 50}
                    


            },
            messages: {
                rut_cliente: {required: 'Debe ingresar un RUT', rut: 'Este rut no es valido.', maxlength: " Máximo 12 digitos."},
                nombre_cliente: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."},
                telefono_cliente: {required: 'Debe ingresar un telefono',  maxlength: " Máximo 9 digitos.", min: "Este numero es invalido"},
                direccion_cliente: {required: 'Debe ingresar una dirección',  maxlength: " Máximo 50 digitos."}
            }
        });
  $("#Evalid_cli").validate({
            rules: {
                Erut_cliente: {required: true, rut: true, maxlength: 12},
                Enombre_cliente: {required: true, minlength: 4, maxlength: 50},
                Etelefono_cliente: {required: true, minlength: 9, maxlength: 9},
                Edireccion_cliente: {required: true, minlength: 4, maxlength: 50}
                    


            },
            messages: {
                Erut_cliente: {required: 'Debe ingresar un RUT', rut: 'Este rut no es valido.', maxlength: " Máximo 12 digitos."},
                Enombre_cliente: {required: "Debe ingresar un nombre.", minlength: "Mínimo 4 caracteres", maxlength: " Máximo 50 caracteres."},
                Etelefono_cliente: {required: 'Debe ingresar un telefono',  maxlength: " Máximo 9 digitos.", minlength: "Máximo 9 digitos."},
                Edireccion_cliente: {required: 'Debe ingresar una dirección',  maxlength: " Máximo 50 digitos."}
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
  $('#rut_cliente').Rut({
            format_on: 'keyup'
        });
        $('#Erut_cliente').Rut({
            format_on: 'keyup'
        });
    $(".check_fiado").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'))
    });
</script>


</body>
</html>