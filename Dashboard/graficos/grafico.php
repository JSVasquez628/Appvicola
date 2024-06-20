<?php
include ("../../Conexion/conexion.php");
include ("../../Dashboard/layout/indexDash.php");
include ("../../controladores/graficos/consulta.php");
include ("../../controladores/graficos/consulta_dia_mas_vendido.php")
  ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<body class="hold-transition sidebar-mini">

  <!-- Contenedor del Contenido. Contiene el contenido de la página -->
  <div class="content-wrapper">

    <!-- Encabezado del Contenido (Encabezado de la página) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid"><!--Poner mas estilos de de sombreado, colores-->
      <!-- Ctotal ventas -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php
              foreach ($venta as $ventas) {
                echo $ventas['total_ventas'];
              }
              ?></h3>

              <p><b>Ventas</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!-- Realizar consulta SQL de ventas -->
          </div>
        </div>

        <!-- total usuarios -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php
              foreach ($usuario as $usuarios) {
                echo $usuarios['total_usuarios'];
              }
              ?></h3>
              <p><b>Usuarios registrados</b></p>
              <!-- Realizar consulta SQL de usuario en total/ SELECT COUNT(*) AS total_ventas FROM usuarios; -->
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- total ventas dinero -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> <!-- Consulta de total de total venta-->
                <?php
                foreach ($orden as $ordenes) {
                  echo '$' . number_format($ordenes['total_vendido'], 0, ',', '.');
                }
                ?>
              </h3>

              <p><b>Venta Total</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- cantidad productos -->
        <div class="col-lg-3 col-6">
          <div class="small-box " style="background-color: #0A44EA">
            <div class="inner">
              <h3><?php
              foreach ($cantidad as $cantidades) {
                echo $cantidades['total_cantidad'];
              }
              ?></h3>
              <p><b>Productos Existentes</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- graficos -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0" style="background-color: #979AA0;">
              <div class="d-flex justify-content-between" >
                <h3 class="card-title"><b>Ventas Cantidad Total</b></h3>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">
                    <?php
                    foreach ($venta as $ventas) {
                      echo $ventas['total_ventas'];
                    }
                    ?>
                  </span><!--SELECT COUNT(*) AS total_ventas FROM detalledeventa; -->
                  <span>Ventas</span>
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="position-relative mb-4">
                <?php include ("../../controladores/graficos/grafico_ventas.php"); ?>
              </div>

            </div>
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header border-0" style="background-color: #979AA0;">
              <h3 class="card-title"><b>Producto TOP </b></h3>
              <div class="card-tools">
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    foreach ($producto as $productos) {
                      echo "<td>" . $productos['producto_mas_vendido'] . "</td>";
                      echo "<td>" . $productos['total_vendido'] . "</td>";
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0" style="background-color: #979AA0;">
              <div class="d-flex justify-content-between">
                <h3 class="card-title"><b> Productos Mas Vendidos </b> </h3> 
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg"> <!-- total ventas consulta SQL -->
                    <?php
                    foreach ($orden as $ordenes) {
                      echo '$' . number_format($ordenes['total_vendido'], 0, ',', '.');
                    }
                    ?>
                  </span>
                </p>
                <!-- /.card -->
              </div>
            </div>
            <div class="position-relative mb-4">
              <?php include ("../../controladores/graficos/grafico_productos.php") ?>
            </div>
          </div>
          <div class="card">
            <div class="card-header border-0" style="background-color: #979AA0;">
             <b></b> <h3 class="card-title"><b>Momentos TOP</b></h3>
              <div class="card-tools">
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                  <th>Dia con Mas Ventas</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                    foreach ($resultado_dia_con_mas_ventas as $resultado_dias_con_mas_ventas) {
                      echo "<td>" . $resultado_dias_con_mas_ventas['fecha'] . "</td>";
                    }
                    ?>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th>Cliente con Mas Compras</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    foreach ($resultado_cliente_frecuente as $resultado_clientes_frecuente) {
                      echo "<td>" . $resultado_clientes_frecuente['nombres'] . "</td>";
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  </div>

  <?php

  include ("../../Dashboard/layout/footerDash.php");
  ?>