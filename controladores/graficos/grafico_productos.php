<?php
// Paso 1: Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appvicola";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Paso 2: Consultar la base de datos para obtener el total de ventas
$sql_total_sales = "SELECT SUM(cantidad) AS total_ventas FROM detalleventa";
$result_total_sales = $conn->query($sql_total_sales);
$total_sales = 0;
if ($result_total_sales->num_rows > 0) {
    $row_total_sales = $result_total_sales->fetch_assoc();
    $total_sales = $row_total_sales["total_ventas"];
}

// Paso 3: Consultar la base de datos para obtener el producto más vendido
$sql_most_sold = "SELECT n_detalle, SUM(cantidad) AS total_cantidad
                  FROM detalleventa
                  GROUP BY n_detalle
                  ORDER BY total_cantidad DESC
                  LIMIT 1";

$result_most_sold = $conn->query($sql_most_sold);

$most_sold_product = "";
$most_sold_percentage = 0;
if ($result_most_sold->num_rows > 0) {
    $row_most_sold = $result_most_sold->fetch_assoc();
    $most_sold_product_id = $row_most_sold["n_detalle"];
    $most_sold_quantity = $row_most_sold["total_cantidad"];
    $most_sold_percentage = ($most_sold_quantity / $total_sales) * 100;
    // Obtener el nombre del producto más vendido
    $sql_most_sold_product_name = "SELECT nombre_producto FROM producto WHERE n_producto = $most_sold_product_id";
    $result_product_name = $conn->query($sql_most_sold_product_name);
    if ($result_product_name->num_rows > 0) {
        $row_product_name = $result_product_name->fetch_assoc();
        $most_sold_product = $row_product_name["nombre_producto"];
    }
}

// Paso 4: Consultar la base de datos para obtener el producto menos vendido
$sql_least_sold = "SELECT n_detalle, SUM(cantidad) AS total_cantidad
                  FROM detalleventa
                  GROUP BY n_detalle
                  ORDER BY total_cantidad ASC
                  LIMIT 1";

$result_least_sold = $conn->query($sql_least_sold);

$least_sold_product = "";
$least_sold_percentage = 0;
if ($result_least_sold->num_rows > 0) {
    $row_least_sold = $result_least_sold->fetch_assoc();
    $least_sold_product_id = $row_least_sold["n_detalle"];
    $least_sold_quantity = $row_least_sold["total_cantidad"];
    $least_sold_percentage = ($least_sold_quantity / $total_sales) * 100;
    // Obtener el nombre del producto menos vendido
    $sql_least_sold_product_name = "SELECT nombre_producto FROM producto WHERE n_producto = $least_sold_product_id";
    $result_product_name = $conn->query($sql_least_sold_product_name);
    if ($result_product_name->num_rows > 0) {
        $row_product_name = $result_product_name->fetch_assoc();
        $least_sold_product = $row_product_name["nombre_producto"];
    }
}

// Paso 5: Graficar los resultados
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comparación de Ventas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="myChartProductos"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChartProductos').getContext('2d');
        var myChartProductos = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Producto Más Vendido: <?php echo $most_sold_product; ?> (<?php echo number_format($most_sold_percentage, 2); ?>%)', 'Producto Menos Vendido: <?php echo $least_sold_product; ?> (<?php echo number_format($least_sold_percentage, 2); ?>%)'],
                datasets: [{
                    label: 'Total Ventas',
                    data: [<?php echo $most_sold_quantity ?? 0; ?>, <?php echo $least_sold_quantity ?? 0; ?>],
                    backgroundColor: ['rgba(0, 23, 76)', 'rgba(7, 143, 235)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(0, 0, 0, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
