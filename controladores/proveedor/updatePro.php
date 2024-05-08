<?php
$n_proveedor_get = $_GET['id'];

$sql_proveedor = "SELECT * FROM proveedor WHERE n_proveedor ='$n_proveedor_get'";
$query_proveedor = $pdo->prepare($sql_proveedor);
$query_proveedor->execute();
$proveedor_datos = $query_proveedor->fetchAll(PDO::FETCH_ASSOC);

foreach ($proveedor_datos as $proveedor_dato) {
    $nombre_proveedor = $proveedor_dato["nombre_proveedor"];
    $telefono = $proveedor_dato['telefono'];
    $direccion = $proveedor_dato['direccion'];

}   