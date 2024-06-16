<?php include("../layout/indexDash.php");
include ("../../Conexion/conexion.php");
include ("../../controladores/inventario/readproductos.php")
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manejo inventario</h1>
          </div><!-- /.col -->
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row ">
        <div class="col-md-12">
                <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header" style="background-color: #cd7522;">
                <h3 class="card-title">Inventario</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                        
                        foreach ($inventario_datos as $inventario_dato) {
                          $n_producto = $inventario_dato['n_producto'];
                            ?>
                            <tr>
                                <td><?php echo $inventario_dato['n_producto'] ?></td>
                                <td><?php echo $inventario_dato['nombre_producto'] ?></td>
                                <td><?php echo "<img src='data:image/jpg;base64," . base64_encode($inventario_dato['imagen']) . "' alt='80' width='80'>"?></td>
                                <td><?php echo $inventario_dato['cantidad'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="modify.php?id=<?php echo $n_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-inbox"></i> Agregar</a>
                                        <a href="update.php?id=<?php echo $n_producto; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                  
                </table>

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
  <script>
  $(function () {
    $("#example1").DataTable({
        "pageLength": 5, 
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
              "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
              "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy'
                        }, {
                            extend: 'pdf',
                        }, {
                            extend: 'csv',
                        }, {
                            extend: 'excel',
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visualizar columnas'
                        }
                    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
