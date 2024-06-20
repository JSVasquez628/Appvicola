<?php
include 'head.php';

?>
<body>
  <?php
  include 'header.php';
  ?>
    <section class="form-register">
        <h4 class="card-title">Registro Cliente</h4>
        <br>
        <form id="formulario" action="" method="POST" name="registro"> 
            <?php
                include 'conexion.php';
                include 'registro_usuario.php';
            ?>
            <div class="formulario__grupo" id="grupo__nombre">
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese sus Nombres">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El nombre debe que ser de 2 a 40 caracteres y no debe contener numeros.</p>
			</div>
            <br>

            <div class="formulario__grupo" id="grupo__apellido">
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="apellido" type="text" name="apellido" placeholder="Ingrese sus Apellidos" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El apellido debe que ser de 2 a 40 caracteres y no debe contener numeros.</p>
			</div>
            <br>

            <div class="formulario__grupo" id="grupo__correo">
                <div class="formulario__grupo-input">
                    <input class="formulario__input" id="correo" type="email" name="correo" placeholder="Ingrese su Correo" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guion bajo.</p>
                <p class="formulario__input-error-existe">El correo ya está registrado.</p>
            </div>
            <br>
            
            <div class="formulario__grupo" id="grupo__password">
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" id="password" name="password" placeholder="Ingrese su Contraseña">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 8 a 15 dígitos tener una mayuscula una minuscula y un caracter especial.</p>
			</div>
            <br>
            <div class="formulario__grupo" id="grupo__password2">
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="password2" type="password" name="password2" placeholder="Repita contraseña" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div>
            <br>
            <div class="formulario__grupo">
            <select name="tipo_doc" class="controls" aria-label=".form-select-sm" >
                <option selected>Tipo de Documento</option>
                <option value="(CC)">Cédula de Ciudadanía (CC)</option>
                <option value="(TI)">Tarjeta de Identidad (TI)</option>
                <option value="(RC)">Registro Civil (RC)</option>
                <option value="(CE)">Cédula de Extranjería (CE)</option>
                <option value="(PP)">Pasaporte (PP)</option>   
                <option value="NIT">NIT</option>           
              </select>
            </div>     
            <br>         

            <div class="formulario__grupo" id="grupo__identificacion">
            <div class="formulario__grupo-input">
                <input class="formulario__input" id="identificacion" type="text" name="identificacion" placeholder="Ingrese número de identificación" required>
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La identificacion solo puede contener numeros de 6 a 13 digitos.</p>
			</div>  
            <br>
            <div class="formulario__grupo" id="grupo__telefono">
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="telefono" type="text" name="telefono" placeholder="Ingrese número de celular" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>
            <br>
            <div class="formulario__grupo" id="grupo__direccion">
				<div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="direccion" placeholder="Ingrese direccion" required>
				</div>
			</div>
            <br>
            <div class="term-condiciones">
                <input type="checkbox" name="terminos" id="terminos" required>
                <label for="terminos">Acepto los términos y condiciones</label>
                <p></p>
            </div>
            
            <div>
                <!-- <div class="formulario__grupo formulario__grupo-btn-enviar">
				<input type="submit" value="Registrar" name="registro" class="btn btn-success" >
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			    </div> -->
                <input type="submit" value="Registrar" name="registro" class="btn btn-success">
            </div>
            <br>
            <br>
            <a href="ingreso.php">¿Ya tienes cuenta?</a>
        </form>
    </section>
    <script type="text/javascript" src="validar.js"></script> 
<?php
include 'footer.php';

?>
</body>
</html>
