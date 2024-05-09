<?php
include("../../Conexion/conexion.php");

$nombre_producto = $_POST['nombre_producto'];
$precio_venta = $_POST['precio_venta'];
$precio_compra = $_POST['precio_compra'];
$unidad_medida = $_POST['unidad_medida'];
$cantidad = $_POST['cantidad'];
$n_proveedor = $_POST['n_proveedor'];

// Obtener información del archivo de imagen
$nombre_archivo = $_FILES['imagen']['name'];
$tipo_archivo = $_FILES['imagen']['type'];
$tamanio_archivo = $_FILES['imagen']['size'];
$ruta_temporal = $_FILES['imagen']['tmp_name'];

// Leer el contenido del archivo
$imagen_blob = file_get_contents($ruta_temporal);

// Insertar en la base de datos
$sentencia = $pdo->prepare("INSERT INTO producto (nombre_producto, precio_venta, precio_compra, unidad_medida, imagen, cantidad, n_proveedor) VALUES (:nombre_producto, :precio_venta, :precio_compra, :unidad_medida, :imagen, :cantidad, :n_proveedor)");
$sentencia->bindParam(":nombre_producto", $nombre_producto);
$sentencia->bindParam(":precio_venta", $precio_venta);
$sentencia->bindParam(":precio_compra", $precio_compra);
$sentencia->bindParam(":unidad_medida", $unidad_medida);
$sentencia->bindParam(":imagen", $imagen_blob, PDO::PARAM_LOB); // Se pasa el contenido del archivo como un blob
$sentencia->bindParam(":cantidad", $cantidad);
$sentencia->bindParam(":n_proveedor", $n_proveedor);
$sentencia->execute();

$respuesta = array(
    'success' => true,
    'mensajeC' => '¿Quiere crear este producto?',
    'iconoC' => 'question',
    'button' => 'Si, crear',
    'mensaje' => 'Producto creado correctamente',
    'icono' => 'success',
    'redirectURL' => '../productos/index.php'
);
echo json_encode($respuesta);
?>
