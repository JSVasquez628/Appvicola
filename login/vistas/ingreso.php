<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/estiloingreso.css">
    <link rel="shortcut icon" href="css/Imagenes/icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="menu">
           <a href="index.html"> <img src="css/Imagenes/icono.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="Contacto.html">Contacto</a></li>
                    <li><a href="quienessomos.html">Quienes Somos</a></li>
                    <li><a href="Ubicacion.html">Ubicacion</a></li>
                    <li><a href="registro.php">Registro</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section class="form-register">
        <h4>Iniciar Sesion</h4>
        <form action="../controlador/validar_ingreso.php" method="POST" id="login-form" name="registro">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                    <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>
                <div class="password-wrapper">
                    <input class="controls" type="text" name="contraseña" placeholder="Ingrese su Contraseña" required>
                    <i class="fas fa-eye" id="vPassword"></i> <!-- Icono de "ojo" para mostrar/ocultar la contraseña -->
                </div>
            </div>

            <input type="submit" value="Ingresar" class="btn" onclick="validarPassword(registro.contraseña)" name="ingresar">
            
            <br>
            <b>
                <a href="registro_usuario.php">Iniciar sesion</a>
                <br>
                <div class="my-2">
                    <a href="recovery.php">¿Olvidaste tu contraseña?</a>
                  </div>
                  <?php 
                  if(isset($_GET['message'])){
                   
                  ?>
                    <div class="alert alert-primary" role="alert">
                      <?php 
                      switch ($_GET['message']) {
                        case 'ok':
                          echo 'Por favor, revisa tu correo';
                          break;
                        case 'success_password':
                          echo 'Inicia sesión con tu nueva contraseña';
                          break;
                          
                        default:
                          echo 'Algo salió mal, intenta de nuevo';
                          break;
                      }
                      ?>
                    </div>
                  <?php
                  }
                  ?>
            </b>
        </form>
    </section>

   
</body>
</html>
