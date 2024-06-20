<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "appvicola");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iniciar transacción
$conn->begin_transaction();

try {
    // Inserción en la tabla `orden`
    $total = $_POST['valor_total']; // Suponiendo que el total viene del formulario
    $metodo_pago = $_POST['metodo_pago']; // Suponiendo que el método de pago viene del formulario
    $id_usuario = $_POST['id_usuario']; // Suponiendo que el ID del usuario viene del formulario

    // Preparar la consulta de inserción en la tabla `orden`
    $sqlVenta = "INSERT INTO orden (total, id_metodo) VALUES (?, ?)";
    $stmtVenta = $conn->prepare($sqlVenta);

    // Verificar si la preparación de la declaración falló
    if ($stmtVenta === false) {
        throw new Exception("Error en la preparación de la declaración SQL para `orden`: " . $conn->error);
    }

    $stmtVenta->bind_param("di", $total, $metodo_pago);
    $stmtVenta->execute();

    // Obtener el ID de la venta recién insertada
    $idVenta = $conn->insert_id;

    // Inserciones en la tabla `detalleventa`
    $productos = $_POST['productos']; // Suponiendo que los productos vienen del formulario como un array

    // Preparar la consulta de inserción en la tabla `detalleventa`
    $sqlDetalle = "INSERT INTO detalleventa (n_orden, n_producto, cantidad, id_usuario) VALUES (?, ?, ?, ?)";
    $stmtDetalle = $conn->prepare($sqlDetalle);

    // Verificar si la preparación de la declaración falló
    if ($stmtDetalle === false) {
        throw new Exception("Error en la preparación de la declaración SQL para `detalleventa`: " . $conn->error);
    }

    // Preparar la consulta de actualización en la tabla `productos`
    $sqlUpdateProducto = "UPDATE producto SET cantidad = cantidad - ? WHERE n_producto = ?";
    $stmtUpdateProducto = $conn->prepare($sqlUpdateProducto);

    // Verificar si la preparación de la declaración falló
    if ($stmtUpdateProducto === false) {
        throw new Exception("Error en la preparación de la declaración SQL para `productos`: " . $conn->error);
    }

    // Iterar sobre los productos y ejecutar la consulta de inserción y actualización para cada uno
    foreach ($productos as $producto) {
        $idProducto = $producto['n_producto'];
        $cantidad = $producto['cantidad'];

        // Insertar en la tabla `detalleventa`
        $stmtDetalle->bind_param("iiii", $idVenta, $idProducto, $cantidad, $id_usuario);
        $stmtDetalle->execute();

        // Actualizar la cantidad en la tabla `productos`
        $stmtUpdateProducto->bind_param("ii", $cantidad, $idProducto);
        $stmtUpdateProducto->execute();
    }

    // Confirmar transacción
    $conn->commit();
    echo "Venta registrada y cantidades de productos actualizadas exitosamente";

} catch (Exception $e) {
    // En caso de error, revertir transacción
    $conn->rollback();
    echo "Error al registrar la venta: " . $e->getMessage();
}

// Cerrar conexión
$conn->close();
?>
