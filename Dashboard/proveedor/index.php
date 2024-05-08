<?php include("../layout/indexDash.php");
include ("../../Conexion/conexion.php");
include("../../controladores/proveedor/listaProveedor.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de proveedores</h1>
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
                <h3 class="card-title">Proveedores</h3>

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
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                        
                        foreach ($proveedor_datos as $proveedor_dato){
                          $n_proveedor = $proveedor_dato['n_proveedor'];
                            ?>
                            <tr>
                                <td><?php echo $proveedor_dato['n_proveedor'] ?></td>
                                <td><?php echo $proveedor_dato['nombre_proveedor'] ?></td>
                                <td><?php echo $proveedor_dato['telefono'] ?></td>
                                <td><?php echo $proveedor_dato['direccion'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="update.php?id=<?php echo $n_proveedor; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
                                        <a href="delete.php?id=<?php echo $n_proveedor; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
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