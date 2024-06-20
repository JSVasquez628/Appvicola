<?php
include 'head.php';

?>
<body>
  <?php
  include 'header.php';
  ?>
    <section class="form-register">
        <h4>Iniciar Sesion</h4>
        <form action="validar_ingreso.php" method="POST" id="login-form" name="registro">
            <div class="box">
                <span class="border-top"></span>
                <span class="border-right"></span>
                <span class="border-bottom"></span>
                <span class="border-left"></span>

                    <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>
                <div class="password-wrapper">
                    <input class="controls" type="password" name="contraseña" placeholder="Ingrese su Contraseña" required>
                   <!-- <i class="fas fa-eye" id="vPassword"></i>  Icono de "ojo" para mostrar/ocultar la contraseña -->
                </div>
            </div>

            <input type="submit" value="Ingresar" class="btn btn-primary mt-3" onclick="validarPassword(registro.contraseña)" name="ingresar">
            <b>
                <div class="my-2">
                    <a href="recoveryC.php">¿Olvidaste tu contraseña?</a>
                  </div>
                  <?php 
                  if(isset($_GET['message'])){
                   
                  ?>
                    <div class="alert alert-primary" role="alert">
                      <?php 
                      switch ($_GET['message']) {
                        case 'ok':
                          echo 'Por favor, revisa tu correo';
                          break;
                        case 'success_password':
                          echo 'Inicia sesión con tu nueva <contras></contras>eña';
                          break;
                          
                        default:
                          echo 'Algo salió mal, intenta de nuevo';
                          break;
                      }
                      ?>
                    </div>
                  <?php
                  }
                  ?>
            </b>
        </form>
    </section>


</body>
<?php
include 'footer.php';

?>
</html>