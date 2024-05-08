<?php 
include ("../../Conexion/conexion.php");


$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");


 $sentencia->bindParam(':id_usuario', $id_usuario);
 $sentencia->execute();
 
 $respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere eliminar al usuario?',
    'iconoC' => 'question',
    'button'=> 'Si, eliminar',
    'mensaje' => 'Usuario eliminado correctamente',
    'icono' => 'success',
    'redirectURL' => '../usuarios/Rcliente.php'
);
echo json_encode($respuesta);

?>
