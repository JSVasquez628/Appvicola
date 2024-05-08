<?php
include("../../Conexion/conexion.php");

$nombre_proveedor = $_POST['nombre_proveedor'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$n_proveedor = $_POST['n_proveedor'];


$sentencia = $pdo ->prepare("UPDATE proveedor 
                            SET nombre_proveedor=:nombre_proveedor,
                            telefono=:telefono,
                            direccion=:direccion
                             WHERE n_proveedor=:n_proveedor");

$sentencia -> bindParam(":nombre_proveedor", $nombre_proveedor);
$sentencia -> bindParam(":telefono", $telefono);
$sentencia -> bindParam(":direccion", $direccion);
$sentencia -> bindParam(":n_proveedor", $n_proveedor);
$sentencia -> execute();
$respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere actualizar proveedor?',
    'iconoC' => 'question',
    'button'=> 'Si, Actualizar',
    'mensaje' => 'Proveedor actualizado correctamente',
    'icono' => 'success',
    'redirectURL' => '../proveedor/index.php'
); echo json_encode($respuesta);
?>