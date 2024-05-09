<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appvicola</title>
      <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- icono pagina -->
    <link rel="shortcut icon" href="../../css/Imagenes/icono.png" type="image/x-icon">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- CSS de Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Navbar-->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
     <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    </nav>
<aside class="main-sidebar elevation-4">
    <!-- titulos del menu -->
    
    <a href="#" class="brand-link" style="background-color: #cd7522;">
      <img src="../../img/icono.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: #fff;">Palermo Sur</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #cd7522;">

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="background-color: #cd7522;" >
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p >
                Resumen
                <i class="right fas fa-angle-left n"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-person nav-icon"></i>
              <p >
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../usuarios/Rcliente.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios registrados</p>
                </a>
              </li>  
            </ul>
          </li>

          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-journal-medical nav-icon"></i>
              <p >
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../roles/index.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Roles</p>
                </a>
              </li>  
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../roles/create.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creacion Roles</p>
                </a>
              </li>  
            </ul>
          </li>

          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-basket nav-icon"></i>
              <p >
                Productos
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../productos/index.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../productos/create.php" class="nav-link active" style="background-color: #cd7522 ;" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar producto</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-box-seam nav-icon"></i>
              <p >
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar cantidad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar canttidad</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-cart4 nav-icon"></i>
              <p >
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas registradas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
              <i class="bi bi-cash-coin nav-icon"></i>
              <p >
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compras registradas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registras compra</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item " >
            <a href="#" class="nav-link active" style="background-color: #cd7522 ;">
            <i class="bi bi-truck nav-icon"></i>
              <p >
                Proveedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../proveedor/index.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedores registradas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../proveedor/create.php" class="nav-link active" style="background-color: #cd7522 ;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar proveedor</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
   
</aside>
 
 

