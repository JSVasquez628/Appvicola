<?php
include 'head.php';

?>
<body>
  <?php
  include 'header.php';
  ?>
    <div class="contenedor">
        <h1>Formulario de contaco</h1>
        <div class="contenido">

            <div class="info">

                <div class="col">
                    <i class="icono fa-solid fa-earth-americas"></i>
                    <p> Diagonal 65 b sur # 4 f 23 este,Bogota-Colombia</p>
                </div>

                <div class="col">
                    <i class="icono fa-solid fa-envelope"></i>
                    <p> exampli@gmail.com</p>
                </div>

                <div class="col">
                    <i class="icono fa-solid fa-phone"></i>
                    <p> + 57 3153262616 <br> (601) 654-4543</p>
                </div>

                <div class="redes-s">
                    <a href="https://www.facebook.com/ANDRESFRAGMENTOSMC"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/andres.sert/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <form action="" method="GET" class="formulario">

                <input type="text" name="nombre" placeholder="Nombre" id="nombre" required>
                <input type="text" name="correo" placeholder="Correo Electronico" id="correo" required>
                <input type="text" name="asunto" placeholder="Asunto" id="asunto" required>
                <textarea name="mensaje" id="mensaje" placeholder="Mensaje" required></textarea>
                <button type="submit" formaction="../index.html"><b>Enviar</b></button>
            </form>

        </div>
    </div>
    <?php
    include 'footer.php';

    ?>
</body>
</html>