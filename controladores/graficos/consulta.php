<?php

$sql = "SELECT COUNT(*) AS total_ventas FROM detalleventa;";
$query_venta = $pdo->prepare($sql);
$query_venta->execute();
$venta = $query_venta->fetchAll(PDO::FETCH_ASSOC);

$sqli = "SELECT COUNT(*) AS total_usuarios FROM usuario;";
$query_usuario = $pdo->prepare($sqli);
$query_usuario->execute();
$usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);

$Sql ="SELECT producto.nombre_producto AS producto_mas_vendido, SUM(detalleventa.cantidad) AS total_vendido FROM detalleventa JOIN producto ON detalleventa.n_producto = producto.n_producto GROUP BY detalleventa.n_producto ORDER BY total_vendido DESC LIMIT 1;";
$query_Producto = $pdo->prepare($Sql);
$query_Producto->execute();
$producto = $query_Producto->fetchAll(PDO::FETCH_ASSOC);

$sqL="SELECT SUM(total) AS total_vendido FROM orden;";
$query_orden = $pdo->prepare($sqL);
$query_orden->execute();
$orden = $query_orden->fetchAll(PDO::FETCH_ASSOC);

$sqlI = "SELECT SUM(cantidad) AS total_cantidad FROM producto;";
$query_cantidad = $pdo->prepare($sqlI);
$query_cantidad->execute();
$cantidad = $query_cantidad->fetchAll(PDO::FETCH_ASSOC);
