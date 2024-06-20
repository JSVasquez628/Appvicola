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

                // Paso 2: Consultar la base de datos
                $sql = "SELECT DATE(fyh_creacion) AS fecha, SUM(total) AS total_ventas
                FROM orden
                GROUP BY DATE(fyh_creacion)
                ORDER BY DATE(fyh_creacion) ASC";

                $result = $conn->query($sql);

                $data = [];
                $previous_total = 0;

                // Paso 3: Calcular el total de ventas para cada día y comparar con el día anterior
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $current_total = $row["total_ventas"];
                    $data[] = array("fecha" => $row["fecha"], "total_ventas" => $current_total);
                    $previous_total = $current_total;
                  }
                }

                // Paso 4: Graficar los resultados
                ?>

                <!DOCTYPE html>
                <html>

                <head>
                  <title>Comparación de Ventas</title>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                </head>

                <body>
                  <div style="width: 100%; margin: auto;">
                    <canvas id="myChartVentas"></canvas>
                  </div>

                  <script>
                    var ctx = document.getElementById('myChartVentas').getContext('2d');
                    var myChartVentas = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels: [<?php foreach ($data as $d) {
                          echo '"' . $d['fecha'] . '", ';
                        } ?>],
                        datasets: [{
                        label: 'TOTAL VENTAS',
                          data: [<?php foreach ($data as $d) {
                            echo $d['total_ventas'] . ', ';
                          } ?>],
                          
                          borderColor: 'rgba(0, 42, 100)',
                          borderWidth: 1
                        }, ]
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
