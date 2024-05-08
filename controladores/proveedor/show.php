<?php
$n_proveedor_get = $_GET['id'];

$sql_proveedor = "SELECT * FROM proveedor WHERE n_proveedor ='$n_proveedor_get'";
$query_proveedor = $pdo->prepare($sql_proveedor);
$query_proveedor->execute();
$proveedor = $query_proveedor->fetchAll(PDO::FETCH_ASSOC);

foreach ($proveedor as $proveedor_dato) {
    $n_proveedor = $proveedor_dato['n_proveedor'];
    $nombre_proveedor = $proveedor_dato['nombre_proveedor'];
    $telefono = $proveedor_dato['telefono'];
    $direccion = $proveedor_dato['direccion'];
    
}