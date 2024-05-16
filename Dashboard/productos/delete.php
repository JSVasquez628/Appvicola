<?php
include("../../Conexion/conexion.php");
include("../layout/indexDash.php");
include("../../controladores/productos/show.php");
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
                    <h1>Eliminar Producto</h1>
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
                            <h3 class="card-title">¿Esta seguro de eliminar el producto?</h3>
                            <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                        </div>
                                      <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <form action="../../controladores/productos/delete.php" method="post">
              <div class="row">
                        <div class="col col-md-6">
                        <input type="text" name="n_producto" value="<?php echo $n_producto_get?>" hidden>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre_producto" class="form-control" value="<?php echo $nombre_producto?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de venta</label>
                                <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Precio de compra</label>
                                <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Unidad de medida</label>
                                <input type="text" name="unidad_medida" class="form-control" value="<?php echo $unidad_medida?>" disabled>
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
                                <label for="">Cantidad</label>
                                <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad?>" disabled>
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