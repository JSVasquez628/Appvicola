
<script>
$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe normalmente

        // Envía la solicitud AJAX al script PHP
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
    // Muestra un mensaje de confirmación con SweetAlert
    Swal.fire({
        title: '¿Seguro?',
        text: response.mensajeC,
        icon: response.iconoC,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: response.button
    }).then((result) => {
        // Si el usuario confirma la acción
        if (result.isConfirmed) {
            // Muestra un mensaje de éxito con SweetAlert
            Swal.fire({
                title: '¡Éxito!',
                text: response.mensaje,
                icon: response.icono 
            }).then(() => {
                
                window.location.href = response.redirectURL;
            });
        }
    });
} else {
    // Muestra un mensaje de error con SweetAlert
    Swal.fire({
        title: 'Error',
        text: response.mensaje,
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Muestra un mensaje de error con SweetAlert si hay un problema con la solicitud AJAX
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al procesar la solicitud',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        });
    });
});
</script>

</body>
</html>