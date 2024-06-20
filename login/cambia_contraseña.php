<?php
include 'head.php';

?>
<body>
  <?php
  include 'header.php';
  ?>
    <section class="form-register">
        <h4>Recupera tu contraseña</h4>
        <form action="controlador/change_password.php" method="POST" id="login-form">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                <div class="form-floating my-3">
                    <input type="password" class="form-control" id="floatingInput" name="new_password">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <label for="floatingInput">Nueva contraseña</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Recuperar contraseña</button>
                    
            </b>
        </form>
    </section>
    <?php
include 'footer.php';

?>
   
</body>
</html>
