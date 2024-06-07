<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estiloregistro.css">
    <link rel="shortcut icon" href="css/Imagenes/icono.png" type="image/x-icon">
</head>
<body>
  <header> <!---menu header-->
        <div class="menu">
            <a href="index.html"> <img  src="css/Imagenes/icono.png" alt=""> </a>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="Contacto.html">Contacto</a></li>
                    <li><a href="quienessomos.html">Quienes Somos</a></li>
                    <li><a href="Ubicacion.html">Ubicacion</a></li>
                    <li><a href="ingreso.php">Ingreso</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="form-register">
        <h4>Formulario Registro</h4>
        <form id="registration-form" action="" method="POST" name="registro"> 
            <?php
                include '../controlador/conexion.php';
                include '../controlador/registro_usuario.php';
            ?>         
            <input class="controls" type="text" name="nombres" placeholder="Ingrese sus Nombres" required>
            <input class="controls" type="text" name="apellidos" placeholder="Ingrese sus Apellidos" required>
            <select name="tipo_doc" class="controls" aria-label=".form-select-sm" >
                <option selected>Tipo de Documento</option>
                <option value="(CC)">Cédula de Ciudadanía (CC)</option>
                <option value="(TI)">Tarjeta de Identidad (TI)</option>
                <option value="(RC)">Registro Civil (RC)</option>
                <option value="(CE)">Cédula de Extranjería (CE)</option>
                <option value="(PP)">Pasaporte (PP)</option>   
                <option value="NIT">NIT</option>           
              </select>
            <input class="controls" type="number" name="identificacion" placeholder="Ingrese número de identificación" required>
            <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>
            <input class="controls" type="number" name="telefono" placeholder="Ingrese número de celular" required>
            <input class="controls" type="text" name="direccion" placeholder="Ingrese direccion" required>
            <input class="controls" type="password" name="contraseña" placeholder="Ingrese su Contraseña" required>
            <input class="controls" type="password" name="rcontraseña" placeholder="Repita contraseña" required>
            
            <div class="term-condiciones">
                <input type="checkbox" name="terminos" id="terminos" required>
                <label for="terminos">Acepto los términos y condiciones</label>
                <p></p>
            </div>
            
            <div>
                
                <input type="submit" value="Registrar" name="registro" class="btn btn-success" onclick="validarPassword(document.registro.contraseña)">
            </div>
            <br>
            <br>
            <a href="ingreso.html">¿Ya tienes cuenta?</a>
        </form>
    </section>
    <script type="text/javascript" src="validar.js"></script> 

</body>
</html>
