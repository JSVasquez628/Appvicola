<?php

$sql_ventas = "SELECT orden.n_orden, orden.total, metodo_pago.tipo_pago as pago, orden.fyh_creacion FROM orden INNER JOIN metodo_pago ON orden.id_metodo = metodo_pago.id_metodo;";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);
?>
