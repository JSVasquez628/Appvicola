<?php include ("../layout/indexDash.php"); 
include ("../../Conexion/conexion.php");
include ("../../controladores/usuarios/showUser.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h1 class="m-0">Informacion cliente</h1>
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
                <h3 class="card-title">Usuarios</h3>

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
                                <label for="">Documento</label>
                                <input type="text" name="documento" class="form-control" value="<?php echo $documento?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tipo documento</label>
                                <input type="text" name="tipo documento" class="form-control" value="<?php echo $tipo_documento?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control" value="<?php echo $nombres?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" value="<?php echo $apellido?>" disabled>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="correo" name="correo" class="form-control" value="<?php echo $correo?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Rol</label>
                                <input type="text" name="rol" class="form-control" value="<?php echo $rol?>" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <a href="../usuarios/Rcliente.php" class="btn btn-secondary">Volver</a>
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