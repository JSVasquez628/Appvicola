<?php include ("../layout/indexDash.php"); 
include ("../../Conexion/conexion.php");
include ("../../controladores/productos/show.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h1 class="m-0">Informacion producto</h1>
          </div><!-- /.col -->
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
        <div class="col-md-10">
                <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header" style="background-color: #cd7522;">
                <h3 class="card-title">Productos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col col-md-6">
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
                        <div class="col col-md-6">
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
                            </div>
                    </div>
                    <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </div>

        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../layout/footerDash.php"); ?>