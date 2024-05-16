<?php
include("../../Conexion/conexion.php");
include("../layout/indexDash.php");
include("../../controladores/productos/updatePro.php");
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
                    <h1>Edicion del Producto</h1>
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
                <div class="col-md-5">
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
                            <form action="../../controladores/producto/update.php" method="post">
                            <div class="row">
                        <div class="col col-md-6">
                        <input type="text" name="n_producto" value="<?php echo $n_producto_get?>" hidden>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre_producto" class="form-control" placeholder="Escriba el nombre del producto..." value="<?php echo $nombre_producto?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de venta</label>
                            <input type="text" name="precio_venta" class="form-control" placeholder="Escriba el precio de venta del producto..." value="<?php echo $precio_venta?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de compra</label>
                                <input type="text" name="precio_compra" class="form-control" placeholder="Escriba el precio de compra del producto..." value="<?php echo $precio_compra?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Unidad de medida</label>
                                <input type="text" name="unidad_medida" class="form-control" value="<?php echo $unidad_medida?>" required>
                            </div>
                        </div>
                        <div class="col col-md-6" >
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <div>
                                <?php echo "<img src='data:image/jpg;base64," . base64_encode($producto_dato['imagen']) . "'  style='
                                
                                width: 150px;
                                height: 120px;
                                float: rigth;
                                padding: 0;
                                border-radius: 50%;
                                margin: 2px auto 0 auto;
                                display: block;'>"?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Proveedor</label>
                                <input type="text" name="nombre_proveedor" class="form-control" value="<?php echo $proveedor?>" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <a href="../productos/index.php" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Eliminar</button>
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