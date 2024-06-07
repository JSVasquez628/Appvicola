
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="../css/estiloingreso.css">
    <link rel="shortcut icon" href="../css/Imagenes/icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="menu">
           <a href="../Landing/index.html"> <img src="../css/Imagenes/icono.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="../Landing/index.html">Inicio</a></li>
                    <li><a href="../Landing/Contacto.html">Contacto</a></li>
                    <li><a href="../Landing/quienessomos.html">Quienes Somos</a></li>
                    <li><a href="Ubicacion.html">Ubicacion</a></li>
                    <li><a href="registro.php">Registro</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section class="form-register">
        <h4>Recupera tu contraseña</h4>
        <form action="../controlador/change_password.php" method="POST" id="login-form">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                <div class="form-floating my-3">
                    <input type="password" class="form-control" id="floatingInput" name="new_password">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <label for="floatingInput">Nueva contraseña</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Recuperar contraseña</button>
                    
            </b>
        </form>
    </section>

   
</body>
</html>
