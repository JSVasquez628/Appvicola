<?php
include("../../Conexion/conexion.php");

$rol = $_POST['nombre_rol'];
$id_rol = $_POST['id_rol'];


$sentencia = $pdo ->prepare("UPDATE roles SET nombre_rol=:rol WHERE id_rol=:id_rol");

$sentencia -> bindParam(":id_rol", $id_rol);
$sentencia -> bindParam(":rol", $rol);
$sentencia -> execute();
$respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere actualizar rol?',
    'iconoC' => 'question',
    'button'=> 'Si, Actualizar',
    'mensaje' => 'Rol actualizado correctamente',
    'icono' => 'success',
    'redirectURL' => '../roles/index.php'
); echo json_encode($respuesta);
?>