<?php
include '../Conexion/conexion.php';
session_start();

// Inicializar el carrito si no está inicializado
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Conectar a la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'addToCart') {
        $id = $_POST['id'];
        $cantidad = intval($_POST['cantidad']);

        // Verificar si el producto ya está en el carrito
        if (!isProductInCart($id)) {
            $_SESSION['cart'][] = array('id' => $id, 'cantidad' => $cantidad);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'clearCart') {
        // Limpiar el carrito
        $_SESSION['cart'] = array();
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

// Obtener los productos en el carrito
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Librerías de Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Estilos locales -->
    <link rel="stylesheet" href="css/estilocata.css">
    <link rel="shortcut icon" href="css/Imagenes/icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>
    <!-- Estilos varios -->
    <style>
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background: linear-gradient(135deg, #FF6347, #FFA500, #c5c51e);
            color: black;
            text-align: center;
        }
        
        .order-form {
            width: 60%;
            margin-top: 50px;
        }
        .rounded-box {
            background: #f12711;
            background: -webkit-linear-gradient(to right, #f5af19, #f12711);
            background: linear-gradient(to right, #f5af19, #f12711);
            border: 4px solid #FF6347;
            border-radius: 10px;
            padding: 5px;
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 30px;
        }
        
        .order-header h4 {
            margin: 0;
        }
        
    .sty{
        margin-left: 0px;
        height: 50%;
        width: 50%;
        text-transform: uppercase;
    }

    /* Estilos personalizados*/
    .fixed-right {
            position: fixed;
            right: 0;
            top: 47%;
            transform: translateY(-50%);
            width: 350px; /* Ajusta el ancho según tus necesidades */
            background: #8e9eab;
            background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .order-form label {
            display: block;
            margin-bottom: 10px;
        }
        .order-form select,
        .order-form input[type="text"] {
            width: 150%;
            padding: 8px;
            border: 1px solid #ccc;
        }
        .custom-button {
            background-color: #51CC20;
            font-weight: bold;
            text-align: center;
            font-weight: bold; 
            color: black; 
            margin-left: 30%;
        }
        .tabla {
            background: #FDC830;
            background: -webkit-linear-gradient(to right, #F37335, #FDC830);
            background: linear-gradient(to right, #F37335, #FDC830);
        }
        .Borrar_button {
            background-color: #f5af19;
            width: 120px;
            height: 40px;
            font-weight: bold;
            text-align: center;
            color: black; 
            margin-left: 24%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header style="position: fixed; top: 0; width: 100%; z-index: 100;">
        <div class="menu">
            <a href="index.html"><img src="css/Imagenes/icono.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="Contacto.html">Contacto</a></li>
                    <li><a href="quienessomos.html">Quienes Somos</a></li>
                    <li><a href="Ubicacion.html">Ubicacion</a></li>
                    <li><a href="compra.php" class="comp-icon"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="index.html" class="comp-icon"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #f00a0a;"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br><br><br><br>

    <td>
        <a href="Catalogo2.php" class="btn btn-warning" style="position: fixed; transform: translateY(570px); background-color: #90BAF3; color: black; font-weight: bold;">
                    <i class="glyphicon glyphicon-menu-left"></i> Volver al catálogo
       </a>
    </td>
    <main>
        <div class="sty">
            <div class="table-container" >
            <h2 style= "color: #F39C12; font-weight: bold; transform: translateX(200px)">Carrito de Compras</h2>
            <br><br>
            
            <table class="table table-bordered" style=" height: 70px; transform: translateX(200px)">
                <thead>
                    <tr class="tabla">
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre_producto']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td><?php echo number_format ($producto['precio_venta']); ?></td>
                        <td><?php echo number_format ($producto['subtotal']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align: right;">Total:</th>
                        <th><?php echo number_format ($total) . " $"; ?></th>
                    </tr>
                </tfoot>
            </table>
            
            <button onclick="clearCart()" class="Borrar_button">Borrar pedido</button>
            <script>
        function clearCart() {
            if (confirm('¿Estás seguro de que deseas borrar el pedido?')) {
                // Crear un formulario para enviar la solicitud POST al servidor
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = 'compra.php';

                // Agregar el campo oculto con el valor de la acción
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'action';
                input.value = 'clearCart';
                form.appendChild(input);

                // Agregar el formulario al cuerpo y enviarlo
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

        </div>
    </div>
    </main>
    <div class="col-md-3" style="position: fixed; left: 82%;background-color: #f9f9f9;">
    <div class="fixed-right">
        <div class="order-form">
            <div class="order-header">
                <h3 class="rounded-box" style="transform: translateX(30%)">ORDEN DE PAGO</h3>
            </div>
                <label for="valor_unitario">Cliente:</label>
                <input type="text" name="valor_unitario" id="valor_unitario">
                <label for="metodo_pago">Método de Pago:</label>
                <select name="metodo_pago" id="metodo_pago">
                    <option value="transferencia">Nequi</option>
                    <option value="transferencia">Daviplata</option>
                    <option value="transferencia">Transfiya</option>
                    <option value="paypal">PayPal</option>
                    <option value="tarjeta">Tarjeta de Crédito</option>
                    <option value="transferencia">Transferencia Bancaria</option>
                </select>
                <label for="valor_impuesto">Valor con Impuesto:</label>
                <input type="text" name="valor_impuesto" id="valor_impuesto">
                <label for="valor_total">Valor Total:</label>
                <input type="text" name="valor_total" id="valor_total" value="<?php echo '$ ' . number_format($total) . ' COP'; ?>" readonly>
                <label for="numero_orden">Número de Orden:</label>
                <input type="text" name="numero_orden" id="numero_orden">
                <br></br><br><br>
                <button type="submit" class="btn btn-primary custom-button" style="font-size: 20px">REALIZAR PAGO</button>
                <br><br>
            </form>
        </div>
    </div>
    </div>
    </div>
    <footer>
        <div class="sec1">
            <div class="part2">
                <h3>Sobre Nosotros</h3>
                <p>Convierte tu visión en una realidad digital con nosotros</p>
            </div>
            <div class="part3">
                <h3>Síguenos</h3>
                <div class="social-media">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <p>&copy; 2023 Avícola. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
