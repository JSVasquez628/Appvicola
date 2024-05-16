<?php 
include ("../../Conexion/conexion.php");


$n_producto = $_POST['n_producto'];

$sentencia = $pdo->prepare("DELETE FROM producto WHERE producto.n_producto = :n_producto");


 $sentencia->bindParam(':n_producto', $n_producto);
 $sentencia->execute();
 
 $respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere eliminar al producto?',
    'iconoC' => 'question',
    'button'=> 'Si, eliminar',
    'mensaje' => 'Producto eliminado correctamente',
    'icono' => 'success',
    'redirectURL' => '../productos/index.php'
);
echo json_encode($respuesta);

?>
