<?php
include 'head.php';

?>

<body>
    <?php
    include 'header.php';
    ?>
  
  <section class="form-register">
        <h4>Correo para recuperación</h4>
        <form action="controlador/recovery.php" method="POST" id="login-form">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                    <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>
                
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Recuperar contraseña</button>
            
            <br>
        </form>
    </section>

    <?php
    include 'footer.php';

    ?>
</body>

</html>