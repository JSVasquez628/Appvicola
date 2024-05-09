<?php 

$sql_producto = "SELECT producto.n_producto, producto.nombre_producto, producto.precio_venta, producto.precio_compra, producto.unidad_medida, producto.imagen, producto.cantidad, proveedor.nombre_proveedor from producto INNER JOIN proveedor ON producto.n_proveedor = proveedor.n_proveedor";
$query_producto = $pdo->prepare($sql_producto);
$query_producto->execute();
$producto_datos = $query_producto->fetchAll(PDO::FETCH_ASSOC);