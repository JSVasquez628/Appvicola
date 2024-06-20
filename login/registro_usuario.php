<?php

include 'conexion.php';

if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["tipo_doc"]) || empty($_POST["identificacion"]) || empty($_POST["correo"]) || empty($_POST["telefono"]) || empty($_POST["direccion"]) || empty($_POST["password"])) {
        $message = "Un campo está vacío";
        echo "<script>alert('$message');</script>";
    } else {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipo_doc = $_POST["tipo_doc"];
        $identificacion = $_POST["identificacion"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $contraseña = md5($_POST["password"]);
        $id_rol = "2";

        $sqlCorreoExistente = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultCorreoExistente = mysqli_query($conn, $sqlCorreoExistente);

        if (mysqli_num_rows($resultCorreoExistente) > 0) {
            $message = "El correo electrónico ya está registrado";
            echo "<script language='JavaScript'>
                alert('$message');
                location.assign('ingreso.php');
                </script>";
        } else {
            $sqlRegistrar = "INSERT INTO usuario (nombres, apellidos, tipo_documento, n_documento, correo, direccion, telefono, contraseña, id_rol) VALUES ('$nombre', '$apellido', '$tipo_doc', '$identificacion', '$correo', '$direccion', '$telefono', '$contraseña', '$id_rol')";
            

            $resultRegistrar = mysqli_query($conn, $sqlRegistrar);

            if (!$resultRegistrar) {
                $message = "Error al crear registro: " . mysqli_error($conn);
                echo "<script language='JavaScript'>
                alert('$message');
                location.assign('ingreso.php');
                </script>";
            } else {
                $message = "Los datos se actualizaron correctamente";
                echo "<script language='JavaScript'>
                alert('$message');
                location.assign('ingreso.php');
                </script>";
                exit;
            }
        }
    }
}