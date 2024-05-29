<?php
include("../../Conexion/conexion.php");
include("../layout/indexDash.php");
include("../../controladores/productos/updatePro.php");
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
                            <form action="../../controladores/productos/update.php" method="post" enctype="multipart/form-data">
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
                            <!--En este div lo que se hace es comparar el campo que me trae en la consulta que se guarda en la variable, se coloca el valor que sea igual o igual-->
                            <div class="form-group">
                            <label for="unidad_medida">Unidad de Medida</label>
                            <select name="unidad_medida" id="unidad_medida" class="form-control">
                                <option value="Libra" <?php echo ($unidadMedidaActual == 'Libra') ? 'selected' : ''; ?>>Libra</option>
                                <option value="Kilo" <?php echo ($unidadMedidaActual == 'Kilo') ? 'selected' : ''; ?>>Kilo</option>
                                <option value="Unidad" <?php echo ($unidadMedidaActual == 'Unidad') ? 'selected' : ''; ?>>Unidad</option>
                            </select>
            </div>                        </div>
                        <div class="col col-md-6" >
                        <div class="form-group">
                                <label for="">Imagen</label>
                                <div>
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($imagen); ?>" class="img-thumbnail" id="imageDisplay" onclick="document.getElementById('imageUpload').click();"style='
                                
                                width: 150px;
                                height: 120px;
                                float: rigth;
                                padding: 0;
                                border-radius: 50%;
                                margin: 2px auto 0 auto;
                                display: block;' >
                                    <input type="file" name="imagen" id="imageUpload" style="display: none;" onchange="previewImage(event);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" placeholder="Coloca la cantidad del producto..." value="<?php echo $cantidad?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Proveedor</label>
                                <select name="n_proveedor" id="" class="form-control">
                                  <?php 
                                  foreach ($proveedor_datos as $proveedor_dato){
                                    $n_proveedor = $proveedor_dato['n_proveedor'];
                                    $tabla_proveedor = $proveedor_dato['nombre_proveedor'];
                                    ?>
                                  <option value="<?php echo $n_proveedor?>"
                                  <?php if($tabla_proveedor == $nombre_proveedor){ ?> selected="selected" <?php } ?> ><?php echo $tabla_proveedor;?></option> 
                                </option>
                                  <?php }?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <a href="../productos/index.php" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-secondary" style="background-color: #cd7522;">Actualizar</button>
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

<script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
    const imageDisplay = document.getElementById('imageDisplay');
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imageDisplay.src = e.target.result;
            imageDisplay.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

</script>

<?php 
 include("../layout/footerDash.php"); 
 include("../layout/mensajes.php");
?>