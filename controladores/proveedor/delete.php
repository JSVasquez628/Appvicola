<?php 
include ("../../Conexion/conexion.php");


$n_proveedor = $_POST['n_proveedor'];

$sentencia = $pdo->prepare("DELETE FROM proveedor WHERE n_proveedor = :n_proveedor");


 $sentencia->bindParam(':n_proveedor', $n_proveedor);
 $sentencia->execute();
 
 $respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere eliminar al proveedor?',
    'iconoC' => 'question',
    'button'=> 'Si, eliminar',
    'mensaje' => 'Proveedor eliminado correctamente',
    'icono' => 'success',
    'redirectURL' => '../prooveedor/index.php'
);
echo json_encode($respuesta);

?>
