<?php 

$sql_inventario = "SELECT producto.n_producto, producto.nombre_producto, producto.imagen, producto.cantidad from producto";
$query_inventario = $pdo->prepare($sql_inventario);
$query_inventario->execute();
$inventario_datos = $query_inventario->fetchAll(PDO::FETCH_ASSOC);
?>