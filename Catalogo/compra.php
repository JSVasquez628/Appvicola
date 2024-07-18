<?php
include '../Conexion/conexion2.php';
include '../sesion/iniciar_sesion.php';

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
<!-- VENTANA EMERGENTE DEL DETALLE DEL PRODUCTO -->
    <script>
        function openInvoiceForm() {
    // Obtener los valores del formulario
        var metodoPago = document.getElementById("metodo_pago").value;
        var cliente = document.getElementById("valor_unitario").value;
        var valorTotal = document.getElementById("valor_total").value;
        var numeroOrden = document.getElementById("numero_orden").value;

        // Calcular las dimensiones y posición para centrar la ventana emergente
        var popupWidth = 550;
        var popupHeight = 700;
        var left = (window.screen.width - popupWidth) / 2;
        var top = (window.screen.height - popupHeight) / 2;

        // Abrir una ventana emergente con el formulario de factura
        var invoiceWindow = window.open("", "Factura", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + left + ",top=" + top);

        // Construir el contenido del formulario de factura
        var invoiceContent = "<html><head><style>";
        invoiceContent += "button {";
        invoiceContent += "color: black;";
        invoiceContent += "font-weight: bold;";
        invoiceContent += "border-radius: 5px;";
        invoiceContent += "background: #f12711;";
        invoiceContent += "background: -webkit-linear-gradient(to right, #f5af19, #f12711);";
        invoiceContent += "background: linear-gradient(to right, #f5af19, #f12711);";
        invoiceContent += "font-size: 16px;";
        invoiceContent += "padding: 10px 20px;";
        invoiceContent += "}";
        invoiceContent += "</style></head><body>";
        invoiceContent += "<div style='text-align: center;'>";
        invoiceContent += "<img src='../css/Imagenes/icono.png' alt=''>"; // Aquí se agrega el enlace con la imagen
        invoiceContent += "<h1 style='text-align: center; color: #F39C12;'>DETALLE DE COMPRA</h1>";
        invoiceContent += "<p><strong>Cliente:</strong> " + cliente + "</p>";
        invoiceContent += "<p><strong>Método de Pago:</strong> " + metodoPago + "</p>";
        invoiceContent += "<div style='display: flex; justify-content: center;'>";
        invoiceContent += "<table border='1' style='margin: 0 auto;'>";
        invoiceContent += "<tr><th>PRODUCTO</th><th>CANTIDAD</th></tr>";
        <?php foreach ($productos as $producto): ?>
            invoiceContent += "<tr>";
            invoiceContent += "<td style='text-align: center;'><?php echo $producto['nombre_producto']; ?></td>";
            invoiceContent += "<td style='text-align: center;'><?php echo $producto['cantidad']; ?></td>";
            invoiceContent += "</tr>";
        <?php endforeach; ?>
        invoiceContent += "</table>";
        invoiceContent += "</div>";
        invoiceContent += "<p><strong>Total:</strong> " + valorTotal + "</p>";
        invoiceContent += "<p><strong>Número de Orden:</strong> " + numeroOrden + "</p>";
        invoiceContent += "<button onclick='window.close()'>Finalizar</button>";
        invoiceContent += "</div>";
        invoiceContent += "</body></html>";

        // Escribir el contenido en la ventana emergente
        invoiceWindow.document.write(invoiceContent);
        invoiceWindow.document.close();

        // Agregar la clase de difuminado al fondo principal
        document.getElementById('main-content').classList.add('blur-background');

        // Eliminar la clase de difuminado cuando la ventana emergente se cierra
        invoiceWindow.onbeforeunload = function() {
            document.getElementById('main-content').classList.remove('blur-background');
        };
    }
        let contador = 1;

        // Incrementar el contador cada vez que la página se carga
        window.onload = function() {
            document.getElementById('numero_orden').value = contador;
            contador++;
        };
    </script>
    <!-- Estilos locales -->
    <link rel="stylesheet" href="../css/estilocata.css">
    <link rel="shortcut icon" href="../css/Imagenes/icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            margin-bottom: 30px;
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

        /* Estilo de difuminado del fondo */
        .blur-background {
            filter: blur(3px);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <header style="position: fixed; top: 0; width: 100%; z-index: 100;">
        <div class="menu">
            <a href="index.html"><img src="../css/Imagenes/icono.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="../login/index.html">Inicio</a></li>
                    <li><a href="../login/Contacto.html">Contacto</a></li>
                    <li><a href="../login/quienessomos.html">Quienes Somos</a></li>
                    <li><a href="../login/Ubicacion.html">Ubicacion</a></li>
                    <li><a href="../login/compra.php" class="comp-icon"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="../sesion/cerrar_sesion.php" class="comp-icon"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #f00a0a;"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br><br><br><br>

    <td>
        <a href="Catalogo2.php" class="btn btn-warning" style="position: fixed; transform: translateY(480px); background-color: #90BAF3; color: black; font-weight: bold;">
                    <i class="glyphicon glyphicon-menu-left"></i> Volver al catálogo</a>
    </td>
    <main id="main-content"> <!-- Agregar ID para aplicar difuminado -->
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
    <?php
// Conexión a la base de datos (debes tener tu propia configuración de conexión)
$conexion = new mysqli('localhost', 'root', '', 'appvicola');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Query para obtener métodos de pago
$query = "SELECT id_metodo, tipo_pago FROM metodo_pago";
$result = $conexion->query($query);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Construir opciones para la lista desplegable
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id_metodo'] . '">' . $row['tipo_pago'] . '</option>';
    }
} else {
    $options = '<option value="">No hay métodos de pago disponibles</option>';
}

