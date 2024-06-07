<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
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
        <h4>Correo para recuperación</h4>
        <form action="../controlador/recovery.php" method="POST" id="login-form">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                    <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>
                
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Recuperar contraseña</button>
            
            <br>
        </form>
    </section>

   
</body>
</html>
