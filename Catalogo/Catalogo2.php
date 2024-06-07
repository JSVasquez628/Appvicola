<?php
include '../Conexion/conexion.php';
include 'consulta.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>

<!-- Librerías de Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Estilos locales -->
    <link rel="stylesheet" href="css/estilocata.css">
    <link rel="shortcut icon" href="css/Imagenes/icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fbf50badbe.js" crossorigin="anonymous"></script>

<!-- Estilos de la pagina -->    
    <style>
        /*Estilo del footer*/
        footer {
            left: 0;
            bottom: 0;
            width: 100%;
            background: linear-gradient(135deg, #FF6347, #FFA500, #c5c51e);
            color: black;
            text-align: center;
            }            
        /*Estilo del boton borrar*/
            .b_delete {
            background-color: #FF0101;
            width: 70px;
            height: 33px;
            text-align: center;
            border-radius: 7px;
            font-weight: bold;
            color: white;
            }
    </style>
</head>
<body>
<!--Menu del encabezado-->
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

<!--Buscador de productos-->
    <br><br><br><br>
    <div style="position: fixed; top: 11%; right: 0; z-index: 100; transform: translateX(-5%)">
        <input type="text" id="search" placeholder="Buscar">
        <button id="search-button" onclick="buscarProducto()">Buscar</button>
        <button onclick="resetearBusqueda()" class="b_delete">Borrar</button>
    </div>
    <br><br>
<!--Funcion para buscador de productos-->
    <script>
        function buscarProducto() {
            var input = document.getElementById('search').value.trim().toUpperCase();
            var tbody = document.querySelector('tbody');
            var rows = tbody.getElementsByTagName('tr');
        if (input === '') {
            for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = "";
            }
            return; 
            // Salir de la función si no hay texto de búsqueda
            }  
        for (var i = 0; i < rows.length; i++) {
            var nombre_producto = rows[i].getElementsByTagName('h3')[0];
        if (nombre_producto) {
            var txtValue = nombre_producto.textContent || nombre_producto.innerText;
            if (txtValue.toUpperCase().indexOf(input) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
                    }
                }
            }
        }
//funcion para borrar la consulta en el buscador.
        function resetearBusqueda() {
            document.getElementById('search').value = ''; // Limpiar el campo de búsqueda
            buscarProducto(); // Restablecer la visualización de la tabla
        }
    </script>

<!--Funcion para mostrar productos del catalogo y agregar por cantidad al carrito-->
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row" columns=4>
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h3 style="color: #FE9900;"><strong>CATÁLOGO DE COMPRAS</strong></h3>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <?php
                                    include('obtenerProducto.php');
                                    echo "<tbody>";
                                    foreach ($productos as  $producto) {
                                        echo "<tr>";
                                        echo "<td width='90'>";
                                        echo "<div class='cart-product-imitation'>";
                                        echo "<img src='data:image/jpg;base64," . base64_encode($producto['imagen']) . "' alt='" . $producto['nombre_producto'] . "'>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td class='desc'>";
                                        echo "<h3>";
                                        echo $producto['nombre_producto'];
                                        echo "</h3>";
                                        echo "<div class='m-t-sm'>";
                                        echo "<form method='post' class='add-to-cart-form'>";
                                        echo "<input type='number' name='cantidad' class='form-control' placeholder='0' style='width: 85px; display: inline-block;'>";
                                        echo "<input type='hidden' name='id' value='" . $producto['n_producto'] . "'>";
                                        echo "<input type='hidden' name='action' value='addToCart'>";
                                        echo "<input type='submit' value='Agregar al Carrito' style='background-color: #FE9900; color: white; font-weight: normal; margin-left: 10px; border: none; border-radius: 5px;'>";
                                        echo "</form>";
                                        echo "<span style='font-size:14px;'><strong>Cantidad máxima disponible:</strong> " . $producto['cantidad'] . " ". $producto['unidad_medida'] . "s". "</span>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<h5 style='text-align: center;'>Precio por " . $producto['unidad_medida'] . "</h5>";
                                        echo "<h4>";
                                        echo "<p style='text-align: center;'>$" . number_format ($producto['precio_venta']) . "</p>";
                                        echo "</h4>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

<!--Muestra la suma total-->
                <div class="col-md-3" style="position: fixed; right: 0;">
                    <div class="ibox">
                        <div class="ibox-title" style="text-align: center;">
                            <h5 style="color: #FE9900;"><strong>TOTAL EN PRODUCTOS</strong></h5>
                        </div>
                        <div class="ibox-content">
                            <h2 class="font-bold" style="text-align: center;">
                                <?php
                                 echo'$ '.number_format ($total) .' COP';
                                ?>
                            </h2>
                            <hr>
                        </div>
                    </div>

<!--Menu derecho-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 style="text-align: center;">CONTACTENOS</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3><i class="fa fa-phone"></i> +57 320 972 8261</h3>
                            <span class="small">Por favor, cualquier duda o sugerencia, puede contactarnos al número relacionado. Horario de atención lunes a viernes de 6:00 AM a 5:00 PM</span>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-content">
                            <hr>
                            <p class="font-bold">
                                <h5 style="color: #FF0101; text-align: center;"><strong>Estos productos también le pueden interesar</strong></h5>
                            </p><br>
                            <div>
                                <p style="text-align: center;"><strong>PRODUCTO DESTACADO</strong> </p>
                                <div class="small m-t-xs">
                                <div>
                                <?php echo "<img src='data:image/jpg;base64," . base64_encode($producto['imagen']) . "' alt='" . $producto['nombre_producto'] . "'>";?>
                                </div>
                                <br>
                                <div style="text-align: center;">
                                    <?php echo "Producto destacado #1 de la semana <strong>" . $producto['nombre_producto'] . "a " . number_format ($producto['precio_venta']) . " por " . $producto['unidad_medida']; "</strong>"; ?>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ibox-content" style="text-align:center;">
                                <button class="btn btn-primary" style="background-color: #51CC20; color: black; font-size: 25px; font-family: Arial; margin: auto; display: block; border-radius: 10px;" onclick="window.location.href='compra.php'">
                                    <i class="fa fa fa-shopping-cart"></i> COMPRAR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Pie de pagina-->
    <footer style="position: fixed; top: 100; width: 100%; z-index: 0;">
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
