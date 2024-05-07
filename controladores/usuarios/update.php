<?php 
include ("../../Conexion/conexion.php");

$documento = $_POST['documento'];
$tipo_documento = $_POST['tipo_documento'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];

$sentencia = $pdo->prepare("UPDATE usuario 
SET n_documento=:documento,
tipo_documento=:tipo_documento,
nombres=:nombres,
apellidos=:apellidos,
correo=:correo,
direccion=:direccion,
telefono=:telefono,
id_rol=:id_rol
 WHERE id_usuario = :id_usuario");

 $sentencia->bindParam(':documento', $documento);
 $sentencia->bindParam(':tipo_documento', $tipo_documento);
 $sentencia->bindParam(':nombres', $nombres);
 $sentencia->bindParam(':apellidos', $apellidos);
 $sentencia->bindParam(':correo', $correo);
 $sentencia->bindParam(':direccion', $direccion);
 $sentencia->bindParam(':telefono', $telefono);
 $sentencia->bindParam(':id_usuario', $id_usuario);
 $sentencia->bindParam(':id_rol', $rol);
 $sentencia->execute();
 $respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere actualizar al usuario?',
    'iconoC' => 'question',
    'button'=> 'Si, actualizar',
    'mensaje' => 'Usuario actualizado correctamente',
    'icono' => 'success',
    'redirectURL' => '../usuarios/Rcliente.php'
); echo json_encode($respuesta);
?>
