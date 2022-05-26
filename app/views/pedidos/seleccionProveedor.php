<div class=" row form-group dark">
                    <label  class="col-sm-4 control-label  text-right">Producto</label>
                    <div class="col-sm-4 ">
                        <select name="id_producto" id="id_producto" ></select>
                    </div>
</div>   

<script>
    var lista_prod = <?php echo json_encode($datos['listaproductos']); ?>;

$("#id_producto").prepend('<option selected=""></option>').select2({
    data: lista_prod,
    placeholder:'Seleccione producto',
    width: 'resolve'}).on("change", function () {


    var id = $(this).val();
   
});
</script>