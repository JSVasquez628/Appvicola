<?php
// Conexión a la base de datos
$host = 'localhost';
$db = 'appvicola';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultas
    $consulta_cliente_frecuente = "SELECT usuario.nombres, COUNT(detalleventa.n_detalle) AS numero_de_compras 
    FROM detalleventa 
    INNER JOIN orden
    ON detalleventa.n_orden = orden.n_orden 
    JOIN usuario 
    ON detalleventa.id_usuario = usuario.id_usuario 
    GROUP BY usuario.n_documento 
    ORDER BY numero_de_compras 
    DESC LIMIT 1;";

$consulta_dia_con_mas_ventas = "SELECT DATE(orden.fyh_creacion) AS fecha, COUNT(orden.n_orden) AS numero_de_ventas
                                FROM orden
                                GROUP BY fecha
                                ORDER BY numero_de_ventas DESC
                                LIMIT 1";

// Ejecución de consultas y obtención de resultados
$resultado_cliente_frecuente = $conn->query($consulta_cliente_frecuente);
if ($resultado_cliente_frecuente) {
    $cliente_frecuente = $resultado_cliente_frecuente->fetch_assoc();
}

$resultado_dia_con_mas_ventas = $conn->query($consulta_dia_con_mas_ventas);
if ($resultado_dia_con_mas_ventas) {
    $dia_con_mas_ventas = $resultado_dia_con_mas_ventas->fetch_assoc();
}

$conn->close();
