<nav class="navbar custom-nav navbar-expand-lg navbar-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="../index.php">
      <img
        class="img_logo"
        src="../css/Imagenes/icono.png"
        height="16"
        alt="icono"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

   

    <!-- Toggle button -->
    <!-- <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button> -->

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="navbar-brand mb-0 md h1 custom-navbar-brand" href="#">AppVicola</a>
        </li>
        
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li><a class="nav-link" href="Contacto.php">Contacto</a></li>
            <li><a class="nav-link" href="quienessomos.php">Quienes Somos</a></li>
            <li><a class="nav-link" href="Ubicacion.php">Ubicacion</a></li>
        </ul>
        <button data-mdb-ripple-init type="button" class="btn btn-light px-3 me-2" onclick="window.location.href='ingreso.php';">
          Ingresar
        </button>
        <button data-mdb-ripple-init type="button" class="btn btn-dark me-3" onclick="window.location.href='registro_u.php';">
          Registrar
        </button>
        
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->