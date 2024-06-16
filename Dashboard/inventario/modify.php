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
                    <h1>Agregar cantidad a inventario</h1>
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
                                    <form action="../../controladores/inventario/agregar.php" method="post">
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
                                                    <label for="">Cantidad a agregar</label>
                                                    <input type="number" name="cantidad_new" id="cantidad_new" placeholder="Agregue la cantidad" class="form-control" value="" required>
                                                </div>
                                                
                                                    
                                                    <input type="hidden" name="cantidad_total" id="cantidad_total" placeholder="Total" class="form-control" value="" readonly>
                                                
                                            </div>
                                            <div class="form-group">
                                                <a href="../inventario/index.php" class="btn btn-secondary">Volver</a>
                                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Agregar</button>
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

<!-- Script al final del documento para asegurar que el DOM esté completamente cargado -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener los elementos de input
        var cantidadOldInput = document.getElementsByName('cantidad_old')[0]; // Obtener el primer elemento de la lista
        var cantidadNewInput = document.getElementById('cantidad_new');
        var cantidadTotalInput = document.getElementById('cantidad_total');

        // Función para actualizar el total cuando se cambie la cantidad a agregar
        function actualizarTotal() {
            var cantidadOld = parseInt(cantidadOldInput.value);
            var cantidadNew = parseInt(cantidadNewInput.value);

            if (!isNaN(cantidadOld) && !isNaN(cantidadNew)) {
                cantidadTotalInput.value = cantidadOld + cantidadNew;
            } else {
                cantidadTotalInput.value = '';
            }
        }

        // Escuchar cambios en cantidad_new y actualizar el total
        cantidadNewInput.addEventListener('input', actualizarTotal);
    });
</script>

<?php 
include("../layout/footerDash.php"); 
include("../layout/mensajes.php");
?>
