<?php
$n_producto_get = $_GET['id'];

$sql_producto = "SELECT producto.n_producto, producto.nombre_producto, producto.precio_venta, producto.precio_compra,
                 producto.unidad_medida, producto.imagen, producto.cantidad, proveedor.nombre_proveedor AS proveedor 
                 FROM producto INNER JOIN proveedor ON producto.n_proveedor = proveedor.n_proveedor WHERE n_producto ='$n_producto_get'";
$query_producto = $pdo->prepare($sql_producto);
$query_producto->execute();
$producto_datos = $query_producto->fetchAll(PDO::FETCH_ASSOC);

foreach ($producto_datos as $producto_dato) {
    $nombre_producto = $producto_dato["nombre_producto"];
    $precio_venta = $producto_dato["precio_venta"];
    $precio_compra = $producto_dato["precio_compra"];
    $unidadMedidaActual = $producto_dato["unidad_medida"];
    $imagen = $producto_dato["imagen"];
    $cantidad = $producto_dato["cantidad"];
    $nombre_proveedor = $producto_dato["proveedor"];
    

}   