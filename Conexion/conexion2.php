<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','appvicola');

$conexion = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);

// Verificar la conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}
?>