// Cerrar conexión
$conexion->close();
?>

    <form id="orden-pago-form" action="insertCompra.php" method="post">
        <div class="col-md-3" style="position: fixed; left: 85%;background-color: #f9f9f9;">
            <div class="fixed-right">
                <div class="order-form">
                    <div class="order-header">
                        <br>
                        <h3 class="rounded-box" style="transform: translateX(30%)">ORDEN DE PAGO</h3>
                        <br>
                    </div>
                    <label for="valor_unitario" style="font-size: 18px; margin-bottom: 5px;">Cliente:</label>
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id_usuario"]?>">
                    <input type="text" name="valor_unitario" id="valor_unitario" value="<?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?>" readonly>
                    <br><br>
                    <label for="metodo_pago" style="font-size: 18px; margin-bottom: 5px;">Método de Pago:</label>
                    <select name="metodo_pago" id="metodo_pago">
                        <option value="2">Nequi</option>
                        <option value="2">Daviplata</option>
                        <option value="2">Transfiya</option>
                        <option value="2">PayPal</option>
                        <option value="3">Tarjeta de Crédito</option>
                        <option value="1">Efevtivo/option>
                    </select>
                    <br><br>
                    <label for="valor_total" style="font-size: 18px; margin-bottom: 5px;">Valor Total:</label>
                    <input type="text" name="valor_total" id="valor_total" value="<?php echo $total; ?>">
                    <br><br>
                    <!-- Información de los productos -->
                <?php foreach ($productos as $index => $producto): ?>
                    <input type="hidden" name="productos[<?php echo $index; ?>][n_producto]" value="<?php echo $producto['n_producto']; ?>">
                    <input type="hidden" name="productos[<?php echo $index; ?>][nombre_producto]" value="<?php echo $producto['nombre_producto']; ?>">
                    <input type="hidden" name="productos[<?php echo $index; ?>][cantidad]" value="<?php echo $producto['cantidad']; ?>">
                    <input type="hidden" name="productos[<?php echo $index; ?>][precio_unitario]" value="<?php echo $producto['precio_venta']; ?>">
                    <input type="hidden" name="productos[<?php echo $index; ?>][subtotal]" value="<?php echo $producto['subtotal']; ?>">
                <?php endforeach; ?>
                    <!-- onclick="openInvoiceForm()" -->
                    <button type="submit" class="btn btn-primary custom-button" style="font-size: 23px">Finalizar compra</button>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
    </main>


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
        <p>&copy; 2023 Appvicola. Todos los derechos reservados.</p>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </footer>
</body>
</html>
