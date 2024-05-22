<script>
$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe normalmente

        // Guarda una referencia al formulario
        var form = this;

        // Muestra un mensaje de confirmación con SweetAlert
        Swal.fire({
            title: '¿Seguro?',
            text: '¿Quieres continuar con esta acción?', // Mensaje de confirmación
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            // Si el usuario confirma la acción
            if (result.isConfirmed) {
                // Envía la solicitud AJAX al script PHP
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Muestra un mensaje de éxito con SweetAlert
                            Swal.fire({
                                title: '¡Éxito!',
                                text: response.mensaje,
                                icon: response.icono 
                            }).then(() => {
                                // Redirige a la página especificada
                                window.location.href = response.redirectURL;
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
            }
        });
    });
});
</script>
