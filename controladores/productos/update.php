<?php
include("../../Conexion/conexion.php");

$nombre_producto = $_POST['nombre_producto'];
$precio_venta = $_POST['precio_venta'];
$precio_compra = $_POST['precio_compra'];
$unidad_medida = $_POST['unidad_medida'];
$n_proveedor = $_POST['n_proveedor'];
$n_producto = $_POST['n_producto']; // Asegúrate de recibir el identificador del producto

// Comprobar si se ha subido una nueva imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Obtener información del archivo de imagen
    $nombre_archivo = $_FILES['imagen']['name'];
    $tipo_archivo = $_FILES['imagen']['type'];
    $tamanio_archivo = $_FILES['imagen']['size'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];

    // Leer el contenido del archivo
    $imagen_blob = file_get_contents($ruta_temporal);

    // Preparar la sentencia SQL con la imagen
    $sentencia = $pdo->prepare("UPDATE producto 
                                SET nombre_producto = :nombre_producto,
                                    precio_venta = :precio_venta,
                                    precio_compra = :precio_compra,
                                    unidad_medida = :unidad_medida,
                                    imagen = :imagen,
                                    n_proveedor = :n_proveedor
                                WHERE n_producto = :n_producto");
    $sentencia->bindParam(":imagen", $imagen_blob, PDO::PARAM_LOB);
} else {
    // Preparar la sentencia SQL sin la imagen
    $sentencia = $pdo->prepare("UPDATE producto 
                                SET nombre_producto = :nombre_producto,
                                    precio_venta = :precio_venta,
                                    precio_compra = :precio_compra,
                                    unidad_medida = :unidad_medida,
                                    n_proveedor = :n_proveedor
                                WHERE n_producto = :n_producto");
}

$sentencia->bindParam(":nombre_producto", $nombre_producto);
$sentencia->bindParam(":precio_venta", $precio_venta);
$sentencia->bindParam(":precio_compra", $precio_compra);
$sentencia->bindParam(":unidad_medida", $unidad_medida);
$sentencia->bindParam(":cantidad", $cantidad);
$sentencia->bindParam(":n_proveedor", $n_proveedor);
$sentencia->bindParam(":n_producto", $n_producto);


    $respuesta = array(
        'success' => true,
        'mensajeC' => '¿Quiere actualizar producto?',
        'iconoC' => 'question',
        'button' => 'Si, Actualizar',
        'mensaje' => 'Producto actualizado correctamente',
        'icono' => 'success',
        'redirectURL' => '../productos/index.php'
    );


echo json_encode($respuesta);
?>
