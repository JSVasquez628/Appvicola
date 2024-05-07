<?php
include("../../Conexion/conexion.php");
include("../layout/indexDash.php");
include("../../controladores/roles/updateRoles.php");
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
                    <h1>Edicion del Rol</h1>
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
                            <form action="../../controladores/roles/update.php" method="post">
                            <div class="form-group">
                                <input type="text" name="id_rol" value="<?php echo $id_rol_get;?>" hidden>
                                <label for="">Nombre del rol</label>
                                <input type="text" name="nombre_rol" class="form-control" placeholder="Escriba nombre del rol..." value="<?php echo $rol;?>" required>
                            </div>
                            <div class="form-group">
                                <a href="../roles/index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Actualizar</button>
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