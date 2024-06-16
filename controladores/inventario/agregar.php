<?php
include("../../Conexion/conexion.php");

$cantidad_total = isset($_POST['cantidad_total']) ? intval($_POST['cantidad_total']) : 0;
$n_producto = isset($_POST['n_producto']) ? $_POST['n_producto'] : '';

try {
    $sentencia = $pdo->prepare("UPDATE producto SET cantidad = :cantidad WHERE n_producto = :n_producto");

    $sentencia->bindParam(":cantidad", $cantidad_total, PDO::PARAM_INT);
    $sentencia->bindParam(":n_producto", $n_producto, PDO::PARAM_INT);

    $sentencia->execute();

    $respuesta = array(
        'success' => true,
        'mensajeC' => '¿Quiere agregar al inventario?',
        'iconoC' => 'question',
        'button'=> 'Si, Agregar',
        'mensaje' => 'Cantidad agregada correctamente',
        'icono' => 'success',
        'redirectURL' => '../inventario/index.php'
    ); echo json_encode($respuesta);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
