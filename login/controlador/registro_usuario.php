<?php

//registro de usuario en base de datos con contraseña encriptada

//cerrrar sesion 

//nombre de quien inicia sesion

//validar que no pueden ingresar dos usuarios con el mismo correo**

//recuperar contraseña ya 

//fortaleza de la contraseña **

//cuando sea erronea la informacion

include 'conexion.php';

if (!empty($_POST["registro"])) {
    if (empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["tipo_doc"]) || empty($_POST["identificacion"]) || empty($_POST["correo"]) || empty($_POST["telefono"]) || empty($_POST["direccion"]) || empty($_POST["contraseña"]) || empty($_POST["rcontraseña"])) {
        $message = "Un campo está vacío";
    } else {
        $nombre = $_POST["nombres"];
        $apellido = $_POST["apellidos"];
        $tipo_doc = $_POST["tipo_doc"];
        $identificacion = $_POST["identificacion"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $contraseña = md5($_POST["contraseña"]);
        $id_rol = "2";

        if ($_POST["contraseña"] !== $_POST["rcontraseña"]) {
            $message = "Las contraseñas no coinciden";
        } else {
            $sqlRegistrar = "INSERT INTO usuario (nombres, apellidos, tipo_documento, n_documento, correo, direccion, telefono, contraseña, id_rol) VALUES ('$nombre', '$apellido', '$tipo_doc', '$identificacion', '$correo', '$direccion', '$telefono', '$contraseña', '$id_rol')";

            $resultRegistrar = mysqli_query($conn, $sqlRegistrar);

            if (!$resultRegistrar) {
                $message = "Error al crear registro: " . mysqli_error($conn);
            } else {
                $message = "Registro exitoso!";
                echo "<script language='JavaScript'>
                alert('$message');
                location.assign('../vistas/ingreso.php');
                </script>";
                exit;
            }
        }
    }
}
?>

