<?php include ("../layout/indexDash.php"); 
include ("../../Conexion/conexion.php");
include ("../../controladores/usuarios/updateUser.php");
include ("../../controladores/roles/listaRoles.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h1 class="m-0">Actualizar cliente</h1>
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
                <h3 class="card-title">Llene los datos con cuidado </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <form action="../../controladores/usuarios/update.php" method="post">
                    <div class="row">
                    
                    
                        <div class="col col-md-6">
                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get?>" hidden>
                            <div class="form-group">
                                <label for="">Documento</label>
                                <input type="text" name="documento" class="form-control" value="<?php echo $documento?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Tipo documento</label>
                                <input type="text" name="tipo_documento" class="form-control" value="<?php echo $tipo_documento?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control" value="<?php echo $nombres?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" value="<?php echo $apellido?>" >
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="correo" name="correo" class="form-control" value="<?php echo $correo?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Rol</label>
                                <select name="rol" id="" class="form-control">
                                  <?php foreach ($roles_datos as $roles_dato) { 
                                    $id_rol = $roles_dato['id_rol'];
                                    $rol_tabla = $roles_dato['nombre_rol']?>
                                  <option value="<?php echo $id_rol;?>"<?php if($rol_tabla == $rol){ ?> selected="selected" <?php } ?> ><?php echo $rol_tabla;?></option> 
                                  <?php
                                  }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <a href="../usuarios/Rcliente.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Actualizar</button>
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
 include ("../layout/mensajes.php");
 
?>