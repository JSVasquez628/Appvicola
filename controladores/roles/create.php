<?php
include("../../Conexion/conexion.php");

$rol = $_POST['rol'];

$sentencia = $pdo ->prepare("INSERT INTO roles( nombre_rol)
                             VALUES (:rol)");

$sentencia -> bindParam("rol", $rol, PDO::PARAM_STR);
$sentencia -> execute();
$respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere crear este rol?',
    'iconoC' => 'question',
    'button'=> 'Si, crear',
    'mensaje' => 'Rol creado correctamente',
    'icono' => 'success',
    'redirectURL' => '../roles/index.php'
); echo json_encode($respuesta);
?>