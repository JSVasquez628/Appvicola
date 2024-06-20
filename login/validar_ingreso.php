<?php
include 'conexion.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!empty($_POST["ingresar"])) {
    if (!empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
        $usuario = $_POST["correo"];
        $contraseña = md5($_POST['contraseña']);
        $consulta = "SELECT * FROM usuario WHERE correo='$usuario' AND contraseña='$contraseña'";
        $resultado = mysqli_query($conn, $consulta);
        if ($datos = mysqli_fetch_object($resultado)) {
            $_SESSION["id_usuario"]=$datos->id_usuario;
            $_SESSION["nombre"] = $datos->nombres;
            $_SESSION["apellido"] = $datos->apellidos;
            $_SESSION["id_rol"] = $datos->id_rol;
            if ($datos->id_rol == 2) {
                header("location: ../Catalogo/Catalogo2.php");
                exit();
            } elseif ($datos->id_rol == 1) {
                header("location: ../Dashboard/graficos/grafico.php");
                exit();
            }
        } else {
            $message = "Acceso denegado.";
            echo "<script language='JavaScript'>
            alert('$message');
            location.assign('ingreso.php');
            </script>";        }
    } else {
        echo "Campos vacíos"; 
    }
}
?>
