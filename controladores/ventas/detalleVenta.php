


<?php
$n_orden_get = $_GET['id'];

$sql_orden = "SELECT 
	orden.n_orden,
	roles.nombre_rol,
    usuario.nombres, 
    usuario.apellidos, 
    orden.total, 
    metodo_pago.tipo_pago 
FROM 
    detalleventa 
INNER JOIN 
    orden ON detalleventa.n_orden = orden.n_orden 
INNER JOIN 
    metodo_pago ON metodo_pago.id_metodo = orden.id_metodo 
INNER JOIN 
    usuario ON usuario.id_usuario = detalleventa.id_usuario
INNER JOIN
	roles ON roles.id_rol = usuario.id_rol
WHERE
	orden.n_orden = '$n_orden_get'";
$query_orden = $pdo->prepare($sql_orden);
$query_orden->execute();
$orden = $query_orden->fetchAll(PDO::FETCH_ASSOC);

foreach ($orden as $orden_datos) {
    $n_orden = $orden_datos['n_orden'];
    $nombre_rol = $orden_datos['nombre_rol'];
    $nombres = $orden_datos['nombres'];
    $apellidos = $orden_datos['apellidos'];
    $total = $orden_datos['total'];
    $tipo_pago = $orden_datos['tipo_pago']; 
}

