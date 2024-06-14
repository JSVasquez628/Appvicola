<?php include ("../layout/indexDash.php"); 
include ("../../Conexion/conexion.php");
include ("../../controladores/proveedor/show.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h1 class="m-0">Eliminar proveedor</h1>
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
                <h3 class="card-title">¿Esta seguro de eliminar el proveedor?</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <form action="../../controladores/proveedor/delete.php" method="post">
                    <div class="row">
                    
                    
                        <div class="col col-md-12">
                        <input type="text" name="n_proveedor" value="<?php echo $n_proveedor_get?>" hidden>
                            <div class="form-group">
                                <label for="">Nombre proveedor</label>
                                <input type="text" name="nombre_proveedor" class="form-control" value="<?php echo $nombre_proveedor?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion?>" >
                            </div>
                        </div>
                        <div class="form-group">
                                <a href="../proveedor/index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Eliminar</button>
                        </div>
                        
                            </div>
                            </form>
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





  <?php 
 include("../layout/footerDash.php"); 
 include("../layout/mensajes.php")
 
?>