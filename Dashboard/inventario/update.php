<?php 
include("../layout/indexDash.php");
include ("../../Conexion/conexion.php");
include ("../../controladores/productos/show.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Modificar inventario</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #cd7522;">
                            <h3 class="card-title">Inventario</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../../controladores/inventario/update.php" method="post">
                                        <div class="row">
                                            <div class="col col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="n_producto" value="<?php echo $n_producto ?>">
                                                    <label for="">Nombre</label>
                                                    <input type="text" name="nombre_producto" class="form-control" value="<?php echo $nombre_producto ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Cantidad actual</label>
                                                    <input type="number" name="cantidad_old" class="form-control" value="<?php echo $cantidad ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Cantidad nueva</label>
                                                    <input type="number" name="cantidad_new" id="cantidad_new" placeholder="Agregue la cantidad" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="../inventario/index.php" class="btn btn-secondary">Volver</a>
                                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Modificar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
