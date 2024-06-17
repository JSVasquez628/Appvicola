<?php include ("../layout/indexDash.php"); 
include ("../../Conexion/conexion.php");
include ("../../controladores/ventas/detalleVenta.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h1 class="m-0">Detalle de la orden</h1>
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
                <h3 class="card-title">N. Orden <?php echo $n_orden?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <div class="row mb-3">
                    <div class="col-md-6">
                        <h4>Informacion del comprador</h4>
                        <p><strong>Rol:</strong> <?php echo $nombre_rol; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $nombres .' '. $apellidos ?></p>
                        
                    </div>
                    
                </div>                    <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Necesitamos otra consulta para los detalles de los productos
                                $sql_productos = "SELECT producto.nombre_producto, producto.precio_venta,
                                                 detalleventa.cantidad, (detalleventa.cantidad * producto.precio_venta)
                                                 AS subtotal  FROM detalleventa INNER JOIN producto ON
                                                 producto.n_producto = detalleventa.n_producto 
                                                 WHERE detalleventa.n_orden = '$n_orden_get'";
                                $query_productos = $pdo->prepare($sql_productos);
                                $query_productos->execute();
                                $productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($productos as $producto) {
                                    echo '<tr>';
                                    echo '<td>' . $producto['nombre_producto'] . '</td>';
                                    echo '<td>' . $producto['cantidad'] . '</td>';
                                    echo '<td>$' . $producto['precio_venta'] . '</td>';
                                    echo '<td>$' . $producto['subtotal'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                        
                        <p><strong>Total:</strong> $<?php echo $total; ?></p>
                        <p><strong>Método de Pago:</strong> <?php echo $tipo_pago; ?></p>
                    </div>
                <a href="../ventas/index.php" class="btn btn-secondary" style="background-color: #cd7522;">Volver</a>
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