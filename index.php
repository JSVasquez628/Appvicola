<?php
include 'login/head.php';

?>
<body>
  <?php
  include 'login/header.php';
  ?>
            <!-- Botón de WhatsApp -->
  <div class="whatsapp-button">
    <a href="https://wa.me/NUMERO_DE_TELEFONO" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>
            <!--Boton de carrito-->
  <div class="comp-button">
            <a href="Catalogo/Catalogo2.php"><i class="fas fa-shopping-cart"></i></a>
  </div>
      <div class="container">
          <div class="slider-container">
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"><img src="css/Imagenes/salmon.jpg" alt=""></div>
                  <div class="swiper-slide"><img src="css/Imagenes/mojarra.jpg" alt=""></div>
                  <div class="swiper-slide"><img src="css/Imagenes/pollo.jpg" alt=""></div>
                  <div class="swiper-slide"><img src="css/Imagenes/pierna_pernil.jpg" alt=""></div>
                  <div class="swiper-slide"><img src="css/Imagenes/bagre.jpg" alt=""></div>

                </div>
              </div>
            </div>
        </div>
  
    <footer> <!--Pie de pagina -->
        <div class="sec1">
            <div class="part2">
                <h3>Sobre Nosotros</h3>
                <p>Convierte tu visión en una realidad digital con nosotros: <br>desarrolladores web que crean experiencias únicas y funcionales</p>
            </div>
            <div class="part3">
                <h3>Siguenos</h3>
                <div class="redsocial">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a> 
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="sec2">
            <h3><small>&copy;2023 <b>D-TECNO</b> - Todos los derechos reservados</small></h3>
        </div>
    </footer>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    // Inicializa el Swiper
    var swiper = new Swiper('.swiper-container', {
      direction: 'horizontal', // Dirección vertical
      loop: true, // Repetir el slide
      autoplay: {
        delay: 2000, // Tiempo de espera entre imágenes en milisegundos
      },
    });
  </script>

<?php
include 'login/footer.php';

?>
</body>
</html> 