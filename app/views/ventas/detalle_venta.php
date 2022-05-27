<table class="table table-borderless table-responsive-sm">
                            <thead>
                               
                                <tr>

                                <th>#</th>
                                <th>SKU</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                
                            </tr>
                            </thead>
                                <tbody>
                                    <?php $granTotal= 0;  foreach ($datos['detalle_venta'] as $key => $val) {  $granTotal += $val['precio_total_producto'];?>
                                    <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $val['sku']; ?></td>
                                    <td><?php echo $val['nombre_prod_tipo'].' '.$val['nombre_producto']; ?></td>
                                    <td><?php echo $val['cantidad_producto']; ?></td>
                                    <td><?php echo $val['precio_total_producto']; ?></td>
                                </tr>
                                   <?php }?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td><?php echo '$'.$granTotal; ?></td>
                                </tr>
                            </tbody>
                        </table>