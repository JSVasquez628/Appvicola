<?php 

$sql_producto = "SELECT * FROM producto";
$query_producto = $pdo->prepare($sql_producto);
$query_producto->execute();
$producto_datos = $query_producto->fetchAll(PDO::FETCH_ASSOC);