<?php
$n_producto_get = $_GET['id'];

$sql_producto = "SELECT producto.n_producto, producto.nombre_producto,
                         producto.precio_venta, producto.precio_compra,
                         producto.unidad_medida, producto.imagen, producto.cantidad,
                         proveedor.nombre_proveedor from producto INNER JOIN
                         proveedor ON producto.n_proveedor = proveedor.n_proveedor
                         WHERE n_producto = '$n_producto_get'";
$query_producto = $pdo->prepare($sql_producto);
$query_producto->execute();
$producto = $query_producto->fetchAll(PDO::FETCH_ASSOC);

foreach ($producto as $producto_dato) {
    $n_proveedor = $producto_dato['n_producto'];
    $nombre_producto = $producto_dato['nombre_producto'];
    $precio_venta = $producto_dato['precio_venta'];
    $precio_compra = $producto_dato['precio_compra'];
    $unidad_medida = $producto_dato['unidad_medida'];
    $imagen = $producto_dato['imagen'];
    $cantidad = $producto_dato['cantidad'];
    $proveedor = $producto_dato['nombre_proveedor'];
    
}