<?php

session_start();

// Inicializar el carrito si no está inicializado
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Conectar a la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'addToCart') {
    $id = $_POST['id'];
    $cantidad = intval($_POST['cantidad']);

    // Verificar si el producto ya está en el carrito
    if (!isProductInCart($id)) {
        $_SESSION['cart'][] = array('id' => $id, 'cantidad' => $cantidad);
    }
}

// Verificar si un producto está en el carrito
function isProductInCart($product_id) {
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] == $product_id) {
            return true;
        }
    }
    return false;
}


$carrito = $_SESSION['cart'];
$productos = array();
$total = 0;

if (count($carrito) > 0) {
    $ids = array_column($carrito, 'id');
    $ids = implode(',', $ids);

    $sql = "SELECT * FROM producto WHERE n_producto IN ($ids)";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        while ($producto = mysqli_fetch_assoc($resultado)) {
            foreach ($carrito as $item) {
                if ($item['id'] == $producto['n_producto']) {
                    $producto['cantidad'] = $item['cantidad'];
                    $producto['subtotal'] = $producto['cantidad'] * $producto['precio_venta'];
                    $total += $producto['subtotal'];
                    $productos[] = $producto;
                    break;
                }
            }
        }
    }
}

?>