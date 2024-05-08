<?php
include("../../Conexion/conexion.php"); 

$nombre_proveedor = $_POST['nombre_proveedor'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$sentencia = $pdo -> prepare("INSERT INTO proveedor(nombre_proveedor, telefono, direccion) VALUES (:nombre_proveedor, :telefono, :direccion)");

$sentencia -> bindParam(":nombre_proveedor", $nombre_proveedor);
$sentencia -> bindParam(":telefono", $telefono);
$sentencia -> bindParam(":direccion", $direccion);
$sentencia -> execute();
$respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere crear este proveedor?',
    'iconoC' => 'question',
    'button'=> 'Si, crear',
    'mensaje' => 'Proveedor creado correctamente',
    'icono' => 'success',
    'redirectURL' => '../proveedor/index.php'
); echo json_encode($respuesta);

?>