<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppVicola</title>
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="stylesheet" href="../css/cc_validador.css">
    <link rel="shortcut icon" href="../css/Imagenes/icono.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- contacto estilos -->
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>
    <!-- index -->
    <link rel="stylesheet" href="../css/estiloland.css">


    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 1px;
            text-align: center;

        }


        .custom-nav {
            background: linear-gradient(135deg, #FF6347, #FFA500, #c5c51e);
            box-shadow: 0 4px 2px -2px gray;
            /* Box shadow */
            margin-bottom: 20px;
            /* Margen inferior */
        }

        .img_logo {
            width: 120px;
            height: 70px;
            float: left;
            padding: 0px;
            border-radius: 50%;
        }

        .custom-bg {
            background-color: #FFA500;
            /* Color de fondo */
        }

        .custom-shadow {
            box-shadow: 0 4px 2px -2px gray;
            /* Box shadow */
        }

        .custom-navbar-brand {
            font-size: 2rem;
            /* Tamaño de fuente personalizado */
            color: #ffffff;
            /* Color del texto */
            font-weight: bold;
            /* Negrita */
            padding: 10px 20px;
            /* Espaciado interno (padding) */
            border-radius: 5px;
            /* Bordes redondeados */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Sombra del texto */
        }

        .link-size{
          font-size: 1.5rem;
        }
        
    </style>

</head>
<body>
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
            <li><a class="nav-link link-size" href="login/Contacto.php">Contacto</a></li>
            <li><a class="nav-link link-size" href="login/quienessomos.php">Quienes Somos</a></li>
            <li><a class="nav-link link-size" href="login/Ubicacion.php">Ubicacion</a></li>
        </ul>
        <button data-mdb-ripple-init type="button" class="link-size btn btn-light px-3 me-2" onclick="window.location.href='login/ingreso.php';">
          Ingresar
        </button>
        <button data-mdb-ripple-init type="button" class="link-size btn btn-dark me-3" onclick="window.location.href='login/registro_u.php';">
          Registrar
        </button>
        
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="css/Imagenes/salmon.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/Imagenes/mojarra.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/Imagenes/pollo.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/Imagenes/pierna_pernil.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/Imagenes/bagre.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


  
    
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  

<?php
include 'login/footer.php';

?>
</body>
</html> 