<?php
include("../../Conexion/conexion.php");
include("../layout/indexDash.php");
include("../../controladores/proveedor/listaProveedor.php");
?>
<!--Content wrapper-->
<div class="content-wrapper">
    <!--content-header-->
    <div class="content-header">
        <!--container-fluid-->
        <div class="container-fluid">
            <!--row-->
            <div class="row mb-2">
                <!--col-->
                <div class="col-sm-12">
                    <h1>Registro de Productos</h1>
                </div>
                <!-- ./col-->
            </div>
            <!--./row-->
        </div>
        <!--./container-fluid-->
    </div>
    <!--./content-header-->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #cd7522;">
                            <h3 class="card-title">llena los datos con cuidado</h3>
                            <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                        </div>
                                      <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../../controladores/productos/create.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Nombre del producto</label>
                                <input type="text" name="nombre_producto" class="form-control" placeholder="Escriba nombre del producto..."  required>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de venta</label>
                                <input type="text" name="precio_venta" class="form-control" placeholder="Escriba el precio de venta..."  required>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de compra</label>
                                <input type="text" name="precio_compra" class="form-control" placeholder="Escriba el precio de compra..." required>
                            </div>
                            <div class="form-group">
                                <label for="">Unidad de medida</label>
                                <select name="unidad_medida" id="" class="form-control">
                                    <option value="Libra" selected="selected">Libra</option>
                                    <option value="Kilo">Kilo</option>
                                    <option value="Unidad">Unidad</option>
                                </select>
                            </div>
                            </div>
                            <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" name="imagen" class="form-control" placeholder="Sube una imagen del producto..." required>
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" placeholder="Coloca la cantidad del producto..." required>
                            </div>
                            <div class="form-group">
                                <label for="">Proveedor</label>
                                <select name="n_proveedor" id="" class="form-control">
                                  <?php 
                                  foreach ($proveedor_datos as $proveedor_dato){?>
                                  <option value="<?php echo $proveedor_dato['n_proveedor'];?>">
                                  <?php echo $proveedor_dato['nombre_proveedor'];?>
                                </option>
                                  <?php }?>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <a href="../productos/index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Guardar</button>
                        </div>
                        </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- /.row -->
              </div>
              <!-- /.card-body -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
 include("../layout/footerDash.php"); 
 include("../layout/mensajes.php");
?>